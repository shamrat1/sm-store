<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\OrderItems;
use App\Review;
use App\Subproduct;
use App\SubReviews;
use Illuminate\Http\Request;
use App\Product;
use Auth;

class PagesController extends Controller
{
    public function index(){
        if(Auth::user()){
                $history = Order::where('user_id', '=', Auth::user()->id)->orderby('id', 'dsec')->first();
            if (!empty($history)) {
                $items = OrderItems::where('order_id', '=', $history->id)->get();
                foreach ($items as $item) {
                    if ($item->type == "product") {
                        $subprod = Subproduct::where('product_id', '=', $item->product_id)->get();
                        break;

                    } else {
                        $prod = Subproduct::whereId($item->product_id)->get();
                        foreach ($prod as $key) {
                            $subprod = Subproduct::where('product_id', '=', $key->product_id)->get();
//                        foreach ($subprod as $item){
//                            $aver[] = SubReviews::where('sub_id','=',$item->id)->get();
//                            }
//                        foreach ($aver as $item){
//                            $rating =
//                        }

                        }
                        break;
                    }

                }
            }
            else{
                $subprod= null;
            }

        }
        else{
            $subprod = null;
        }
    $product = Product::all();
    return view('welcome')->withProducts($product)->withSubprod($subprod);

    }

    public function search($request){
        $keyword = $request->input('keyword');
    }
    public function getEvents(){
        return view('pages.events');
    }
    public function checkout(){
        return view('pages.checkout');
    }

    public function profile(){
        $orders = Order::where('user_id','=',Auth::user()->id)->get();
        return view('pages.profile')->withOrders($orders);
    }

    public function getCategory($name){
        $category = Category::where('name','=',$name)->first();
        $products = Product::where('category_id','=',$category->id)->get();

        return view('pages.category')->withProducts($products)->withCategory($category);
    }
    public function getSingle($slug){

        $product = Product::where('slug', '=',$slug)->first();
        $reviews = Review::where('product_id','=',$product->id)->get();
        $i=0;
        if($reviews->isEmpty() != true) {
            foreach ($reviews as $review) {
                $data[$i] = $review->rating;
                $i++;
            }
            $average = array_sum($data) / count($data);

        }
        else{
            $average = null;
        }
        return view('pages.single')->withProduct($product)->withReviews($reviews)->withAverage($average);
    }
    public function getAccessories($slug){
        $product = Subproduct::where('slug', '=',$slug)->first();
        $reviews = SubReviews::where('sub_id','=',$product->id)->get();
        $i=0;
        if($reviews->isEmpty() != true) {
            foreach ($reviews as $review) {
                $data[$i] = $review->rating;
                $i++;
            }
            $average = array_sum($data) / count($data);

        }
        else{
            $average = null;
        }
        return view('pages.accessories')->withProduct($product)->withReviews($reviews)->withAverage($average);
    }
    public function about(){
        return view('pages.about');
    }

    public function deals(){
        return view('pages.deals');
    }

    public function services(){
        return view('pages.services');
    }

}
