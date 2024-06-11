<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EmployeeDoc
 * 
 * @property int $employee_id
 * @property int|null $sss
 * @property int|null $tin
 * @property int|null $philhealth
 * @property int|null $hdmf
 *
 * @package App\Models
 */
class EmployeeDoc extends Model
{
	use HasFactory;

	protected $table = 'employee_docs';
	protected $primaryKey = 'employee_id';
	public $timestamps = false;

	protected $casts = [
		'sss' => 'int',
		'tin' => 'int',
		'philhealth' => 'int',
		'hdmf' => 'int'
	];

	protected $fillable = [
		'sss',
		'tin',
		'philhealth',
		'hdmf'
	];
}
