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

    public function reporter()
    {
        return $this->belongsToMany('App\User','report_picture')->withPivot('reason')->as('reporter');
    }

    public function picture()
    {
        return $this->belongsTo('App\Picture');
    }
}
