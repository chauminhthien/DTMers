@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bài Đăng
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                     @if(session('loi'))
                            <div class="alert alert-danger">
                                {{session('loi')}}
                            </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Nội Dung</th>
                                <th>Hình</th>
                                <th>Trạng Thái</th>
                                <th>Thể Loại</th>
                                <th>Người Đăng</th>
                                <th>Duyệt Bài</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post as $pt)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$pt->id}}</td>
                                    <td><a target="_black" href="admin/bai-dang/xem-bai-dang/{{$pt->id}}/{{$pt->nameKhongDau}}.html">{{$pt->name}}</a></td>
                                    <td>{{date('d-m-Y',$pt->time)}}</td>
                                    <td><img src="upload/post/{{$pt->img}}" alt="{{$pt->name}}" width="100px"></td>
                                    <td>
                                        @if($pt->st == 1)
                                            <i class="glyphicon glyphicon-ok"></i>
                                        @elseif($pt->st == 0)
                                            <i class="glyphicon glyphicon-remove"></i>
                                        @endif
                                    </td>
                                    <td>{{$pt->theloai->name}}</td>
                                    <td>{{$pt->user->name}}</td>
                                    @if($pt->st == 0)
                                        <td><i class="glyphicon glyphicon-ok"></i> <a href="admin/bai-dang/{{$pt->id}}/Y/check.html"
                                        >Duyệt</a></td>
                                    @elseif($pt->st == 1)
                                        <td><i class="glyphicon glyphicon-remove"></i> <a href="admin/bai-dang/{{$pt->id}}/N/check.html"
                                        >Khoá</a></td>
                                    @endif
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/bai-dang/xoa/{{$pt->id}}"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/bai-dang/{{$pt->id}}/sua-bai-dang.html"
                                    >Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        
@endsection