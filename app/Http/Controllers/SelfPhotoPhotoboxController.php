<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SelfPhotoPhotobox;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SelfPhotoPhotoboxController extends Controller
{
    public function create()
    {
        return view('selfphoto.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'schedule_date' => 'required|date',
            'schedule_time' => 'required|string',
            'background_choice' => 'required|string',
            'number_of_friends' => 'required|integer|min:0',
            'payment_method' => 'required|string',
        ]);

        $base_price = 60000;
        $additional_cost_per_person = 15000;

        $additional_cost = 0;
        if ($validated['number_of_friends'] > 4) {
            $additional_cost = ($validated['number_of_friends'] - 4) * $additional_cost_per_person;
        }

        $admin_fee = 3000;
        $total_payment = $base_price + $additional_cost + $admin_fee;

        $validated['subtotal_package'] = $base_price;
        $validated['additional_person_cost'] = $additional_cost;
        $validated['admin_fee'] = $admin_fee;
        $validated['total_payment'] = $total_payment;

        $validated['user_name'] = Auth::user()->name;
        $validated['email'] = Auth::user()->email;
        $validated['phone_number'] = Auth::user()->phone_number;

        $reservation = SelfPhotoPhotobox::create($validated);

        return redirect()->route('selfphoto.resi', ['id' => $reservation->id]);
    }

    public function showResi($id)
    {
        $reservation = SelfPhotoPhotobox::findOrFail($id);
        return view('selfphoto.resi', compact('reservation'));
    }

    public function confirm($id)
    {
        $reservation = SelfPhotoPhotobox::findOrFail($id);
        $reservation->status = 'Confirmed';
        $reservation->save();

        return redirect()->route('selfphoto.create')->with('success', 'Pesanan telah dikonfirmasi!');
    }
}
