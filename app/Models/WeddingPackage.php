<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WeddingPackage extends Model
{
    use HasFactory;

    protected $table = 'wedding_packages';

    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'event_location',
        'event_type',
        'details',
        'payment_method',
        'base_price',
        'additional_price',
        'admin_fee',
        'total_price',
        'payment_proof',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
