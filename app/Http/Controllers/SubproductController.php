<?php

namespace App\Http\Controllers;

use App\Product;
use App\Subproduct;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class SubproductController extends Controller
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
        $products = Subproduct::orderBy('id','dsec')->paginate(12);

        return view('Subproduct.index')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('subproduct.add')->withProducts($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Subproduct();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->product_id = $request->product_id;
        $product->price = $request->price;
        //needs to be changed
        //$product->slug = generate slug from title
        $product->quantity = $request->quantity;

        //Gemerating unique slug

        $slug = str_slug("$request->name",'-');
        $newSlug = $slug.'-'.time();

        $product->slug = $newSlug;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(720,405)->save($location);
            $product->image = $filename;
        }
        $product->approved = 1;
        $product->save();
        Session::flash('message','Product is added succesfully');
        return redirect()->route('subproduct.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Subproduct::whereId($id)->first();

        return view('subproduct.show')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Subproduct::find($id);
        $category = Product::all();

        return view('subproduct.edit')->withProduct($product)->withCategory($category);
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
        $product = Subproduct::find($id);

        $this->validate($request,[
            //validating Code Goes Here.
        ]);

        $product->name = $request->input('name');
        $product->product_id = $request->input('product_id');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(720,405)->save($location);
            $product->images = $filename;
        }
        $product->save();

        Session::flash('message',"$product->name is updated successfully");
        return redirect()->route('subproduct.show',$product->id);
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
