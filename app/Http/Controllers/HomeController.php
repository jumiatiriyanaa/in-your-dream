<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Gallery;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first();
        $sliderImages = Gallery::limit(5)->get();

        return view('home', compact('aboutUs', 'sliderImages'));
    }
}
