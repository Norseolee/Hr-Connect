<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Leave
 *
 * @property int $leave_id
 * @property int|null $employee_id
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * @property string|null $status
 * @property string|null $approve
 * @property int $leavetype_id
 *
 * @package App\Models
 */
class Leave extends Model
{
    protected $table = 'leaves';
    protected $primaryKey = 'leave_id';
    public $timestamps = false;

    protected $casts = [
        'employee_id' => 'int',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'leave_reason' => 'string',
        'leavetype_id' => 'int'
    ];

    protected $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'status',
        'approve',
        'leave_reason',
        'leavetype_id'
    ];
}
