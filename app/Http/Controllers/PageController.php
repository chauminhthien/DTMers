<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Cate;
use App\Cfs;
use App\Post;
use App\User;
use App\Report;
use App\Capche;
use Mail;
class PageController extends Controller
{
    //

    public function __construct(){
        session_start();
        $_SESSION['ad'] = 0;
    	$menu = Cate::all();
    	view()->share(['menu' => $menu]);
        $this->check_user();
    }

    function check_user(){
        $user = Auth::user();
        view()->share(['user_dtm' => $user]);
    }

    public function getIndex(){
    	$post = Post::where('st',1)->orderBy('id', 'DESC')->take(6)->get();
    	$postmore = Post::where('st',1)->take(6)->get();
    	return view('site.pages.index',['post' =>$post, 'more' => $postmore]);
    }

    public function getChiTiet($id){
    	$chitiet  = Post::find($id);
        if($chitiet->st == 0){
            return redirect('error404.html');
        }
    	$more = Post::where('id_TheLoai', $chitiet->id_TheLoai)->orderBy('id', 'DESC')->take(5)->get();
    	return view('site.pages.chitiet',['chitiet' => $chitiet, 'more' => $more]);
    }

    public function getCate($id){
    	$cate = Cate::find($id);//['id_User'=> $id, 'st' => 1]
    	$post = Post::where(['id_TheLoai'=> $id, 'st' => 1])->orderBy('id', 'DESC')->paginate(6);
    	$postmore = Post::where('st',1)->take(6)->get();
    	return view('site.pages.cate',['cate' =>$cate, 'post' => $post, 'more' => $postmore]);
    }

    public function getTimKiem(Request $request){
    	$post = Post::where('name', 'like', '%'.$request->search.'%')->orWhere('nameKhongDau', 'like', '%'.$request->search.'%')->orderBy('id', 'DESC')->paginate(6);
    	$postmore = Post::where('st',1)->take(6)->get();
    	$kq = ['key' => $request->search, 'count' => count($post)];

    	return view('site.pages.search',['post'=> $post, 'more' => $postmore, 'kq' => $kq]);

    }

    public function getLienHe(){
    	$postmore = Post::where('st',1)->take(6)->get();
    	return view('site.pages.lienhe',['more' => $postmore]);
    }

    public function getCfs(){
    	$confessions 	= Cfs::where('st', 1)->orderBy('id', 'DESC')->paginate(6);
    	$postmore 		= Post::where('st',1)->take(6)->get();

    	return view('site.pages.confessions', ['confessions' => $confessions, 'more' => $postmore]);
    }

    public function getXemCfs($id){
    	$confessions 	= Cfs::where('st', 1)->take(6)->get();
    	$xemcfs = Cfs::find($id);
        if($xemcfs->st == 0){
            return redirect('error404.html');
        }
    	return view('site.pages.xemcfs',['more' => $confessions, 'xemcfs' => $xemcfs]);
    }

    public function getLogin(){
        return view('site.login');
    }

