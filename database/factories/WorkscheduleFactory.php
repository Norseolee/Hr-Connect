<?php

namespace Database\Factories;

use App\Models\Workschedule;
use Illuminate\Database\Eloquent\Factories\Factory;


class WorkscheduleFactory extends Factory
{
    protected $model = Workschedule::class;

    public function definition()
    {
        return [
            'start_time' => $this->faker->time,
            'end_time' => $this->faker->time,
        ];
    }
}
