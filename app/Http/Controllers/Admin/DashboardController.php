<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\AboutUs;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\OtherPackage;
use App\Models\WeddingPackage;
use App\Http\Controllers\Controller;
use App\Models\SelfPhotoPhotoboxPackage;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAboutUs = AboutUs::count();
        $totalPackages = Package::count();
        $totalGalleries = Gallery::count();
        $totalUsersLevel0 = User::where('level', 0)->count();

        $totalOtherPackages = OtherPackage::count();
        $totalWeddingPackages = WeddingPackage::count();
        $totalSelfPhotoPhotoboxPackages = SelfPhotoPhotoboxPackage::count();

        $totalReservation = $totalOtherPackages + $totalWeddingPackages + $totalSelfPhotoPhotoboxPackages;

        return view('admin.dashboard', compact('totalAboutUs', 'totalPackages', 'totalGalleries', 'totalUsersLevel0', 'totalReservation'));
    }
}
