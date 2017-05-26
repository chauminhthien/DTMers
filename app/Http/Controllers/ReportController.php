<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Report;
class ReportController extends Controller
{
    //

    public function getDanhSach(){
    	$report = Report::all();
    	return view('admin.report.danhsach',['report' => $report]);
    }

    public function getXoa($id){
    	$report = Report::find($id);
    	$report->delete();
    	return redirect('admin/report/danh-sach.html')->with('thongbao', 'Xoá bài thành công');
    }
}
