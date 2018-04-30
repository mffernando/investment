<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Moviment.
 *
 * @package namespace App\Entities;
 */
class Moviment extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['user_id', 'group_id', 'product_id', 'value', 'type'];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function group(){
      return $this->belongsTo(Group::class);
    }

    public function product(){
      return $this->belongsTo(Product::class);
    }
}
