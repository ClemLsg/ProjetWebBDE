<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'price', 'description', 'stock', 'category_id'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')->as('users')->withPivot('quantity');
    }

    public function pictures()
    {
        return $this->belongsToMany('App\Picture')->as('pictures');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order')->as('orders')->withPivot('quantity');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
