<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $products = Product::orderBy('id','dsec')->paginate(12);

        return view('product.index')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('product.add')->withCategory($category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->unit_price = $request->unit_price;
        $product->unit_weight = $request->unit_weight;
        $product->discount = $request->discount;
        //needs to be changed
        //$product->slug = generate slug from title
        $product->quantity = $request->quantity;
        $product->supplier_id = 10;

        //Gemerating unique slug

        $slug = str_slug("$request->name",'-');
        $newSlug = $slug.'-'.time();

        $product->slug = $newSlug;
        if($request->hasFile('images')){
            $image = $request->file('images');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(720,405)->save($location);
            $product->images = $filename;
        }
        $product->save();
        Session::flash('message','Product is added succesfully');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::whereId($id)->first();

        return view('product.show')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();

        return view('product.edit')->withProduct($product)->withCategory($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $this->validate($request,[
            //validating Code Goes Here.
        ]);

        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->unit_price = $request->input('unit_price');
        $product->unit_weight = $request->input('unit_weight');
        $product->quantity = $request->input('quantity');
        $product->discount = $request->input('discount');
        if($request->hasFile('images')){
            $image = $request->file('images');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(720,405)->save($location);
            $product->images = $filename;
        }
        $product->save();

        Session::flash('message',"$product->name is updated successfully");
        return redirect()->route('product.show',$product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        Session::flash('message','The Product is deleted.');
        return redirect()->route('product.index');
    }
}
