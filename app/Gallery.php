<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['image' , 'session_id'];

    public function Session(){
        return$this->belongsTo('App\Session');
    }
}
