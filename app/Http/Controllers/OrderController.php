<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItems;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order(){
        var_dump(Cart::content());
    }

    public function store(Request $request){
        //order Table
        $order = new Order;
        $this->validate($request,[
            'name'=>'required|max:30',
            'mobile'=>'required|max:15',
            'address'=>'required|max:190',
            'city'=>'required|max:30',
            'payment_type'=>'required'
        ]);

        $order->user_id = Auth::user()->id;
        $order->name = $request->name;
        $order->mobile = $request->mobile;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->payment_type = $request->payment_type;
        $order->approved = 0;

        $order->save();

        //end of order table operation

        //start of Order Items Table Operation

        for ($i=1;$i<=Cart::count();$i++){
            foreach (Cart::content() as $item){
                $orderItems = new OrderItems;
                $orderItems->product_name = $item->name;
                $orderItems->price = $item->price;
                $orderItems->type = $item->options->type;
                $orderItems->quantity = $item->qty;
                $orderItems->order_id = $order->id;
                $orderItems->save();
            }
        }

        Cart::destroy();
        return view('pages.profile');


    }

    public function orderDetails(Request $request){

    }

}
