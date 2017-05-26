<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Post;
use App\User;

class UserController extends Controller
{
    
	function check(){
		if(Auth::check() && (Auth::user()->quyen == 1)){
			return 1;
		}
		return 0;
	}


    public function getDanhsach(){
    	$user = User::all();
    	return view('admin.user.danhsach',['user' => $user]);
    }

    public function getThem(){
    		return view('admin.user.them');
    }

    public function postThem(Request $request){

    	$this->validate($request,[
    			'name' 		=> 'required|min:3|max:32',
    			'email' 	=> 'required|email|unique:users,email|max:32',
    			'pass' 		=> 'required|min:3|max:32',
    			'img' 		=> 'required',
    			'quyen' 	=> 'required',
    		],[
    			'name.required' 	=> 'Name Không được để trống',
    			'name.min' 			=> 'Name quá ngắn',
    			'name.max' 			=> 'Name quá dài',
    			'email.required' 	=> 'Name Không được để trống',
    			'email.email' 		=> 'Email Không đúng định dạng',
    			'email.unique' 		=> 'Email đã tồn tại',
    			'email.max' 		=> 'Email quá dài',
    			'pass.required'	 	=> 'PassWord Không được để trống',
    			'pass.min' 			=> 'PassWord quá ngắn',
    			'pass.max' 			=> 'PassWord quá dài',
    			'img.required' 		=> 'Chưa chọn hình ảnh',
    			'quyen.required' 	=> 'Chưa chọn quyen cua User',

    		]);

    	$user 					= new User();
    	$user->name 			= $request->name;
    	$user->nameKhongDau 	= changeTitle($request->name);
    	$user->email 			= $request->email;
    	$user->password 			= bcrypt($request->pass);

    	$file = $request->file('img');
    	$size = $file->getClientSize();
    	$duoi = $file->getClientOriginalExtension();
    	if($size < (2*1024*1024)){
    		if($duoi != 'jpg' && $duoi != 'JPG' && $duoi != 'png' && $duoi != 'PNG' && $duoi != 'jpge'){ 
                return redirect('admin/user/them-user.html')->with('thongbao','Ảnh Không Đúng Định dạng');
            }else{
                $hinh = time().'_'.str_random(4).'_.'.$duoi;
            
                $file->move('upload/img_user', $hinh);
                $user->img             = $hinh;
            }
    	}else{
    		return redirect('admin/user/them-user.html')->with('thongbao', 'File quá lớn');
    	}
    	$user->quyen = $request->quyen;
    	$user->save();
    	return redirect('admin/user/them-user.html')->with('thongbao', 'Đã Thêm User Thành Công');
    }

    public function getSua($id){
    	

    	$user = User::find($id);
    	if($user->quyen == 1 && $this->check() != 1){
    		return redirect('admin/user/danh-sach-user.html')->with('loi', 'Bạn không quyền thực hiện chức năng này');
    	}
    	return view('admin.user.sua',['user' => $user]);
    }

    public function postSua($id, Request $request){
    	$this->validate($request,[
    			'name' 		=> 'required|min:3|max:32',
    			'pass' 		=> 'min:3|max:32',
    			'quyen' 	=> 'required',
    		],[
    			'name.required' 	=> 'Name Không được để trống',
    			'name.min' 			=> 'Name quá ngắn',
    			'name.max' 			=> 'Name quá dài',
    			'pass.min' 			=> 'PassWord quá ngắn',
    			'pass.max' 			=> 'PassWord quá dài',
    			'quyen.required' 	=> 'Chưa chọn quyen cua User',

    		]);

    	$user 					= User::find($id);
    	$user->name 			= $request->name;
    	$user->nameKhongDau 	= changeTitle($request->name);
    	if($request->has('pass')){
    		$user->password 	= bcrypt($request->pass);
    	}else{
    		$user->password = $user->password;
    	}

    	if($request->hasFile('img')){
    		$file = $request->file('img');
	    	$size = $file->getClientSize();
	    	$duoi = $file->getClientOriginalExtension();
	    	if($size < (2*1024*1024)){
	    		if($duoi != 'jpg' && $duoi != 'JPG' && $duoi != 'png' && $duoi != 'PNG' && $duoi != 'jpge'){ 
	                return redirect('admin/user/'.$id.'/sua-user.html')->with('thongbao','Ảnh Không Đúng Định dạng');
	            }else{
	                $hinh = time().'_'.str_random(4).'_.'.$duoi;
	            	@unlink('upload/img_user/'.$user->img);
	                $file->move('upload/img_user', $hinh);
	               
	                $user->img             = $hinh;
	            }
	    	}else{
	    		return redirect('admin/user/'.$id.'/sua-user.html')->with('thongbao', 'File quá lớn');
	    	}
    	}else{
    		 $user->img =  $user->img;
    	}
    	 $user->quyen = $request->quyen;

    	$user->save();
    	return redirect('admin/user/'.$id.'/sua-user.html')->with('thongbao', 'Update thông tin thành công');
    }





