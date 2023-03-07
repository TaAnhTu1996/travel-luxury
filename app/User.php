<?php

namespace App;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
        return $this->belongsTo(Role::class, 'role_id','id');
    }

    // hàm kiểm tra user hiện tại có được gán 1 quyền nào đó hay không,
    // nếu có thì trả về true

    public function hasPermissionModel(Permission $permission) {
//        echo $permission->name;

        $check = !!optional(optional($this->role)->permissions)->contains($permission);
//        var_dump($check);
//        die();
        return $check;
    }

    public function hasPermission($string)
    {
        $permission = Permission::where('name', $string)->firstOrFail();
        return $this->hasPermissionModel($permission);
    }
}
