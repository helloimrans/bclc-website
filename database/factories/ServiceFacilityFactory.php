<?php

namespace Database\Factories;

use App\Models\ServiceFacility;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceFacility>
 */
class ServiceFacilityFactory extends Factory
{
    protected $model = ServiceFacility::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'service_facility_category_id' => $this->faker->randomElement([1, 6]),
            'service' => $this->faker->sentence(2),
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->paragraph(50),
            'authority' => $this->faker->sentence(3),
            'contact_info' => fake()->phoneNumber(),
            'source_link' => 'https://example.com',
            'file' => null,
            'status' => 1,
            'created_by' => 1,
        ];
    }
}
