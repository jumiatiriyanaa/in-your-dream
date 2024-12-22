<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotographerManagementController extends Controller
{
    public function index()
    {
        $photographers = User::where('level', 0)->get();
        return view('admin.photographers.index', compact('photographers'));
    }

    public function create()
    {
        return view('admin.photographers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => 0,
        ]);

        return redirect()->route('admin.photographers.index')->with('success', 'Photographer added successfully.');
    }

    public function edit(User $photographer)
    {
        return view('admin.photographers.edit', compact('photographer'));
    }

    public function update(Request $request, User $photographer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $photographer->id,
        ]);

        $photographer->update($request->only('name', 'email'));

        return redirect()->route('admin.photographers.index')->with('success', 'Photographer updated successfully.');
    }

    public function destroy(User $photographer)
    {
        $photographer->delete();

        return redirect()->route('admin.photographers.index')->with('success', 'Photographer deleted successfully.');
    }
}
