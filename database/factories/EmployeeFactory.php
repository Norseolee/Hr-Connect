<?php

namespace Database\Factories;

use App\Models\EmployeeDoc;
use App\Models\EmployeeInformation;
use App\Models\EmployeeNotify;
use App\Models\Position;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use App\Models\Workschedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        $excludedPositionIds = [1];
        $excludedDepartmentIds = [1];

        $position = Position::whereNotIn('position_id', $excludedPositionIds)->inRandomOrder()->first();
        $department = Department::whereNotIn('department_id', $excludedDepartmentIds)->inRandomOrder()->first();
        $workschedule = Workschedule::inRandomOrder()->first();

        if ($position) {
            return [
                'position_id' => $position->position_id,
                'department_id' => $department->department_id,
                'first_name' => $this->faker->firstName,
                'last_name' => $this->faker->lastName,
                'hire_date' => $this->faker->date(),
                'salary' => $this->faker->numberBetween(25000, 50000),
                'middle_name' => $this->faker->optional()->lastName,
                'nick_name' => $this->faker->optional()->userName,
                'picture' => 'https://robohash.org/' . $this->faker->firstName . $this->faker->lastName . '.png?set=set5',
                'schedule_id' => $workschedule->schedule_id,
            ];
        } else {
            return [
                'first_name' => $this->faker->firstName,
                'last_name' => $this->faker->lastName,
                'hire_date' => $this->faker->date(),
                'salary' => $this->faker->numberBetween(25000, 50000),
                'middle_name' => $this->faker->optional()->lastName,
                'nick_name' => $this->faker->optional()->userName,
                'picture' => 'https://robohash.org/' . $this->faker->firstName . $this->faker->lastName . '.png?set=set5',
                'schedule_id' => $workschedule->schedule_id,
            ];
        }
    }

    public function withUser($username, $password, $role)
    {
        return $this->afterCreating(function (Employee $employee) use ($username, $password, $role) {
            User::factory()->create([
                'username' => $username,
                'password' => $password,
                'employee_id' => $employee->employee_id,
                'role' => $role
            ]);
        });
    }

    public function withEmployeeData()
    {
        return $this->afterCreating(function (Employee $employee) {
            EmployeeInformation::factory()->create([
                'employee_id' => $employee->employee_id,
            ]);
            EmployeeNotify::factory()->create([
                'employee_id' => $employee->employee_id,
            ]);
            EmployeeDoc::factory()->create([
                'employee_id' => $employee->employee_id,
            ]);
        });
    }
}
