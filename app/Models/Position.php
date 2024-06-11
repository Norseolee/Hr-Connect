<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Position
 *
 * @property int $position_id
 * @property int|null $department_id
 * @property string $position_name
 * @property string $position_status
 * @property Carbon $position_timestamp
 * @property string|null $deleted_at
 *
 * @property Department|null $department
 *
 * @package App\Models
 */
class Position extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'positions';
    protected $primaryKey = 'position_id';
    public $timestamps = false;

    protected $casts = [
        'department_id' => 'int',
        'position_timestamp' => 'datetime'
    ];

    protected $fillable = [
        'department_id',
        'position_name',
        'position_status',
        'position_timestamp'
    ];

    public function scopeFilter($query, array $filter)
    {
        $searchTerm = $filter['tag'] ?? $filter['search'] ?? null;
        if ($searchTerm !== null) {
            $query->where('position_name', 'like', '%' . $searchTerm . '%');
        }
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function employees()
    {
        return $this->hasMany(Employee::class, 'position_id');
    }
}
