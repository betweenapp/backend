<?php


namespace Betweenapp\Backend\Models;

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
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function($user) {
            //$user->password = \Hash::make($user->password);
        });
        static::updating(function($user) {
            //$user->password = \Hash::make($user->password);
        });
    }

}
