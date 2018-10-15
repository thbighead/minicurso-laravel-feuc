<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'address'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
