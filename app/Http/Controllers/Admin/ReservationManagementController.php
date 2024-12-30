<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationManagementController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('user')->get();
        return view('admin.reservations.index', compact('reservations'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'status' => 'required|string|in:Reserved,Cancelled',
        ]);

        $reservation->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.reservations.index')->with('success', 'Status reservation updated successfully.');
    }
}
