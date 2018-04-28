<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Institution.
 *
 * @package namespace App\Entities;
 */
class Institution extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
    public $timestamps = true;

    //1:N
    public function groups()
    {
      return $this->hasMany(Group::class);
    }

    //1:N
    public function products()
    {
      return $this->hasMany(Product::class);
    }
}
