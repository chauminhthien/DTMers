<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use App\Post;
use App\Cate;
use App\Report;

class PostController extends Controller
{
    //

    public function getDanhSach(){
    	$post = Post::all();
    	return view('admin.post.danhsach',['post' => $post]);
    }

    public function getXem($id){
    	$post = Post::find($id);
    	return view('admin.post.xem',['post' => $post]);
    }

    public function getThem(){
    	$theloai = Cate::all();
    	return view('admin.post.them',['theloai' => $theloai]);
    }

    public function postThem(Request $request){
    	$this->validate($request,[
    			'name' 			=> 'required|min:3|max:100',
    			'img' 			=> 'required',
    			'noiDung' 		=> 'required|min:3',
    		],[
    			'name.required' 	=> 'Name Không được để trống',
    			'name.min' 			=> 'Name quá ngắn',
    			'name.max' 			=> 'Name quá dài',
    			'img.required' 		=> 'Chưa chọn hình ảnh',
    			'noiDung.required' 	=> 'Nội Dung Không được để trống',
    			'noiDung.min' 		=> 'Nội Dung quá ngắn',

    		]);
    	$id =  Auth::user()->id;
    	$post =  new Post();

    	$post->name = $request->name;
    	$post->nameKhongDau = changeTitle($request->name);
    	$post->time = time();

		$file = $request->file('img');
    	$size = $file->getClientSize();
    	$duoi = $file->getClientOriginalExtension();
    	if($size < (2*1024*1024)){
    		if($duoi != 'jpg' && $duoi != 'JPG' && $duoi != 'png' && $duoi != 'PNG' && $duoi != 'jpge'){ 
                return redirect('/admin/bai-dang/them-bai-dang.html')->with('thongbao','Ảnh Không Đúng Định dạng');
            }else{
                $hinh = time().'_'.str_random(4).'_.'.$duoi;
                $file->move('upload/post', $hinh);
               
                $post->img             = $hinh;
            }
    	}else{
    		return redirect('/admin/bai-dang/them-bai-dang.html')->with('thongbao', 'File quá lớn');
    	}

    	$post->noiDung = $request->noiDung;
    	$post->st = 1;
    	$post->id_TheLoai = $request->id_TheLoai;
    	$post->id_User = $id;

    	$post->save();
    	return redirect('/admin/bai-dang/them-bai-dang.html')->with('thongbao', 'Đăng Bài Thành Công');
    	
    }

    public function getCheck($id, $ck){
    	
    	if($ck == 'Y' || $ck == 'N'){
    		$post = Post::find($id);
    		if($ck == 'Y'){
    		$post->st = 1;
	    	}else if($ck == 'N'){
	    		$post->st = 0;
	    	}
	    	$post->save();
	    	return redirect('admin/bai-dang/danh-sach.html')->with('thongbao', 'Chỉnh sửa Thành công');
    	}else{
    		return redirect('admin/bai-dang/danh-sach.html')->with('loi', 'Có Lổi Xãy ra');
    	}
    	
    }

    public function getSua($id){
    	$post = Post::find($id);
    	$theloai = Cate::all();
    	return view('admin.post.sua',['post' => $post, 'theloai' =>$theloai]);
    }

    public function postSua($id, Request $request){
    	$this->validate($request,[
    			'name' 			=> 'required|min:3|max:100',
    			'noiDung' 		=> 'required|min:3',
    		],[
    			'name.required' 	=> 'Name Không được để trống',
    			'name.min' 			=> 'Name quá ngắn',
    			'name.max' 			=> 'Name quá dài',
    			'noiDung.required' 	=> 'Nội Dung Không được để trống',
    			'noiDung.min' 		=> 'Nội Dung quá ngắn',

    		]);
    	$post =  Post::find($id);

    	$post->name = $request->name;
    	$post->nameKhongDau = changeTitle($request->name);

    	if($request->hasFile('img')){
    		$file = $request->file('img');
	    	$size = $file->getClientSize();
	    	$duoi = $file->getClientOriginalExtension();
	    	if($size < (2*1024*1024)){
	    		if($duoi != 'jpg' && $duoi != 'JPG' && $duoi != 'png' && $duoi != 'PNG' && $duoi != 'jpge'){ 
	                return redirect('admin/bai-dang/'.$id.'/sua-bai-dang.html')->with('loi','Ảnh Không Đúng Định dạng');
	            }else{
	                $hinh = time().'_'.str_random(4).'_.'.$duoi;
	            	@unlink('upload/post/'.$user->img);
	                $file->move('upload/post', $hinh);
	               
	                $post->img             = $hinh;
	            }
	    	}else{
	    		return redirect('admin/bai-dang/'.$id.'/sua-bai-dang.html')->with('loi', 'File quá lớn');
	    	}
    	}else{
    		 $post->img =  $post->img;
    	}

    	$post->noiDung = $request->noiDung;
    	$post->id_TheLoai = $request->id_TheLoai;
    	$post->save();
    	return redirect('admin/bai-dang/'.$id.'/sua-bai-dang.html')->with('thongbao', 'Sửa bài thành công');

    }

    public function getXoa($id){
    	$post = Post::find($id);
        $report = Report::where('id_post',$id)->get();
        foreach ($report as  $value) {
            $value->delete();
        }
    	@unlink('upload/post/'.$post->img);
    	$post->delete();
    	return redirect('admin/bai-dang/danh-sach.html')->with('thongbao', 'Xoá bài thành công');
    }
}