    public function postLogin(Request $request){
        $this->validate($request,[
                'email'     => 'required|email',
                'pass'      => 'required|min:3|max:32',
            ],[
                'email.required'    => 'Name Không được để trống',
                'email.email'       => 'Email Không đúng định dạng',
                'pass.required'     => 'PassWord Không được để trống',
                'pass.min'          => 'PassWord quá ngắn',
                'pass.max'          => 'PassWord quá dài',

            ]);

        if(Auth::attempt(['email'=> $request->email, 'password' => $request->pass])){
            return redirect('./');
        }else{
            return redirect('dang-nhap.html')->with('thongbao','Thông Tin Đăng Nhập Không Đúng');
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect('./');
    }

    public function getDangKy(){
        $postmore = Post::where('st',1)->take(6)->get();
        $capche = Capche::all()->random(1);

        $_SESSION['capche'] = $capche->tl;
        return view('site.pages.dangky',['more' => $postmore, 'capche' => $capche]);
    }

    public function postDangKy(Request $request){
        if($_SESSION['capche'] != $request->capche){
            return redirect('dang-ky.html')->with('loi', 'Bạn Trả Lời Sai Câu Hỏi');
        }
        $this->validate($request,[
                'name'      => 'required|min:3|max:32',
                'email'     => 'required|email|unique:users,email|max:32',
                'pass'      => 'required|min:3|max:32',
                'img'       => 'required',
                'capche'    => 'required',
            ],[
                'name.required'     => 'Name Không được để trống',
                'name.min'          => 'Name quá ngắn',
                'name.max'          => 'Name quá dài',
                'email.required'    => 'Name Không được để trống',
                'email.email'       => 'Email Không đúng định dạng',
                'email.unique'      => 'Email đã tồn tại',
                'email.max'         => 'Email quá dài',
                'pass.required'     => 'PassWord Không được để trống',
                'pass.min'          => 'PassWord quá ngắn',
                'pass.max'          => 'PassWord quá dài',
                'img.required'      => 'Chưa chọn hình ảnh',
                'capche.required'   => 'Chưa Trả lời câu hỏi',

            ]);

        

        $user                   = new User();
        $user->name             = $request->name;
        $user->nameKhongDau     = changeTitle($request->name);
        $user->email            = $request->email;
        $user->password         = bcrypt($request->pass);

        $file = $request->file('img');
        $size = $file->getClientSize();
        $duoi = $file->getClientOriginalExtension();
        if($size < (2*1024*1024)){
            if($duoi != 'jpg' && $duoi != 'JPG' && $duoi != 'png' && $duoi != 'PNG' && $duoi != 'jpge'){ 
                return redirect('dang-ky.html')->with('loi','Ảnh Không Đúng Định dạng');
            }else{
                $hinh = time().'_'.str_random(4).'_.'.$duoi;
            
                $file->move('upload/img_user', $hinh);
                $user->img             = $hinh;
            }
        }else{
            return redirect('dang-ky.html')->with('loi', 'File quá lớn');
        }
        $user->quyen = 0;
        $user->save();
        return redirect('dang-ky.html')->with('thongbao', 'Chúc mừng bạn đã đăng ký thành công');
    }

    public function postLienHe(Request $request){
        $this->validate($request,[
                'title'             => 'required|min:3|max:32',
                'email'             => 'required|email',
                'noidung'           => 'required|min:3'
            ],[
                'title.required'    => 'Bạn Chưa Nhập Tiêu đề',
                'title.min'         => 'Tiêu đề quá ngắn',
                'title.max'         => 'Tiêu đề quá dai',
                'email.required'    => 'Chưa nhập Email',
                'email.email'       => 'Email không đúng định dạng',
                'noidung.required'  => 'Bạn Chưa Nhập nội dung',
                'noidung.min'       => 'Nội Dung quá ngắn',

            ]);
        $mail   = $request->email;
        $title  = $request->title;
        $data   = ['noidung' => $request->noidung, 'mail' => $mail, 'title' => $title];
        Mail::send('site.mail.send', $data, function ($message) {
            $message->from('dtmers@gmail.com', 'Sinh Viên DTMers'); 
            $message->to('dtmers@gmail.com', 'Sinh Viên DTMers');
        
            $message->subject('Mail Liên Hệ');
        });
        return redirect('lien-he.html')->with('thongbao', 'Cảm Ơn Bạn đả để lại lời nhắn cho chúng tôi. Chúng tôi sẽ trả lời cho bạn sớm nhất');
    }

    public function getGioiThieu(){
        $postmore = Post::where('st',1)->take(6)->get();
        return view('site.pages.gioithieu',['more' => $postmore]);
    }

    public function getDangBai(){
        $postmore = Post::where('st',1)->take(6)->get(); 
        $cate = Cate::where('st',1)->get();
        $capche = Capche::all()->random(1);

        $_SESSION['capche'] = $capche->tl;
        return view('site.pages.dangbai',['more' => $postmore,'cate' => $cate, 'capche' => $capche]);
    }

    public function postDangBai(Request $request){
        $cate = Cate::where('id',$request->id_TheLoai)->take(1)->get();
        foreach ($cate as $value) {
           if($value->st == 0){
                return redirect('user/dang-bai.html')->with('loi', 'Có Lổi Xãy ra');
            }
        }
        if($_SESSION['capche'] != $request->capche){
            return redirect('user/dang-bai.html')->with('loi', 'Bạn Trả Lời Sai Câu Hỏi');
        }
        
        $this->validate($request,[
                'name'          => 'required|min:3|max:100',
                'img'           => 'required',
                'noiDung'       => 'required|min:10',
            ],[
                'name.required'     => 'Name Không được để trống',
                'name.min'          => 'Name quá ngắn',
                'name.max'          => 'Name quá dài',
                'img.required'      => 'Chưa chọn hình ảnh',
                'noiDung.required'  => 'Nội Dung Không được để trống',
                'noiDung.min'       => 'Nội Dung quá ngắn',

            ]);
        $post =  new Post();

        $post->name = $request->name;
        $post->nameKhongDau = changeTitle($request->name);
        $post->time = time();

        $file = $request->file('img');
        $size = $file->getClientSize();
        $duoi = $file->getClientOriginalExtension();
        if($size < (2*1024*1024)){
            if($duoi != 'jpg' && $duoi != 'JPG' && $duoi != 'png' && $duoi != 'PNG' && $duoi != 'jpge'){ 
                return redirect('user/dang-bai.html')->with('loi','Ảnh Không Đúng Định dạng');
            }else{
                $hinh = time().'_'.str_random(4).'_.'.$duoi;
                $file->move('upload/post', $hinh);
               
                $post->img             = $hinh;
            }
        }else{
            return redirect('user/dang-bai.html')->with('loi', 'File quá lớn');
        }

        $post->noiDung = $request->noiDung;
       
        if(Auth::user()->quyen == 1 || Auth::user()->quyen == 2){
             $post->st = 1;
        }else{
             $post->st = 0;
        }
        $post->id_TheLoai = $request->id_TheLoai;
        
        $post->id_User = Auth::user()->id;

        $post->save();
        return redirect('user/dang-bai.html')->with('thongbao', 'Đăng Bài Thành Công Xin vui lòng đợi Admin kiểm tra');
    }

    public function getInfo($id){
        $postmore = Post::where('st',1)->take(6)->get();
        $info = User::find($id);
        $post = Post::where(['id_User'=> $id, 'st' => 1])->orderBy('id', 'DESC')->paginate(6);
        return view('site.pages.info',['more' => $postmore, 'info' => $info,'post' => $post]);
    }

    public function getReport($id){
        $post = Post::find($id);
        $postmore = Post::where('st',1)->take(6)->get();
        $capche = Capche::all()->random(1);

        $_SESSION['capche'] = $capche->tl;
        return view('site.pages.report',['more' => $postmore, 'post' => $post, 'capche' => $capche]);
    }

    public function postReport($id, Request $request){
        $post = Post::find($id);
        if($_SESSION['capche'] != $request->capche){
            return redirect('report/'.$post->id.'/'.$post->nameKhongDau.'.html')->with('loi', 'Bạn Trả Lời Sai Câu Hỏi');
        }
        
        $this->validate($request,[
                'lydo'       => 'required|min:10',
            ],[
                'lydo.required'  => 'Nội Dung Không được để trống',
                'lydo.min'       => 'Nội Dung quá ngắn',
            ]);

        $report             = new Report();
        $report->id_post    = $id;
        $report->lydo       = $request->lydo;
        $report->time       = time();
        $report->save();
        return redirect('report/'.$post->id.'/'.$post->nameKhongDau.'.html')->with('thongbao', 'Cảm Ơn Bạn đã báo cáo bài viết cho chúng tôi. Chúng tôi sẽ kiểm tra lại bài viết này');
    }

    // public function getSuaInfo(){
        
    // }

    public function getConfessions(){
        $postmore = Cfs::where('st',1)->take(6)->get();
        $capche = Capche::all()->random(1);

        $_SESSION['capche'] = $capche->tl;
        return view('site.pages.cfs',['more' =>$postmore,'capche' => $capche]);
    }

    public function postConfessions(Request $request){
        if($_SESSION['capche'] != $request->capche){
            return redirect('post-confessions.html')->with('loi', 'Bạn Trả Lời Sai Câu Hỏi');
        }
        
        $this->validate($request,[
                'name'          => 'required|min:3|max:100',
                'noiDung'       => 'required|min:10',
            ],[
                'name.required'     => 'Name Không được để trống',
                'name.min'          => 'Name quá ngắn',
                'name.max'          => 'Name quá dài',
                'noiDung.required'  => 'Nội Dung Không được để trống',
                'noiDung.min'       => 'Nội Dung quá ngắn',

            ]);

        $cfs = new Cfs();
        $cfs->name = $request->name;
        $cfs->nameKhongDau = changeTitle($request->name);
        $cfs->noiDung = $request->noiDung;
        $cfs->time = time();

        $cfs->save();
        return redirect('post-confessions.html')->with('thongbao', 'Bạn đã đăng thành công. Vui lòng đợi Admin kiễm tra lại nội dung bài đăng');
    }

    public function get404(){
        return view('404.index');
    }

    public function getSuaInfo(){
        $info = User::find(Auth::user()->id);
        $postmore = Cfs::where('st',1)->take(6)->get();
        $capche = Capche::all()->random(1);

        $_SESSION['capche'] = $capche->tl;
        return view('site.pages.suainfo',['more' =>$postmore,'info' => $info,'capche' => $capche]);
    }

    public function postSuaInfo(Request $request){
    
        if($_SESSION['capche'] != $request->capche){
            return redirect('user/sua-thong-tin-ca-nhan.html')->with('loi', 'Bạn Trả Lời Sai Câu Hỏi');
        }

        $this->validate($request,[
                'name'      => 'required|min:3|max:32',
                'pass'      => 'min:3|max:32',
            ],[
                'name.required'     => 'Name Không được để trống',
                'name.min'          => 'Name quá ngắn',
                'name.max'          => 'Name quá dài',
                'pass.min'          => 'PassWord quá ngắn',
                'pass.max'          => 'PassWord quá dài',

            ]);

        
    
        $user                   = User::find(Auth::user()->id);
        $user->name             = $request->name;
        $user->nameKhongDau     = changeTitle($request->name);
        if($request->has('pass')){
             $user->password         = bcrypt($request->pass);
        }else{
            $user->password = $user->password;
        }
      
       if($request->hasFile('img')){
            $file = $request->file('img');
            $size = $file->getClientSize();
            $duoi = $file->getClientOriginalExtension();
            if($size < (2*1024*1024)){
                if($duoi != 'jpg' && $duoi != 'JPG' && $duoi != 'png' && $duoi != 'PNG' && $duoi != 'jpge'){ 
                    return redirect('user/sua-thong-tin-ca-nhan.html')->with('loi','Ảnh Không Đúng Định dạng');
                }else{
                    $hinh = time().'_'.str_random(4).'_.'.$duoi;
                    
                    $file->move('upload/img_user', $hinh);
                    @unlink('upload/img_user/'.$user->img);
                    $user->img             = $hinh;
                }
            }else{
                return redirect('user/sua-thong-tin-ca-nhan.html')->with('loi', 'File quá lớn');
            }
        }
       $user->save();
        return redirect('user/sua-thong-tin-ca-nhan.html')->with('thongbao', 'Sửa đổi thông tin thành công');
    }
}
