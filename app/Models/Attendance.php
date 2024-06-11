<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Attendance
 * 
 * @property int $attendance_id
 * @property int|null $employee_id
 * @property Carbon $attendance_date
 * @property int|null $location_id
 * @property Carbon $in_time
 * @property string|null $in_status
 * @property Carbon|null $out_time
 * @property string|null $out_status
 * @property Carbon $created_at
 *
 * @package App\Models
 */
class Attendance extends Model
{
	protected $table = 'attendances';
	protected $primaryKey = 'attendance_id';
	public $timestamps = false;

	protected $casts = [
		'employee_id' => 'int',
		'attendance_date' => 'datetime',
		'location_id' => 'int',
		'in_time' => 'datetime',
		'out_time' => 'datetime'
	];

	protected $fillable = [
		'employee_id',
		'attendance_date',
		'location_id',
		'in_time',
		'in_status',
		'out_time',
		'out_status'
	];
}
