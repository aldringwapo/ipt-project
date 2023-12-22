<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Booking extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'guest_id',
        'room_id',
        'check_in',
        'check_out',
        'total_amount',
        'payment_status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function room() {
        return $this->belongsTo(Room::class);
    }

    public function guest() {
        return $this->belongsTo(Guest::class);
    }


    public static function list() {

        $booking = Booking::orderByRaw('full_name')->get();
        $list = [];
        foreach ($booking as $book) {
            $list[$book->id] = $book->full_name;
        }
        return $list;
    }
}
