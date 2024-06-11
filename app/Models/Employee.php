<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

/**
 * Class Employee
 *
 * @property int $employee_id
 * @property int|null $position_id
 * @property int|null $department_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property Carbon|null $hire_date
 * @property float|null $salary
 * @property Carbon $employee_timestamp
 * @property string|null $employee_status
 * @property string|null $title
 * @property string|null $middle_name
 * @property string|null $maiden_name
 * @property string|null $nick_name
 * @property string $picture
 * @property int|null $schedule_id
 *
 * @property Department|null $department
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $primaryKey = 'employee_id';
    public $timestamps = false;

    protected $casts = [
        'position_id' => 'int',
        'department_id' => 'int',
        'hire_date' => 'datetime',
        'salary' => 'float',
        'employee_timestamp' => 'datetime',
        'schedule_id' => 'int'
    ];


    protected $fillable = [
        'position_id',
        'department_id',
        'first_name',
        'last_name',
        'hire_date',
        'salary',
        'employee_timestamp',
        'employee_status',
        'title',
        'middle_name',
        'maiden_name',
        'nick_name',
        'picture',
        'schedule_id'
    ];

    public function scopeFilter($query, array $filter)
    {
        if ($filter['search'] ?? false) {
            $query->where(function ($query) use ($filter) {
                $searchTerm = '%' . $filter['search'] . '%';

                $query->where('first_name', 'like', $searchTerm)
                    ->orWhere('last_name', 'like', $searchTerm)
                    ->orWhere('employee_id', 'like', $searchTerm)
                    ->orWhere(DB::raw("CONCAT(first_name, ' ', last_name)"), 'like', $searchTerm)
                    ->orWhere('hire_date', 'like', $searchTerm)
                    ->orWhereHas('position', function ($query) use ($searchTerm) {
                        $query->where('position_name', 'like', $searchTerm);
                    });
            });
        }
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, "employee_id");
    }

    public function employeeDocs()
    {
        return $this->hasMany(EmployeeDoc::class);
    }

    public function employeeInformations()
    {
        return $this->hasMany(EmployeeInformation::class);
    }

    public function employeeNotifies()
    {
        return $this->hasMany(EmployeeNotify::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'employee_id');
    }
    public function workschedule()
    {
        return $this->belongsTo(Workschedule::class, 'schedule_id');
    }
}
