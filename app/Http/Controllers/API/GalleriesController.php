<?php

namespace App\Http\Controllers\API;

use App\Models\Gallery;
use App\Http\Controllers\Controller;

class GalleriesController extends Controller
{
    public function index()
    {
        try {
            $galleries = Gallery::with('package')->get();
            return response()->json($galleries, status: 200);
        } catch (\Throwable $th) {
        }
    }

    public function indexByname($name)
    {
        try {
            $galleries = Gallery::with('package')
                ->whereHas('package', function ($query) use ($name) {
                    $query->where('name', $name);
                })
                ->get();

            return response()->json($galleries, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Failed to retrieve gallery data'], 500);
        }
    }
}
