<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryManagementController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        $packages = Package::all();
        return view('admin.galleries.create', compact('packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'package_id' => $request->package_id,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery image added successfully!');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $packages = Package::all();
        return view('admin.galleries.edit', compact('gallery', 'packages'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gallery = Gallery::findOrFail($id);

        if ($request->hasFile('image')) {
            if (Storage::exists('public/' . $gallery->image_path)) {
                Storage::delete('public/' . $gallery->image_path);
            }

            $imagePath = $request->file('image')->store('gallery', 'public');
            $gallery->image_path = $imagePath;
        }

        $gallery->package_id = $request->package_id;
        $gallery->save();

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery updated successfully!');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if (Storage::exists('public/' . $gallery->image_path)) {
            Storage::delete('public/' . $gallery->image_path);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery deleted successfully!');
    }
}
