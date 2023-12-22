<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_no' => fake()->numberBetween(1, 100),
            'room_type' => fake()->randomElement(['Standard', 'Deluxe', 'Suite', 'Presidential Suite']),
            'occupancy_limit' => fake()->numberBetween(1, 12),
            'price' => fake()->numberBetween(1000.00, 10000.00),
            'is_available' => fake()->randomElement(['Yes', 'No'])
        ];
    }
}
