<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    protected $fillable = [
        'reservation_id',
        'rating',
        'review',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
}