    public function getXoa($id){
    	

    	$user = User::find($id);

        
    	if($user->quyen == 1 && $this->check() != 1){
    		return redirect('admin/user/danh-sach-user.html')->with('loi', 'Bạn không quyền thực hiện chức năng này');
    	}
        $post = Post::where('id_User',$id)->get();
        foreach ($post as $value) {
            @unlink('upload/post/'.$value->img);
            $value->delete();
        }
    	unlink('upload/img_user/'. $user->img);
    	$user->delete();
    	return redirect('admin/user/danh-sach-user.html')->with('thongbao','Xoá Thành Công');
    }


    public function getLogin(){
    	return view('admin.login');
    }
    public function postLogin(Request $request){
    	$this->validate($request,[
    			'email' 	=> 'required|email',
    			'pass' 		=> 'required|min:3|max:32',
    		],[
    			'email.required' 	=> 'Name Không được để trống',
    			'email.email' 		=> 'Email Không đúng định dạng',
    			'pass.required'	 	=> 'PassWord Không được để trống',
    			'pass.min' 			=> 'PassWord quá ngắn',
    			'pass.max' 			=> 'PassWord quá dài',

    		]);

    	if(Auth::attempt(['email'=> $request->email, 'password' => $request->pass])){
            return redirect('admin/user/danh-sach-user.html');
        }else{
            return redirect('admin/dang-nhap.html')->with('thongbao','Thông Tin Đăng Nhập Không Đúng');
        }
    }

    public function getLogout(){
    	Auth::logout();

        return redirect('admin/dang-nhap.html');
    }

    public function getInfo(){
    	$user = User::find(Auth::user()->id);
    	return view('admin.user.info',['user' => $user]);
    }

    public function postInfo(Request $request){
    	$this->validate($request,[
    			'name' 		=> 'required|min:3|max:32',
    			'pass' 		=> 'required|min:3|max:32',
    		],[
    			'name.required' 	=> 'Name Không được để trống',
    			'name.min' 			=> 'Name quá ngắn',
    			'name.max' 			=> 'Name quá dài',
    			'pass.required'	 	=> 'PassWord Không được để trống',
    			'pass.min' 			=> 'PassWord quá ngắn',
    			'pass.max' 			=> 'PassWord quá dài',

    		]);

    	$user 					= User::find(Auth::user()->id);
    	$user->name 			= $request->name;
    	$user->nameKhongDau 	= changeTitle($request->name);
    	$user->password 		= bcrypt($request->pass);


    	if($request->hasFile('img')){
    		$file = $request->file('img');
	    	$size = $file->getClientSize();
	    	$duoi = $file->getClientOriginalExtension();
	    	if($size < (2*1024*1024)){
	    		if($duoi != 'jpg' && $duoi != 'JPG' && $duoi != 'png' && $duoi != 'PNG' && $duoi != 'jpge'){ 
	                return redirect('admin/user/thong-tin-user.html')->with('thongbao','Ảnh Không Đúng Định dạng');
	            }else{
	                $hinh = time().'_'.str_random(4).'_.'.$duoi;
	            	@unlink('upload/img_user/'.$user->img);
	                $file->move('upload/img_user', $hinh);
	               
	                $user->img             = $hinh;
	            }
	    	}else{
	    		return redirect('admin/user/thong-tin-user.html')->with('thongbao', 'File quá lớn');
	    	}
    	}else{
    		 $user->img =  $user->img;
    	}

    	$user->save();
    	return redirect('admin/user/thong-tin-user.html')->with('thongbao', 'Update thông tin thành công');
    }

    
}
