<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Reservation;
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

        if ($request->payment_method === 'Dompet Digital') {
            Config::$serverKey = 'SB-Mid-server-PFqveuiCIhGPe0SxcHDtGmyq';
            Config::$clientKey = 'SB-Mid-client-I8cZwkRdtdh36Q72';
            Config::$isProduction = false;

            $transaction_details = [
                'order_id' => 'ORDER-' . $reservation->id,
                'gross_amount' => $total_price,
            ];

            $item_details = [
                [
                    'id' => 'item01',
                    'price' => $total_price,
                    'quantity' => 1,
                    'name' => 'Wedding Package Reservation',
                ],
            ];

            $customer_details = [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone_number,
            ];

            $payment_type = 'digital_wallet';
            $transaction = [
                'payment_type' => $payment_type,
                'transaction_details' => $transaction_details,
                'item_details' => $item_details,
                'customer_details' => $customer_details,
            ];

            try {
                $snap_token = Snap::getSnapToken($transaction);

                return view('wedding-package.midtrans', compact('snap_token', 'reservation'));
            } catch (\Exception $e) {
                return redirect()->route('wedding-package.create')->with('error', 'Terjadi kesalahan saat proses pembayaran.');
            }
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
        $reservation->update(['status' => 'Confirmed']);

        $this->storeReservation($reservation, 'Wedding Package');

        return redirect()->route('wedding-package.create')
            ->with('success', 'Pesanan telah dikonfirmasi!');
    }

    protected function storeReservation($reservation, $packageType)
    {
        Reservation::create([
            'user_id' => $reservation->user_id,
            'reservation_date' => $reservation->schedule_date ?? $reservation->reservation_date ?? $reservation->start_date,
            'package_type' => $packageType,
            'package_id' => $reservation->id,
            'total_price' => $reservation->total_price,
            'payment_proof' => $reservation->payment_proof,
            'status' => 'Confirmed',
        ]);
    }
}
