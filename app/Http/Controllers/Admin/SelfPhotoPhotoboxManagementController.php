<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SelfPhotoPhotobox;
use App\Http\Controllers\Controller;

class SelfPhotoPhotoboxManagementController extends Controller
{
    public function index()
    {
        $data = SelfPhotoPhotobox::all();
        return response()->json($data, 200);
    }

    public function show($id)
    {
        $data = SelfPhotoPhotobox::find($id);

        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'schedule_date' => 'required|date',
            'schedule_time' => 'required|string',
            'background_choice' => 'required|string',
            'number_of_friends' => 'required|integer',
            'payment_method' => 'required|string',
            'virtual_account_number' => 'nullable|string',
            'subtotal_package' => 'required|integer',
            'additional_person_cost' => 'nullable|integer',
            'admin_fee' => 'required|integer',
            'total_payment' => 'required|integer',
        ]);

        $data = SelfPhotoPhotobox::create($validatedData);

        return response()->json(['message' => 'Data created successfully', 'data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        $data = SelfPhotoPhotobox::find($id);

        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $validatedData = $request->validate([
            'user_name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email',
            'phone_number' => 'sometimes|required|string',
            'schedule_date' => 'sometimes|required|date',
            'schedule_time' => 'sometimes|required|string',
            'background_choice' => 'sometimes|required|string',
            'number_of_friends' => 'sometimes|required|integer',
            'payment_method' => 'sometimes|required|string',
            'virtual_account_number' => 'nullable|string',
            'subtotal_package' => 'sometimes|required|integer',
            'additional_person_cost' => 'nullable|integer',
            'admin_fee' => 'sometimes|required|integer',
            'total_payment' => 'sometimes|required|integer',
        ]);

        $data->update($validatedData);

        return response()->json(['message' => 'Data updated successfully', 'data' => $data], 200);
    }

    public function destroy($id)
    {
        $data = SelfPhotoPhotobox::find($id);

        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'Data deleted successfully'], 200);
    }
}
