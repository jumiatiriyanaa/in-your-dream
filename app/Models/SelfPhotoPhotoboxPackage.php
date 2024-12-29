<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfPhotoPhotoboxPackage extends Model
{
    use HasFactory;

    protected $table = 'selfphoto_photobox_packages';

    protected $fillable = [
        'user_id',
        'schedule_date',
        'schedule_time',
        'background_choice',
        'number_of_friends',
        'payment_method',
        'base_price',
        'additional_person_cost',
        'admin_fee',
        'total_price',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
