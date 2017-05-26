<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cfs;
class CfsController extends Controller
{
    //

    public function getDanhSach(){
    	$cfs = Cfs::all();

    	return view('admin.cfs.danhsach',['cfs' => $cfs]);
    }

    public function getCheck($id, $ck){
    	if($ck == 'Y' || $ck == 'N'){
    		$cfs = Cfs::find($id);
    		if($ck == 'Y'){
    		$cfs->st = 1;
	    	}else if($ck == 'N'){
	    		$cfs->st = 0;
	    	}
	    	$cfs->save();
	    	return redirect('admin/confessions/danh-sach.html')->with('thongbao', 'Chỉnh sửa Thành công');
    	}else{
    		return redirect('admin/confessions/danh-sach.html')->with('loi', 'Có Lổi Xãy ra');
    	}
    }

    public function getXoa($id){
    	$cfs = Cfs::find($id);
    	$cfs->delete();
    	return redirect('admin/confessions/danh-sach.html')->with('thongbao', 'Xoá Thành công');
    }
}
