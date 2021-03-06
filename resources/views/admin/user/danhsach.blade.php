@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
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
                                <th>Email</th>
                                <th>Ảnh Đại Diện</th>
                                <th>Quyền</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $us)
                                @if($us->id != $admin_dtm->id)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$us->id}}</td>
                                        <td>{{$us->name}}</td>
                                        <td>{{$us->email}}</td>
                                        <td><img src="upload/img_user/{{$us->img}}" alt="{{$us->name}}" width="200px"></td>
                                        <td>
                                            @if($us->quyen == 0)
                                                Thành Viên
                                            @elseif($us->quyen == 1)
                                                Admin
                                            @elseif($us->quyen == 2)
                                                Quản Trị Viên
                                            @endif
                                        </td>

                                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/xoa/{{$us->id}}"> Delete</a></td>
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/{{$us->id}}/sua-user.html"
                                        >Edit</a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        
@endsection