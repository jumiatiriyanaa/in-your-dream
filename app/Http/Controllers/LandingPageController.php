<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Gallery;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    public function aboutUs()
    {
        $aboutUs = AboutUs::first();

        return view('landing-page', compact('aboutUs'));
    }

    public function getSliderImages()
    {
        $sliderImages = Gallery::limit(5)->get();

        return view('landing-page', compact('sliderImages'));
    }
}
