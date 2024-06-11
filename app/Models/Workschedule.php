<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Workschedule
 *
 * @property int $schedule_id
 * @property Carbon|null $start_time
 * @property Carbon|null $end_time
 *
 * @package App\Models
 */
class Workschedule extends Model
{
    use HasFactory;
    protected $table = 'workschedules';
    protected $primaryKey = 'schedule_id';
    public $timestamps = false;

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];

    protected $fillable = [
        'start_time',
        'end_time'
    ];
}
