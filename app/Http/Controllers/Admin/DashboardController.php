<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\AboutUs;
use App\Models\Gallery;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGalleries = Gallery::count();
        $totalUsersLevel0 = User::where('level', 0)->count();
        $totalAboutUs = AboutUs::count();

        return view('admin.dashboard', compact('totalGalleries', 'totalUsersLevel0', 'totalAboutUs'));
    }
}
