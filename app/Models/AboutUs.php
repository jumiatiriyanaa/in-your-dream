<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'image_path',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function setImagePathAttribute($value)
    {
        if (is_string($value) && strpos($value, 'storage/') === false) {
            $this->attributes['image_path'] = 'storage/' . $value;
        } else {
            $this->attributes['image_path'] = $value;
        }
    }
}
