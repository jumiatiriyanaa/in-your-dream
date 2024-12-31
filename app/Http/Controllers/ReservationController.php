<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\OtherPackage;
use App\Models\WeddingPackage;
use App\Http\Controllers\Controller;
use App\Models\SelfPhotoPhotoboxPackage;

class ReservationController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $selfPhotoPackages = SelfPhotoPhotoboxPackage::where('user_id', $userId)->get();
        $weddingPackages = WeddingPackage::where('user_id', $userId)->get();
        $otherPackages = OtherPackage::where('user_id', $userId)->get();

        $reservations = $selfPhotoPackages->merge($weddingPackages)->merge($otherPackages);

        $currentReservation = $reservations->firstWhere('status', 'Confirmed');
        $reservationHistory = $reservations->whereIn('status', ['Reserved', 'Completed', 'Cancelled']);

        return view('reservation', compact('currentReservation', 'reservationHistory'));
    }

    public function cancel($reservationId)
    {
        $reservation = SelfPhotoPhotoboxPackage::find($reservationId)
            ?? WeddingPackage::find($reservationId)
            ?? OtherPackage::find($reservationId);

        if (!$reservation) {
            return redirect()->route('reservations.index')->with('error', 'Reservation not found.');
        }

        $reservation->update(['status' => 'Cancelled']);

        Reservation::where('package_id', $reservation->id)
            ->update(['status' => 'Cancelled']);

        return redirect()->route('reservations.index')->with('success', 'Reservation has been cancelled successfully.');
    }
}
