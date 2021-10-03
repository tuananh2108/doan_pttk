<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table='orders';
    protected $guarded = ['id'];
    public $timestamps =false;
    public function foods()
    {
        return $this->belongsToMany('App\models\food', 'order_food', 'order_id', 'food_id')->withPivot('quantity');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
