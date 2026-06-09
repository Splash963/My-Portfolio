<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

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
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Review submitted successfully! Waiting for approval.'
        ]);
    }
}
