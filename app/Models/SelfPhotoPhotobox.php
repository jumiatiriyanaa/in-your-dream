<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfPhotoPhotobox extends Model
{
    use HasFactory;

    protected $table = 'selfphoto_photobox';

    protected $fillable = [
        'user_name',
        'email',
        'phone_number',
        'schedule_date',
        'schedule_time',
        'background_choice',
        'number_of_friends',
        'payment_method',
        'virtual_account_number',
        'subtotal_package',
        'additional_person_cost',
        'admin_fee',
        'total_payment',
        'status',
    ];
}
