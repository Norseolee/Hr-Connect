<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EmployeeInformation
 * 
 * @property int $employee_id
 * @property Carbon|null $date_of_birth
 * @property string|null $place_of_birth
 * @property string|null $nationality
 * @property string|null $civil_status
 * @property string|null $mobile_no
 * @property string|null $email_address
 * @property string|null $zip
 * @property string|null $city
 * @property string|null $street
 * @property string|null $province
 * @property string|null $phone_no
 * @property string|null $gender
 *
 * @package App\Models
 */
class EmployeeInformation extends Model
{
	use HasFactory;

	protected $table = 'employee_informations';
	protected $primaryKey = 'employee_id';
	public $timestamps = false;

	protected $casts = [
		'date_of_birth' => 'datetime'
	];

	protected $fillable = [
		'date_of_birth',
		'place_of_birth',
		'nationality',
		'civil_status',
		'mobile_no',
		'email_address',
		'zip',
		'city',
		'street',
		'province',
		'phone_no',
		'gender'
	];
}
