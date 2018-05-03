<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Group extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'user_id', 'institution_id'];

    //Total Value
    public function getTotalValueAttribute()
    {
      $total = 0;
      foreach($this->moviments as $moviment)
        $total += $moviment->value;

        return $total;
    }

    //owner
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    //N:N
    public function users()
    {
      return $this->belongsToMany(User::class, 'user_groups');
    }

    public function institution()
    {
      return $this->belongsTo(Institution::class);
    }

    public function moviments()
    {
      return $this->hasMany(Moviment::class);
    }
}
