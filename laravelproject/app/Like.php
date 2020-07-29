<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = array('id');

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function boards()
    {
        return $this->belongsTo('App\Board');
    }
}
