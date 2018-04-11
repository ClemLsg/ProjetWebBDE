<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'content',
    ];

    public function writer()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function picture()
    {
        return $this->belongsTo('App\Picture');
    }
}
