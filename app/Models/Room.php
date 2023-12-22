<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;


    protected $fillable = [
        'room_no',
        'room_type',
        'occupancy_limit',
        'price',
        'is_available' ,

    ];
    
    
    public function courses() {
        return $this->hasMany(Course::class);
    }


    public function book() {
        return $this->belongsTo(Booking::class);
    }
}
