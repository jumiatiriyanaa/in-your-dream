<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Background;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\SelfPhotoPhotoboxPackage;

class SelfPhotoPhotoboxPackageController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function checkReservation(Request $request)
    {
        $date = $request->query('date');

        $reservedTimes = SelfPhotoPhotoboxPackage::where('schedule_date', $date)
            ->pluck('schedule_time')
            ->map(function ($time) {
                return substr($time, 0, 5);
            })
            ->toArray();

        return response()->json(['disabledTimes' => $reservedTimes]);
    }

    public function create()
    {
        $user = Auth::user();
        $backgrounds = Background::all();
        return view('selfphoto-photobox-package.create', compact('user', 'backgrounds'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if (empty($user->phone_number)) {
            return redirect()->route('profile.edit')->with('error', 'Silahkan lengkapi nomor telepon Anda terlebih dahulu.');
        }

        $validated = $request->validate([
            'schedule_date' => 'required|date',
            'schedule_time' => 'required|string',
            'background_choice' => 'required|string',
            'number_of_friends' => 'required|integer|min:1',
            'payment_method' => 'required|string',
        ]);

        $existingReservation = SelfPhotoPhotoboxPackage::where('schedule_date', $validated['schedule_date'])
            ->where('schedule_time', $validated['schedule_time'])
            ->exists();

        if ($existingReservation) {
            return redirect()->back()->with('error', 'Waktu yang Anda pilih sudah dipesan.');
        }

        $base_price = 60000;
        $additional_cost_per_person = 15000;

        $additional_cost = 0;
        if ($validated['number_of_friends'] > 4) {
            $additional_cost = ($validated['number_of_friends'] - 4) * $additional_cost_per_person;
        }

        $admin_fee = 3000;
        $total_price = $base_price + $additional_cost + $admin_fee;

        $validated['user_id'] = $user->id;
        $validated['base_price'] = $base_price;
        $validated['additional_person_cost'] = $additional_cost;
        $validated['admin_fee'] = $admin_fee;
        $validated['total_price'] = $total_price;
        $validated['status'] = 'Pending';

        $reservation = SelfPhotoPhotoboxPackage::create($validated);

        if ($request->payment_method === 'Transfer') {
            return redirect()->route('selfphoto-photobox.transfer', ['id' => $reservation->id]);
        } elseif ($request->payment_method === 'Dompet Digital') {
            return redirect()->route('selfphoto-photobox.midtrans', ['id' => $reservation->id]);
        }

        return redirect()->route('selfphoto-photobox-package.resi', ['id' => $reservation->id]);
    }

    private function generateUniqueOrderId($prefix = 'SPP', $length = 10)
    {
        do {
            $randomNumbers = substr(str_shuffle('0123456789'), 0, $length);
            $orderId = $prefix . $randomNumbers;

            $exists = SelfPhotoPhotoboxPackage::where('order_id', $orderId)->exists();
        } while ($exists);

        return $orderId;
    }

    public function midtrans($id)
    {
        $reservation = SelfPhotoPhotoboxPackage::findOrFail($id);

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

        return view('selfphoto-photobox-package.midtrans', compact('reservation', 'snapToken'));
    }

    public function transfer($id)
    {
        $reservation = SelfPhotoPhotoboxPackage::findOrFail($id);
        return view('selfphoto-photobox-package.transfer', compact('reservation'));
    }

    public function uploadProof(Request $request)
    {
        $validated = $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'reservation_id' => 'required|exists:selfphoto_photobox_packages,id',
        ]);

        $reservation = SelfPhotoPhotoboxPackage::findOrFail($validated['reservation_id']);

        if ($request->file('payment_proof')) {
            $path = $request->file('payment_proof')->store('payment_proofs', 'public');
            $reservation->update(['payment_proof' => $path, 'status' => 'Payment']);
        }

        return redirect()->route('selfphoto-photobox-package.resi', ['id' => $reservation->id])
            ->with('success', 'Bukti pembayaran berhasil diunggah!');
    }

    public function showResi($id)
    {
        $reservation = SelfPhotoPhotoboxPackage::findOrFail($id);
        return view('selfphoto-photobox-package.resi', compact('reservation'));
    }

    public function confirm($id)
    {
        $reservation = SelfPhotoPhotoboxPackage::findOrFail($id);
        $reservation->update(['status' => 'Confirmed']);

        $this->storeReservation($reservation, 'Self Photo / Photobox');

        return redirect()->route('selfphoto-photobox-package.create')
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
