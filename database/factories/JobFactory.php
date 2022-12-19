<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\JobType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => Str::random(20),
            'description' => Str::random(240),
            'job_type_id' => JobType::CLT,
            'company_id' => Company::factory()->create()->id,
            'salary' => 1600,
            'start_time' => '08:00',
            'end_time' => '17:00'
        ];
    }
}
