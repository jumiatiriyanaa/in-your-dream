<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\SelfPhotoPhotoboxPackage;

class SelfPhotoPhotoboxPackageController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        return view('selfphoto-photobox-package.create', compact('user'));
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
            'number_of_friends' => 'required|integer|min:0',
            'payment_method' => 'required|string',
        ]);

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

        return redirect()->route('selfphoto-photobox-package.resi', ['id' => $reservation->id]);
    }

    public function showResi($id)
    {
        $reservation = SelfPhotoPhotoboxPackage::findOrFail($id);
        return view('selfphoto-photobox-package.resi', compact('reservation'));
    }

    public function confirm($id)
    {
        $reservation = SelfPhotoPhotoboxPackage::findOrFail($id);
        $reservation->status = 'Confirmed';
        $reservation->save();

        return redirect()->route('selfphoto-photobox-package.create')->with('success', 'Pesanan telah dikonfirmasi!');
    }
}
