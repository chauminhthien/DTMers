<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //

    protected $table = 'cate';

    public function baiPost(){
    	return $this->hasMany('App\Post','id_TheLoai', 'id');
    }
}
