<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => 'Imran',
            'user_type' => User::NORMAL_USER,
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'), //password
            'email_verified_at' => now(),
        ];
    }
}
