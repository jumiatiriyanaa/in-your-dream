<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'user_id',
        'reservation_date',
        'package_type',
        'package_id',
        'total_price',
        'payment_proof',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->morphTo();
    }

    public function rating()
    {
        return $this->hasOne(Rating::class, 'reservation_id');
    }
}
