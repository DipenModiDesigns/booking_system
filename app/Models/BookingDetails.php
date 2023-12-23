<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'booking_type',
        'booking_date',
        'booking_slot',
        'booking_time',
    ];
}
