<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AboutUs;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUsData = AboutUs::first();
        $teamMembers = User::where('level', 0)->get();

        return view('about-us', [
            'aboutUsData' => $aboutUsData ?? null,
            'teamMembers' => $teamMembers,
        ]);
    }
}
