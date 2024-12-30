<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OtherPackage extends Model
{
    use HasFactory;

    protected $table = 'other_packages';

    protected $fillable = [
        'user_id',
        'package_type',
        'reservation_date',
        'location',
        'additional_info',
        'payment_method',
        'base_price',
        'admin_fee',
        'total_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
