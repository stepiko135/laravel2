<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'title' => 'required|max:140',
        'message' => 'string|max:140',
    );

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
