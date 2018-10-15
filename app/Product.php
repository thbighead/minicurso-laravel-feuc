<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'price'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function stocks()
    {
        $this->belongsToMany('App\Stock');
    }
}
