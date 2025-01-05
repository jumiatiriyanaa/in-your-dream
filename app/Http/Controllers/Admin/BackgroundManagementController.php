<?php

namespace App\Http\Controllers\Admin;

use App\Models\Background;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BackgroundManagementController extends Controller
{
    public function index()
    {
        $backgrounds = Background::all();
        return view('admin.backgrounds.index', compact('backgrounds'));
    }

    public function create()
    {
        return view('admin.backgrounds.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|string|in:Photobox,Self Photo',
            'is_free' => 'required|boolean',
        ]);

        $imagePath = $request->file('image')->store('background', 'public');

        Background::create([
            'name' => $request->name,
            'image_path' => $imagePath,
            'description' => 'Background Gratis',
            'type' => $request->type,
            'is_free' => $request->is_free,
        ]);

        return redirect()->route('admin.backgrounds.index')->with('success', 'Background added successfully!');
    }

    public function edit($id)
    {
        $background = Background::findOrFail($id);
        return view('admin.backgrounds.edit', compact('background'));
    }

    public function update(Request $request, $id)
    {
        $background = Background::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|string|in:Photobox,Self Photo',
            'is_free' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            if (Storage::exists('public/' . $background->image_path)) {
                Storage::delete('public/' . $background->image_path);
            }

            $imagePath = $request->file('image')->store('background', 'public');
            $background->image_path = $imagePath;
        }

        $background->update([
            'name' => $request->name,
            'type' => $request->type,
            'is_free' => $request->is_free,
            'description' => 'Background Gratis',
        ]);

        return redirect()->route('admin.backgrounds.index')->with('success', 'Background updated successfully!');
    }

    public function destroy($id)
    {
        $background = Background::findOrFail($id);

        if (Storage::exists('public/' . $background->image_path)) {
            Storage::delete('public/' . $background->image_path);
        }

        $background->delete();

        return redirect()->route('admin.backgrounds.index')->with('success', 'Background deleted successfully!');
    }
}
