<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class User
 *
 * @property int $user_id
 * @property string $username
 * @property string $password
 * @property int|null $employee_id
 * @property int $role
 *
 * @property Employee|null $employee
 *
 * @package App\Models
 */
class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $casts = [
        'employee_id' => 'int',
        'role' => 'int'
    ];

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'username',
        'password',
        'employee_id',
        'role'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
