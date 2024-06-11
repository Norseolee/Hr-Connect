<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Department;
use App\Models\LeaveType;
use App\Models\Location;
use App\Models\Role;
use App\Models\Workschedule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory()->create([
            'role_id' => 1,
            'role_name' => 'Admin',
        ]);

        Role::factory()->create([
            'role_id' => 2,
            'role_name' => 'User',
        ]);
        Location::factory()->create([
            'location_name' => 'On-Site',
        ]);
        LeaveType::factory()->create([
            'leave_type_name' => 'Birthday Leave',
        ]);
        Workschedule::factory()->create([
            'schedule_id' => 1,
            'start_time' => '08:00',
            'end_time' => '05:00',
        ]);

        $this->CreateUserAdmins();

        Department::factory()->create([
            'department_name' => 'Human Resource Developement',
            'department_status' => 'Active',
        ]);

        Position::factory()->create([
            'department_id' => 2,
            'position_name' => 'Human Resource Associate',
        ]);

        Employee::factory(500)->withEmployeeData()->create();
    }

    private function CreateUserAdmins()
    {

        $department = Department::factory()->create([
            'department_name' => 'Website Administrator',
            'department_status' => 'Active',
        ]);
        $position = Position::factory()->create([
            'department_id' => $department->department_id,
            'position_name' => 'Database Admin',
        ]);
        Employee::factory()
            ->withUser("Aster255", Hash::make('Pa$$w0rd!'), 1)
            ->withEmployeeData()
            ->create([
                'position_id' => $position->position_id,
                'department_id' => $department->department_id,
                'first_name' => "Paul Adrian",
                'last_name' => "Alcos",
                'hire_date' => now(),
                'salary' => "30000",
                'middle_name' => "Aquino",
                'nick_name' => "Paui",
            ]);
        Employee::factory()
            ->withUser("Norseolee", Hash::make('Pa$$w0rd!'), 1)
            ->withEmployeeData()
            ->create([
                'position_id' => $position->position_id,
                'department_id' => $department->department_id,
                'first_name' => "Norhajar",
                'last_name' => "Gabuya",
                'hire_date' => now(),
                'salary' => "30000",
                'middle_name' => "",
                'nick_name' => "Nor",
            ]);
    }
}
