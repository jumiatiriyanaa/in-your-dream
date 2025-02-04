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
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function create()
    {
        $user = Auth::user();
        $reservedRanges = WeddingPackage::select('start_date', 'end_date')->get()->map(function ($reservation) {
            return [
                'from' => \Carbon\Carbon::parse($reservation->start_date)->format('Y-m-d'),
                'to' => \Carbon\Carbon::parse($reservation->end_date)->format('Y-m-d')
            ];
        });

        return view('wedding-package.create', compact('user', 'reservedRanges'));
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
        } elseif ($request->payment_method === 'Dompet Digital') {
            return redirect()->route('wedding-package.midtrans', ['id' => $reservation->id]);
        }

        return redirect()->route('wedding-package.resi', ['id' => $reservation->id]);
    }

    private function generateUniqueOrderId($prefix = 'WP', $length = 10)
    {
        do {
            $randomNumbers = substr(str_shuffle('0123456789'), 0, $length);
            $orderId = $prefix . $randomNumbers;

            $exists = WeddingPackage::where('order_id', $orderId)->exists();
        } while ($exists);

        return $orderId;
    }

    public function midtrans($id)
    {
        $reservation = WeddingPackage::findOrFail($id);

        $orderId = $this->generateUniqueOrderId();

        $reservation->order_id = $orderId;
        $reservation->save();

        $transactionDetails = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $reservation->total_price,
            ],
            'customer_details' => [
                'first_name' => $reservation->user->name,
                'email' => $reservation->user->email,
                'phone' => $reservation->user->phone_number,
            ],
        ];

        $snapToken = Snap::getSnapToken($transactionDetails);

        return view('wedding-package.midtrans', compact('reservation', 'snapToken'));
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
            ->with('success', 'Pesanan sedang diproses!');
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
