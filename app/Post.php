<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $table = 'post';

    public function user(){
    	return $this->belongsTo('App\User','id_User', 'id');
    }
    public function theloai(){
    	return $this->belongsTo('App\Cate','id_TheLoai', 'id');
    }
}
