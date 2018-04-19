<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //
    protected $fillable = [
        'url', 'user_id'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product')->as('products');
    }

    public function likes()
    {
        return $this->belongsToMany('App\User')->as('users');
    }

    public function reporter()
    {
        return $this->belongsToMany('App\User','report_picture')->withPivot('reason')->as('reporter');
    }

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function activities()
    {
        return $this->belongsTo('App\Activitie');
    }

    public function postedby()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
