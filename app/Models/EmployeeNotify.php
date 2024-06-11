<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EmployeeNotify
 * 
 * @property int $employee_id
 * @property string|null $name
 * @property string|null $relationship
 * @property string|null $mobile_no
 * @property string|null $address
 *
 * @package App\Models
 */
class EmployeeNotify extends Model
{
	use HasFactory;

	protected $table = 'employee_notifies';
	protected $primaryKey = 'employee_id';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'relationship',
		'mobile_no',
		'address'
	];
}
