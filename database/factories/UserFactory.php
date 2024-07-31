<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'first_name' => fake()->name(),
            // 'middle_name' => fake()->name(),
            // 'last_name' => fake()->name(),
            // 'email' => fake()->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'remember_token' => Str::random(10),

            'email'         => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password'      => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'prefix'        => 'Mr.',
            'suffix'        => '',
            'first_name'    => 'Brye',
            'middle_name'   => 'Plata',
            'last_name'     => 'Ebora',
            'contact'       => '09056677255',
            'birthday'      => now(),
            'blood_type_id' => 1,
            'gender_id'     => 1,
            'role_id'       => 1,
            'created_by'    => 1
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
