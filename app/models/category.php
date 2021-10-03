<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $table = 'categories';
    //protected $guarded = [];
    public $timestamps = false;
    public function foods() {
        return $this->hasMany('App\models\food', 'category_id', 'id');
    }
}
