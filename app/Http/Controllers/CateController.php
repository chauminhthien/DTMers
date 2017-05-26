<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cate;
class CateController extends Controller
{
    //

    public function getDanhSach(){
    	$theloai = Cate::all();
    	return view('admin.theloai.danhsach',['theloai' => $theloai]);
    }

    public function getThem(){
    	return view('admin.theloai.them');
    }

    public function postThem(Request $request){
    	$this->validate($request,[
    			'name' 				=> 'required|unique:cate,name|min:3|max:32'
    		],[
    			'name.required' 	=> 'Chưa nhập tên thể loại vào',
    			'name.min' 			=> 'Tên thể loại quá ngắn',
    			'name.max' 			=> 'Tên thể loại quá dài',
    			'name.unique' 		=> 'Tên thể loại đã tồn tại'
    		]);

    	$theloai = new Cate();

    	$theloai->name = $request->name;
    	$theloai->nameKhongDau = changeTitle($request->name);
    	$theloai->save();

    	return redirect('admin/the-loai/them-the-loai.html')->with('thongbao','Thêm thể loại thành công');
    }

    public function getSua($id){
    	$theloai = Cate::find($id);
    	return view('admin.theloai.sua',['theloai' => $theloai]);
    }

    public function postSua($id, Request $request){
    	$this->validate($request,[
    			'name' 				=> 'required|unique:cate,name|min:3|max:32'
    		],[
    			'name.required' 	=> 'Chưa nhập tên thể loại vào',
    			'name.min' 			=> 'Tên thể loại quá ngắn',
    			'name.max' 			=> 'Tên thể loại quá dài',
    			'name.unique' 		=> 'Tên thể loại đã tồn tại'
    		]);
    	$theloai = Cate::find($id);
    	$theloai->name = $request->name;
    	$theloai->nameKhongDau = changeTitle($request->name);
    	$theloai->save();

    	return redirect('admin/the-loai/'.$id.'/sua-the-loai.html')->with('thongbao','Thêm thể loại thành công');
    }

    public function getCheck($id, $ck){
    	if($ck == 'Y' || $ck == 'N'){
            $cate = Cate::find($id);
            if($ck == 'Y'){
            $cate->st = 1;
            }else if($ck == 'N'){
                $cate->st = 0;
            }
            $cate->save();
            return redirect('admin/the-loai/danh-sach.html')->with('thongbao', 'Chỉnh sửa Thành công');
        }else{
            return redirect('admin/the-loai/danh-sach.html')->with('loi', 'Có Lổi Xãy ra');
        }
    }
}
