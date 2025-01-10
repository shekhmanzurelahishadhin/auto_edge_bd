<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Institute;
use App\Models\Office;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notice>
 */
class NoticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'slug' => str_slug(fake()->sentence()),
            'description' => fake()->text(300),
            'published_at' => now(),
            'status' => 1,
            'department_id' => Department::get()->random(),
            'institute_id' => Institute::get()->random(),
            'office_id' => Office::get()->random(),
        ];
    }
}
