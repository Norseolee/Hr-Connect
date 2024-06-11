<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\EmployeeNotify;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeNotifyFactory extends Factory
{
    protected $model = EmployeeNotify::class;

    public function definition()
    {
        return [
            'employee_id' => Employee::factory(),
            'name' => $this->faker->name,
            'relationship' => $this->faker->randomElement(['Spouse', 'Parent', 'Sibling', 'Other']),
            'mobile_no' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
        ];
    }
}
