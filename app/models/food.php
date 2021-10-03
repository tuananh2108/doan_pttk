<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class food extends Model
{
    protected $table = 'foods';
    protected $guarded = ['id'];
    public $timestamps = false;
    public function categories()
    {
        return $this->belongsTo('App\models\category', 'category_id', 'id');
    }
    
    public function orders()
    {
        return $this->belongsToMany('App\models\order', 'order_food', 'food_id', 'order_id')->withPivot('quantity');
    }
}
