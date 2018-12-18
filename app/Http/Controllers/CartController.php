<?php

namespace App\Http\Controllers;
//use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Product;
use App\Subproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function create($slug){

        $product = Product::where('slug','=',$slug)->first();

        Cart::add($product->id,$product->name,1,$product->unit_price,['type'=>'product']);

        return redirect()->back();
    }
    public function accessories($slug){
        $product = Subproduct::where('slug','=',$slug)->first();
        Cart::add($product->id,$product->name,1,$product->price,['type'=>'accessories']);
        return redirect()->back();
    }

    public function index(){
        return view('cart.index');
    }

    public function increase($rowId,$newQty){
        $qty = $newQty + 1;
        Cart::update($rowId,$qty);
        return redirect()->back();
        }

    public function decrease($rowId,$newQty){
        $qty = $newQty - 1;
        Cart::update($rowId,$qty);
        return redirect()->back();
    }
    public function remove($rowId){
        Cart::remove($rowId);
        return redirect()->back();
    }




}
