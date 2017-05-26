<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Capche;

class CapcheController extends Controller
{
    //

    public function getDanhSach(){
    	$capche = Capche::all();
    	return view('admin.capche.danhsach',['capche' => $capche]);
    }

    public function getThem(){
    	return view('admin.capche.them');
    }

    public function postThem(Request $request){
    	$this->validate($request,[
    			'ch' => 'required',
    			'tl' => 'required'
    		], [
    			'ch.required' => 'Chưa nhập câu hỏi',
    			'tl.required' => 'Chưa nhập câu trả lời',
    		]);

    	$capche 	= new Capche();
    	$capche->ch = $request->ch;
    	$capche->tl = $request->tl;
    	$capche->save();
    	return redirect('admin/capche/them-capche.html')->with('thongbao','Thêm CapChe Thành Công');
    }

    public function getXoa($id){
    	$capche = Capche::find($id);
    	$capche->delete();
    	return redirect('admin/capche/danh-sach-capche.html')->with('thongbao','Xoá CapChe Thành Công');
    }

    public function getSua($id){
    	$capche = Capche::find($id);
    	return view('admin.capche.sua',['capche' => $capche]);
    }

    public function postSua(Request $request, $id){
    	$this->validate($request,[
    			'ch' => 'required',
    			'tl' => 'required'
    		], [
    			'ch.required' => 'Chưa nhập câu hỏi',
    			'tl.required' => 'Chưa nhập câu trả lời',
    		]);

    	$capche 	= Capche::find($id);
    	$capche->ch = $request->ch;
    	$capche->tl = $request->tl;
    	$capche->save();
    	return redirect('admin/capche/'.$id.'/sua-capche.html')->with('thongbao','Sửa CapChe Thành Công');
    }
    
}
