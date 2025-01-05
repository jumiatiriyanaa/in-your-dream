<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Http\Controllers\Controller;

class PricelistController extends Controller
{
    public function index()
    {
        $ratings = [
            'Photobox / Self Photo' => Rating::where('reservation_id', 1)->avg('rating') ?? 0,
            'Wedding Package' => Rating::where('reservation_id', 2)->avg('rating') ?? 0,
            'Other Package' => Rating::where('reservation_id', 3)->avg('rating') ?? 0,
        ];

        return view('pricelist', compact('ratings'));
    }

    public function getPackageRatings($packageId)
    {
        $reviews = Rating::where('reservation_id', $packageId)
            ->with('reservation.user')
            ->get();

        return response()->json($reviews);
    }
}
