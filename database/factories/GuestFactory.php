<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Guest;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guest>
 */
class GuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Guest::class;

    public function definition(): array
    {
        $checkInDate = $this->faker->dateTime();
        $checkOutDate = $this->faker->dateTimeInInterval($checkInDate, '+22 hours')->format('Y-m-d H:i:s');

        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phoneNumber' => $this->faker->numerify('09#########'),
            'check_in_date' => $checkInDate,
            'check_out_date' => $checkOutDate,
            'room_type' => $this->faker->randomElement(['Standard ', 'Deluxe', 'Presidential suite']),
            'total_guests' => $this->faker->randomNumber(1),
        ];
    }
}
