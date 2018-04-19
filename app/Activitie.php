<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Activitie extends Model
{

    protected $fillable = [
        'name', 'description', 'price', 'recurrent', 'date', 'user_id',
    ];

    protected $dates = [
        'date'
    ];

    public function participants()
    {
        return $this->belongsToMany('App\User')->as('users');
    }

    public function pictures()
    {
        return $this->hasMany('App\Picture');
    }

    public function creator()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
