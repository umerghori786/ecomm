<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Product,
    Review
};

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::with('reviews')->where('id',$request->product_id)->first();
        $product->reviews()->create(['name'=>$request->name ,'content'=>$request->content,'email'=>$request->email ?? NULL,'rating'=>$request->rating ?? 5]);
        $product = Product::with('reviews')->where('id',$request->product_id)->first();
        $renderHTML = view('frontend.products.render-rating',compact('product'))->render();

        return response()->json(['success'=>true,'renderHTML'=>$renderHTML],200);
    }
    /**
     * replay on reivew by admin
     * 
     * @params \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reviewReply(Request $request)
    {
        $review = Review::findOrFail($request->review_id);
        $review->replys()->create(['content'=>$request->content]);

        $product = $review->reviewable()->with('reviews')->first();
        $renderHTML = view('frontend.products.render-rating',compact('product'))->render();

        return response()->json(['success'=>true,'renderHTML'=>$renderHTML],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
