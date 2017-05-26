@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $loi)
                                    
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    
                                    {{$loi}} <br/>
                                @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form action="admin/user/them-user.html" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name </label>
                                <input class="form-control" required="required" name="name" placeholder="Vui Lòng Nhập Name Vào" />
                            </div>
                            <div class="form-group">
                                <label>Email </label>
                                <input type="email" class="form-control" required="required" name="email" placeholder="Vui Lòng Nhập Email Vào" />
                            </div>
                            <div class="form-group">
                                <label>PassWord </label>
                                <input type="password" required="required" class="form-control" name="pass" placeholder="Vui Lòng Nhập PassWrord Vào" />
                            </div>
                            <div class="form-group">
                                <label>Ảnh Đại Diện </label>
                                <input type="file" required="required" accept="image/x-png, image/png, image/gif, image/jpeg" class="form-control" name="img" />
                            </div>
                            <div class="form-group">
                                <label>Quyền User</label>
                                <label class="radio-inline">
                                    <input name="quyen"  value="0" checked="" type="radio">Thành Viên
                                </label>
                                @if($admin_dtm->quyen == 1)
                                <label class="radio-inline">
                                    <input name="quyen"  value="1" type="radio">Admin
                                </label>
                                @endif
                                <label class="radio-inline">
                                    <input name="quyen" value="2" type="radio">Quản Trị Viên
                                </label>
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-default">Thêm User</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        
@endsection