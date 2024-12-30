<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'payment_proof',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
