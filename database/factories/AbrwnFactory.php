<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Abrwn>
 */
class AbrwnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence(2);

        return [
            'is_abrwn' => 5,
            'abrwn_category_id' => $this->faker->randomElement([9, 10]),
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'description' => $this->faker->paragraph(20),
            'thumbnail_image' => null,
            'status' => 1,
            'created_by' => 1,
            'guard_name' => 'admin',
        ];
    }
}
