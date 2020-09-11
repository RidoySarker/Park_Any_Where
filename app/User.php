<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey='id';
    protected $fillable = [
        'name', 'email', 'password', 'gender','user_type', 'number', 'profile_image', 'email_verified', 'email_verified_at', 'email_verification_token','status','created_by','updated_by'
    ];

    public function loginValidation()
    {
        return [
            "email" => "required|email",
            "password" => "required",
        ];
    }


    public function scopeSearch($query, $search){
        return $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orwhere('email', 'like' ,'%'.$search. '%')
                    ->orwhere('number', 'like' ,'%'.$search. '%');
    }


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
}
