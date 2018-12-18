<?php

namespace App\Http\Controllers;


use App\SubReviews;
use App\Subproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubreviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //
    }

    public function index()
    {
        $reviews = SubReviews::all();

        return view('subreview.index')->withReviews($reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $subproduct = Subproduct::where('slug','=',$slug)->first();
        return view('review.create')->withProduct($subproduct);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'rating'=>'required',
            'review'=>'required|min:10'
        ]);
        $review = new Review();
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->subproduct_id = $request->subproduct_id;
        $review->isApproved = 0;
        $review->user_id = $request->user_id;
        $review->save();

        Session::flash('message','Your review is added and will be published shortly.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function averageRating($id){

    }
    public function show($id)
    {
        $reviewItem = Review::whereId($id)->first();
        $subproduct = Product::where('id','=',$reviewItem->subproduct_id)->first();

        return view('review.show')->withReview($reviewItem)->withProduct($subproduct);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        $review = Review::find($review);
        return route('review.edit')->withReview($review);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'rating'=>'required',
            'review'=>'required|min:10'
        ]);
        $review = Review::find($id);
        $review->rating = $request->input('rating');
        $review->review = $request->input('review');
        $review->isApproved = "0";
        $review->save();

        Session::flash('message','Your Review is updated and will be published shortly.');
        return redirect()->back();

    }

    public function isApproved(Request $request, $id){

        $review = Review::find($id);
        $review->isApproved = 1;
        $review->save();
        Session::flash('message','Review is now approved');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $reviews = Review::find($review);
        $review->delete();
        Session::flash('message',' Review is deleted permanently');
        return redirect()->back();

    }
}
