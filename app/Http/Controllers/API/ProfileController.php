<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function getProfile($id)
    {
        $user = User::findOrFail($id);

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'phone_number' => $user->phone_number,
            'address' => $user->address,
            'login_type' => $user->login_type,
            'level' => $user->level,
        ], 200);
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            'phone_number' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = User::find($request->input('id'));

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        $avatarFileName = $user->avatar;

        if ($request->hasFile('avatar')) {
            if ($avatarFileName) {
                Storage::disk('public')->delete('avatars/' . $avatarFileName);
            }

            $file = $request->file('avatar');
            $avatarFileName = $file->hashName();
            $file->storeAs('avatars', $avatarFileName, 'public');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'avatar' => $avatarFileName,
        ]);

        return response()->json([
            'message' => 'Profile updated successfully!',
            'user' => $user,
        ], 200);
    }
}
