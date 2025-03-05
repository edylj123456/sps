<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'owner_name',
        'owner_phone_number',
        'owner_address',
        'date_schedule',
        'dog_name',
        'dog_breed',
        'dog_age',
        'dog_sex',
        'dog_photo',
    ];
    protected $casts = [
        'date_schedule' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
