<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Guest;
use App\Models\Room;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'guest_id' => fake() -> randomElement(Guest::pluck('id')),
            'room_id' => fake() -> randomElement(Room::pluck('id')),
            'check_in' => fake()->date(),
            'check_out' => fake()->date(),
            'total_amount' => fake()->numberBetween(1000, 10000),
            'payment_status' => fake()->randomElement(['Paid', 'Pending']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
