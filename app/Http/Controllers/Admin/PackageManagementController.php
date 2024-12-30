<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageManagementController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'desc' => 'nullable|string',
        ]);

        Package::create($request->only(['name', 'price', 'desc']));

        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully!');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'desc' => 'nullable|string',
        ]);

        $package = Package::findOrFail($id);
        $package->update($request->only(['name', 'price', 'desc']));

        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully!');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully!');
    }
}
