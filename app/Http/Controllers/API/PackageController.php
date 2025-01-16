<?php

namespace App\Http\Controllers\API;

use App\Models\Package;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function index()
    {
        try {
            $packages = Package::all();
            return response()->json($packages, status: 200);
        } catch (\Throwable $th) {
        }
    }
}
