<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
            //     'full_name' => $this->faker->name(),
            // 'email' => $this->faker->email(),
            // 'phoneNumber' => $this->faker->phoneNumber(),
            // 'check_in_date' => $checkInDate,
            // 'check_out_date' => $checkOutDate,
            // 'room_type' => $this->faker->randomElement(['Standard ', 'Deluxe', 'Presidential suite']),
            // 'total_guests' => $this->faker->randomNumber(1),
            // 'payment_status' => $this->faker->randomElement(['Pending ', 'Paid']),
        'full_name',
        'email',
        'phoneNumber',
        'check_in_date',
        'check_out_date',
        'room_type',
        'total_guests',
    ];

    public function booking() {
        return $this->belongsTo(Booking::class);
    }
}
