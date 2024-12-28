<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeddingController extends Controller
{
    public function create()
    {
        return view('weddings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'event_location' => 'required|string',
            'event_type' => 'required|string',
            'package_details' => 'nullable|string',
            'payment_method' => 'required|string',
        ]);

        $base_price = 1800000;
        $additional_price = 0;
        $admin_fee = 3000;

        if ($request->package_details === "Album & Cetak 4R (80 lbr) Start [250k]") {
            $additional_price = 250000;
        }

        $total_price = $base_price + $additional_price + $admin_fee;

        $reservation = Wedding::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'event_location' => $request->event_location,
            'event_type' => $request->event_type,
            'package_details' => $request->package_details,
            'payment_method' => $request->payment_method,
            'base_price' => $base_price,
            'additional_price' => $additional_price,
            'admin_fee' => $admin_fee,
            'total_price' => $total_price,
            'status' => 'Pending',
        ]);

        return redirect()->route('weddings.resi', ['id' => $reservation->id]);
    }

    public function showResi($id)
    {
        $reservation = Wedding::findOrFail($id);
        return view('weddings.resi', compact('reservation'));
    }

    public function confirm($id)
    {
        $reservation = Wedding::findOrFail($id);
        $reservation->status = 'Confirmed';
        $reservation->save();

        return redirect()->route('weddings.create')->with('success', 'Pesanan telah dikonfirmasi!');
    }
}
