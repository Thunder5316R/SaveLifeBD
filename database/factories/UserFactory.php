<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'name' => fake()->name(),
        'email' => fake()->unique()->safeEmail(),
        'phone' => fake()->phoneNumber(),
        'optional_number' => fake()->phoneNumber(),
        'present_address' => fake()->address(),
        'blood_group' => fake()->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
        'weight' => fake()->numberBetween(50, 100),
        'last_blood_donate' => fake()->optional()->date(),
        'email_verify' => 1,
        'status' => 1,
        'blood_donate_number' => fake()->numberBetween(0, 10),
        'password' => bcrypt('password'), // ডিফল্ট পাসওয়ার্ড
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
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
