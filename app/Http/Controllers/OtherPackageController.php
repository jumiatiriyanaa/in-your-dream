<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Package;
use App\Models\Reservation;
use App\Models\OtherPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OtherPackageController extends Controller
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
        $packages = Package::whereNotIn('name', ['Selfphoto/Photobox', 'Wedding'])->get();
        $reservedDates = OtherPackage::pluck('reservation_date')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y-m-d');
        })->toArray();

        return view('other-package.create', compact('user', 'packages', 'reservedDates'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if (empty($user->phone_number)) {
            return redirect()->route('profile.edit')->with('error', 'Silahkan lengkapi nomor telepon Anda terlebih dahulu.');
        }

        $validated = $request->validate([
            'package_type' => 'required|string|max:50',
            'reservation_date' => 'required|date',
            'location' => 'nullable|string',
            'additional_info' => 'nullable|string',
            'payment_method' => 'required|string',
        ]);

        $base_price = 100000;
        $admin_fee = 3000;
        $total_price = $base_price + $admin_fee;

        $validated['user_id'] = $user->id;
        $validated['base_price'] = $base_price;
        $validated['admin_fee'] = $admin_fee;
        $validated['total_price'] = $total_price;
        $validated['status'] = 'Pending';

        $reservation = OtherPackage::create($validated);

        if ($request->payment_method === 'Transfer') {
            return redirect()->route('other-package.transfer', ['id' => $reservation->id]);
        } elseif ($request->payment_method === 'Dompet Digital') {
            return redirect()->route('other-package.midtrans', ['id' => $reservation->id]);
        }

        return redirect()->route('other-package.resi', ['id' => $reservation->id]);
    }

    private function generateUniqueOrderId($prefix = 'OP', $length = 10)
    {
        do {
            $randomNumbers = substr(str_shuffle('0123456789'), 0, $length);
            $orderId = $prefix . $randomNumbers;

            $exists = OtherPackage::where('order_id', $orderId)->exists();
        } while ($exists);

        return $orderId;
    }

    public function midtrans($id)
    {
        $reservation = OtherPackage::findOrFail($id);

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

        return view('other-package.midtrans', compact('reservation', 'snapToken'));
    }

    public function transfer($id)
    {
        $reservation = OtherPackage::findOrFail($id);
        return view('other-package.transfer', compact('reservation'));
    }

    public function uploadProof(Request $request)
    {
        $validated = $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'reservation_id' => 'required|exists:other_packages,id',
        ]);

        $reservation = OtherPackage::findOrFail($validated['reservation_id']);

        if ($request->file('payment_proof')) {
            $path = $request->file('payment_proof')->store('payment_proofs', 'public');
            $reservation->update(['payment_proof' => $path, 'status' => 'Payment']);
        }

        return redirect()->route('other-package.resi', ['id' => $reservation->id])
            ->with('success', 'Bukti pembayaran berhasil diunggah!');
    }

    public function showResi($id)
    {
        $reservation = OtherPackage::findOrFail($id);
        return view('other-package.resi', compact('reservation'));
    }

    public function confirm($id)
    {
        $reservation = OtherPackage::findOrFail($id);
        $reservation->update(['status' => 'Confirmed']);

        $this->storeReservation($reservation, 'Other Package');

        return redirect()->route('other-package.create')
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
