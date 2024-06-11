<?php


namespace Database\Factories;

use App\Models\Employee;
use App\Models\EmployeeDoc;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeDocFactory extends Factory
{
    protected $model = EmployeeDoc::class;

    public function definition()
    {
        return [
            'employee_id' => Employee::factory(),
            'sss' => $this->faker->numberBetween(100000000, 999999999),
            'tin' => $this->faker->numberBetween(100000000000, 999999999999),
            'philhealth' => $this->faker->numberBetween(100000000000, 999999999999),
            'hdmf' => $this->faker->numberBetween(100000000000, 999999999999),
        ];
    }
}
