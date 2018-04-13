<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'surname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function activities()
    {
        return $this->belongsToMany('App\Activitie')->as('activities');
    }

    public function propose()
    {
        return $this->hasMany('App\Activitie');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->belongsToMany('App\Picture')->as('likes');
    }

    public function cart()
    {
        return $this->belongsToMany('App\Product')->as('cart')->withPivot('quantity');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function avatar()
    {
        return $this->belongsTo('App\Picture');
    }
}
