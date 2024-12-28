<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    use HasFactory;

    protected $table = 'weddings';

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'start_date',
        'end_date',
        'event_location',
        'event_type',
        'package_details',
        'payment_method',
        'base_price',
        'additional_price',
        'admin_fee',
        'total_price',
        'status',
    ];
}
