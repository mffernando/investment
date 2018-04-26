<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpf','name', 'phone', 'birth', 'gender', 'notes', 'email', 'password', 'status', 'permission',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //N:N
    public function groups()
    {
      return $this->belongsToMany(Group::class, 'user_groups');
    }

    public function setPasswordAttribute($value)
    {
      $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }

    //formatting the cpf (user->formatted_cpf)
    public function getFormattedCpfAttribute()
    {
      $cpf = $this->attributes['cpf'];
      return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 7, 3) . '-' . substr($cpf, -2);
    }

    //formatting the phone number
    public function getFormattedPhoneAttribute()
    {
      $phone = $this->attributes['phone'];
      return '(' . substr($phone, 0, 2) . ') ' . substr($phone, 2, 4) . '-' . substr($phone, -4);
    }

    //formatting the date
    public function getFormattedBirthAttribute()
    {
      $birth = explode('-', $this->attributes['birth']);

      //if null or empty
      if(count($birth) != 3)
        return "";

      //DD/MM/YYYY
      $birth = $birth[2] . '/' . $birth[1] . '/' . $birth[0];
      return $birth;
    }
}
