<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Department
 *
 * @property int $department_id
 * @property string $department_name
 * @property string $department_status
 * @property Carbon $department_timestamp
 *
 * @property Collection|Employee[] $employees
 * @property Collection|Position[] $positions
 *
 * @package App\Models
 */
class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';
    protected $primaryKey = 'department_id';
    public $timestamps = false;

    protected $casts = [
        'department_timestamp' => 'datetime'
    ];

    protected $fillable = [
        'department_name',
        'department_status',
        'department_timestamp'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id');
    }

    public function positions()
    {
        return $this->hasMany(Position::class, 'department_id');
    }
}
