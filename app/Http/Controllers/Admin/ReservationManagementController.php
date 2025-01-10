<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use App\Models\OtherPackage;
use Illuminate\Http\Request;
use App\Models\WeddingPackage;
use App\Http\Controllers\Controller;
use App\Models\SelfPhotoPhotoboxPackage;

class ReservationManagementController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('user')
            ->orderBy('created_at', 'desc')
            ->get();
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

        $package = null;
        if ($reservation->package_type == 'Self Photo / Photobox') {
            $package = SelfPhotoPhotoboxPackage::find($reservation->package_id);
        } elseif ($reservation->package_type == 'Wedding Package') {
            $package = WeddingPackage::find($reservation->package_id);
        } elseif ($reservation->package_type == 'Other Package') {
            $package = OtherPackage::find($reservation->package_id);
        }

        if ($package) {
            $package->update(['status' => $request->status]);
        }

        return redirect()->route('admin.reservations.index')->with('success', 'Status reservation updated successfully.');
    }
}
