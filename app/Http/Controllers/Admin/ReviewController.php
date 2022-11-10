<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {
        $reviews = Review::with('users')->latest()->get();

        return view('admin.review.index',['reviews'=>$reviews]);


    }
    public function create()
    {
        $customers = User::where('role_id',2)->get();
        return view('admin.review.create',['customers'=>$customers]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer' => 'required',
            'review' => 'required|string',
        ]);
        $review = new Review();

        $review->user_id = $request->customer;
        $review->review = $request->review;
        $review->save();

        return redirect()->back()->with('success','Review added successfully');
    }

    public function edit($id)
    {
        $customers = User::where('role_id',2)->get();
        $review = Review::find($id);

        return view('admin.review.edit',['review'=>$review,'customers'=>$customers]);
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'customer' => 'required',
            'review' => 'required|string',
        ]);
        $review = Review::find($id);
        $review->user_id = $request->customer;
        $review->review = $request->review;
        $review->update();

        return redirect()->back()->with('success','Review updated successfully');

    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $review = Review::find($id);
        $review->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Review Deleted Successfully.'
        ]);
    }
}
