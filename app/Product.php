<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'price', 'description'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function stocks()
    {
        return $this->belongsToMany('App\Stock');
    }
}
