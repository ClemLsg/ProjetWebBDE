<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'content',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')->as('users');
    }

    public function picture()
    {
        return $this->belongsTo('App\Picture');
    }
}
