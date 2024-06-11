<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LeaveType
 *
 * @property int $leavetype_id
 * @property string $leave_type_name
 *
 * @package App\Models
 */
class LeaveType extends Model
{
    use HasFactory;
    protected $table = 'leave_types';
    protected $primaryKey = 'leavetype_id';
    public $timestamps = false;

    protected $fillable = [
        'leave_type_name'
    ];
}
