<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //

    protected $table = 'report';

    public function baidang(){
    	return $this->belongsTo('App\Post','id_post', 'id');
    }
}
