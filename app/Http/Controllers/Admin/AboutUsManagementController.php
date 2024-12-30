<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutUsManagementController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::latest()->first();
        return view('admin.about-us.index', compact('aboutUs'));
    }

    public function create()
    {
        return view('admin.about-us.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('about_us', 'public');

        AboutUs::create([
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.about-us.index')->with('success', 'About Us content created successfully!');
    }

    public function edit($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        return view('admin.about-us.edit', compact('aboutUs'));
    }

    public function update(Request $request, $id)
    {
        $aboutUs = AboutUs::findOrFail($id);

        $request->validate([
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if (Storage::exists('public/' . $aboutUs->image_path)) {
                Storage::delete('public/' . $aboutUs->image_path);
            }

            $aboutUs->image_path = $request->file('image')->store('about_us', 'public');
        }

        $aboutUs->update([
            'description' => $request->description,
            'image_path' => $aboutUs->image_path ?? $aboutUs->image_path,
        ]);

        return redirect()->route('admin.about-us.index')->with('success', 'About Us content updated successfully!');
    }

    public function destroy($id)
    {
        $aboutUs = AboutUs::findOrFail($id);

        if (Storage::exists('public/' . $aboutUs->image_path)) {
            Storage::delete('public/' . $aboutUs->image_path);
        }

        $aboutUs->delete();

        return redirect()->route('admin.about-us.index')->with('success', 'About Us content deleted successfully!');
    }
}
