<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trail extends Model
{
    protected $guarded = ['id'];

    public function user(){
        return $this->belongTo('App\Trail');
    }
}
