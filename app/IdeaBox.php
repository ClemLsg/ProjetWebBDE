<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdeaBox extends Model
{
    //
    protected $fillable = [
        'name', 'desc'
    ];

    public function creator()
    {
        return $this->belongsTo('App\User');
    }

    public function votes()
    {
        return $this->belongsToMany('App\User', 'ideabox_user','ideabox_id')->as('votes');
    }
}
