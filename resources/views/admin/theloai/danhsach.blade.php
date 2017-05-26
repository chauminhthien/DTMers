@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể Loại
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
                                <th>Đăng Bài</th>
                                <th>Check</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($theloai as $tl)
                               
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$tl->id}}</td>
                                        <td>{{$tl->name}}</td>
                                        <td>
                                            @if($tl->st == 1)
                                            <i class="glyphicon glyphicon-ok"></i>
                                            @elseif($tl->st == 0)
                                                <i class="glyphicon glyphicon-remove"></i>
                                            @endif
                                        </td>
                                        
                                        @if($tl->st == 0)
                                            <td><i class="glyphicon glyphicon-ok"></i> <a href="admin/the-loai/{{$tl->id}}/Y/check.html"
                                            >Đăng</a></td>
                                        @elseif($tl->st == 1)
                                            <td><i class="glyphicon glyphicon-remove"></i> <a href="admin/the-loai/{{$tl->id}}/N/check.html"
                                            >Không</a></td>
                                        @endif
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/the-loai/{{$tl->id}}/sua-the-loai.html"
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