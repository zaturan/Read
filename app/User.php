<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country','zip', 'city', 'address','phone_number',
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

    public function users(){
        return $this->hasMany('App\Book');
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    /**
     * @param string|array $roles
     */

    public function authorizeRoles($roles){

        if (is_array($roles)) {

            return $this->hasAnyRole($roles)|| abort (401, 'This action is unauthorized');

        }
    }

    /**
     * check one role
     * @param string $role
     */

    public function hasRole($role){
        return null !== $this->roles()->where('name', $role)->first();
    }
}
