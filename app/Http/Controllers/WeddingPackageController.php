<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeddingPackage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WeddingPackageController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        return view('wedding-package.create', compact('user'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if (empty($user->phone_number)) {
            return redirect()->route('profile.edit')->with('error', 'Silahkan lengkapi nomor telepon Anda terlebih dahulu.');
        }

        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'event_location' => 'required|string',
            'event_type' => 'required|string',
            'details' => 'nullable|string',
            'payment_method' => 'required|string',
        ]);

        $base_price = 1800000;
        $additional_price = 0;
        $admin_fee = 3000;

        if ($request->details === "Album & Cetak 4R (80 lbr) Start [250k]") {
            $additional_price = 250000;
        }

        $total_price = $base_price + $additional_price + $admin_fee;

        $validated['user_id'] = $user->id;
        $validated['base_price'] = $base_price;
        $validated['additional_price'] = $additional_price;
        $validated['admin_fee'] = $admin_fee;
        $validated['total_price'] = $total_price;
        $validated['status'] = 'Pending';

        $reservation = WeddingPackage::create($validated);

        if ($request->payment_method === 'Transfer') {
            return redirect()->route('wedding-package.transfer', ['id' => $reservation->id]);
        }

        return redirect()->route('wedding-package.resi', ['id' => $reservation->id]);
    }

    public function transfer($id)
    {
        $reservation = WeddingPackage::findOrFail($id);
        return view('wedding-package.transfer', compact('reservation'));
    }

    public function uploadProof(Request $request)
    {
        $validated = $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'reservation_id' => 'required|exists:wedding_packages,id',
        ]);

        $reservation = WeddingPackage::findOrFail($validated['reservation_id']);

        if ($request->file('payment_proof')) {
            $path = $request->file('payment_proof')->store('payment_proofs', 'public');
            $reservation->update(['payment_proof' => $path, 'status' => 'Payment']);
        }

        return redirect()->route('wedding-package.resi', ['id' => $reservation->id])
            ->with('success', 'Bukti pembayaran berhasil diunggah!');
    }

    public function showResi($id)
    {
        $reservation = WeddingPackage::findOrFail($id);
        return view('wedding-package.resi', compact('reservation'));
    }

    public function confirm($id)
    {
        $reservation = WeddingPackage::findOrFail($id);
        $reservation->status = 'Confirmed';
        $reservation->save();

        return redirect()->route('wedding-package.create')->with('success', 'Pesanan telah dikonfirmasi!');
    }
}
