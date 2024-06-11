<?php

namespace Database\Factories;

use App\Models\EmployeeInformation;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;


class EmployeeInformationFactory extends Factory
{
    protected $model = EmployeeInformation::class;

    public function definition()
    {
        return [
            'employee_id' => Employee::factory(),
            'date_of_birth' => $this->faker->date(),
            'place_of_birth' => $this->faker->city,
            'nationality' => $this->faker->country,
            'civil_status' => $this->faker->randomElement(['Single', 'Married', 'Divorced']),
            'mobile_no' => $this->faker->phoneNumber,
            'email_address' => $this->faker->email,
            'zip' => $this->faker->postcode,
            'city' => $this->faker->city,
            'street' => $this->faker->streetAddress,
            'province' => $this->faker->state,
            'phone_no' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
        ];
    }
}
