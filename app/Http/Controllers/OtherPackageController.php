<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OtherPackage;
use Illuminate\Support\Facades\Auth;

class OtherPackageController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        return view('other-package.create', compact('user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_type' => 'required|string|max:50',
            'address' => 'required|string',
            'reservation_date' => 'required|date',
            'additional_info' => 'nullable|string',
            'payment_method' => 'required|string',
        ]);

        $user = Auth::user();

        $base_price = 100000;
        $admin_fee = 3000;

        $total_price = $base_price + $admin_fee;

        $validated['name'] = $user->name;
        $validated['phone_number'] = $user->phone_number;
        $validated['base_price'] = $base_price;
        $validated['admin_fee'] = $admin_fee;
        $validated['total_price'] = $total_price;
        $validated['status'] = 'Pending';

        $validated['payment_method'] = $request->payment_method;

        $reservation = OtherPackage::create($validated);

        return redirect()->route('other-package.resi', ['id' => $reservation->id]);
    }

    public function showResi($id)
    {
        $reservation = OtherPackage::findOrFail($id);
        return view('other-package.resi', compact('reservation'));
    }

    public function confirm($id)
    {
        $reservation = OtherPackage::findOrFail($id);
        $reservation->status = 'Confirmed';
        $reservation->save();

        return redirect()->route('other-package.create')->with('success', 'Pesanan telah dikonfirmasi!');
    }
}
