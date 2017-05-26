@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Sửa: {{$user->name}}</small>
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
                        <form action="admin/user/{{$user->id}}/sua-user.html" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name </label>
                                <input class="form-control"  value="{{$user->name}}" name="name" placeholder="Vui Lòng Nhập Name Vào" />
                            </div>
                            <div class="form-group">
                                <label>Email </label>
                                <input type="email" disabled="" value="{{$user->email}}" class="form-control" required="required" name="email" placeholder="Vui Lòng Nhập Email Vào" />
                            </div>
                            <div class="form-group">
                                <label>PassWord </label>
                                <input type="password"  id="hide" class="form-control" name="pass" placeholder="Vui Lòng Nhập PassWrord Vào" />
                                
                            </div>
                            <div class="form-group">
                                <label>Ảnh Đại Diện </label><br/>
                                <img src="upload/img_user/{{$user->img}}" width="150px">
                                <input type="file"  accept="image/x-png, image/png, image/gif, image/jpeg" class="form-control" name="img" />
                            </div>
                            <div class="form-group">
                                <label>Quyền User</label>
                                <label class="radio-inline">
                                    <input name="quyen"  value="0" 
                                        @if($user->quyen == 0)
                                            checked="" 
                                        @endif
                                     type="radio">Thành Viên
                                </label>
                                @if($admin_dtm->quyen == 1)
                                    <label class="radio-inline">
                                        <input name="quyen"  value="1" 
                                            @if($user->quyen == 1)
                                                checked="" 
                                            @endif
                                        type="radio">Admin
                                    </label>
                                @endif
                                <label class="radio-inline">
                                    <input name="quyen" value="2"
                                        @if($user->quyen == 2)
                                            checked="" 
                                        @endif
                                     type="radio">Quản Trị Viên
                                </label>
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-default">Sửa User</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#hide').val('');
   });
    
</script>
@endsection