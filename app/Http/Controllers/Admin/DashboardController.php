<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\AboutUs;
use App\Models\Gallery;
use App\Http\Controllers\Controller;
use App\Models\Package;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAboutUs = AboutUs::count();
        $totalPackages = Package::count();
        $totalGalleries = Gallery::count();
        $totalUsersLevel0 = User::where('level', 0)->count();

        return view('admin.dashboard', compact('totalAboutUs', 'totalPackages', 'totalGalleries', 'totalUsersLevel0'));
    }
}
