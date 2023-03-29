<?php

namespace Database\Factories;

use App\Models\OfficeFunction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OfficeFunction>
 */
class OfficeFunctionFactory extends Factory
{
    protected $model = OfficeFunction::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'office_category_id' => $this->faker->randomElement([1, 6]),
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->paragraph(50),
            'service' => $this->faker->sentence(2),
            'ministry_dept_authority' => $this->faker->sentence(3),
            'address' => $this->faker->sentence(5),
            'contact_info' => "01755000000",
            'source_link' => 'https://example.com',
            'file' => null,
            'status' => 1,
            'created_by' => 1,
        ];
    }
}
