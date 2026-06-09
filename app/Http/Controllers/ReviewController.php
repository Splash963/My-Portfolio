<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        // $reviews = Review::where('is_approved', 1)->get();
        $reviews = Review::all();
        return view('admin.manage-reviews', compact('reviews'));
    }

    public function store(Request $request)
    {
        // Data Validation
        $validated = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'review' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Create Review
        Review::create([
            'user_name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'company_name' => $validated['company_name'],
            'position' => $validated['position'],
            'review' => $validated['review'],
            'rating' => $validated['rating'],
            'status' => "Pending",
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Review submitted successfully! Waiting for approval.'
        ]);
    }

    public function view_all_data($id)
    {
        $view_review = Review::find($id);
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $view_review->id,
                'user_name' => $view_review->user_name,
                'email' => $view_review->email,
                'company_name' => $view_review->company_name,
                'position' => $view_review->position,
                'review' => $view_review->review,
                'rating' => $view_review->rating,
                'status' => $view_review->status,
                'created_at' => $view_review->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $view_review->updated_at->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
