<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Reservation;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function create($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);

        if ($reservation->status !== 'Reserved') {
            return redirect()->route('reservations.index')->with('error', 'Anda hanya dapat menilai paket yang dengan status Reserved.');
        }

        return view('rating', compact('reservation'));
    }

    public function store(Request $request, $reservationId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
        ]);

        $reservation = Reservation::findOrFail($reservationId);

        Rating::create([
            'reservation_id' => $reservation->id,
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
        ]);

        return redirect()->route('reservations.index')->with('success', 'Terima kasih atas penilaian dan ulasan Anda!');
    }
}
