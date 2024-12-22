<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsManagementController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::latest()->first();
        return view('admin.about_us.index', compact('aboutUs'));
    }

    public function edit()
    {
        $aboutUs = AboutUs::latest()->first();
        return view('admin.about_us.edit', compact('aboutUs'));
    }

    public function update(Request $request, AboutUs $aboutUs)
    {
        $request->validate([
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $aboutUs->description = $request->description;

        if ($request->hasFile('image')) {
            if ($aboutUs->image_path && file_exists(public_path('about_us/' . $aboutUs->image_path))) {
                unlink(public_path('about_us/' . $aboutUs->image_path));
            }

            $imagePath = $request->file('image')->store('about_us', 'public');
            $aboutUs->image_path = basename($imagePath);
        }

        $aboutUs->save();

        return redirect()->route('admin.about-us.index')->with('success', 'About Us content updated successfully!');
    }

    public function create()
    {
        return view('admin.about_us.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $aboutUs = new AboutUs();
        $aboutUs->description = $request->description;

        $imagePath = $request->file('image')->store('about_us', 'public');
        $aboutUs->image_path = basename($imagePath);

        $aboutUs->save();

        return redirect()->route('admin.about-us.index')->with('success', 'About Us content created successfully!');
    }

    public function destroy(AboutUs $aboutUs)
    {
        if ($aboutUs->image_path && file_exists(public_path('about_us/' . $aboutUs->image_path))) {
            unlink(public_path('about_us/' . $aboutUs->image_path));
        }

        $aboutUs->delete();

        return redirect()->route('admin.about-us.index')->with('success', 'About Us content deleted successfully!');
    }
}
