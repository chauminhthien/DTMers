@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bài Đăng
                            <small>Post Bài</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12" style="padding-bottom:120px">
                        
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
                        <form action="admin/bai-dang/them-bai-dang.html" method="POST" enctype="multipart/form-data">
                            <div class="form-group col-lg-7">
                                <label>Thể Loại</label>
                                <select class="form-control" name="id_TheLoai">
                                    @foreach($theloai as $tl)
                                    <option value="{{$tl->id}}">{{$tl->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-7">
                                <label>Name </label>
                                <input class="form-control" required="required" name="name" placeholder="Vui Lòng Nhập Tên Bài Vào" />
                            </div>
                            <div class="form-group col-lg-7">
                                <label>Ảnh </label>
                                <input type="file" required="required" accept="image/x-png, image/png, image/gif, image/jpeg" class="form-control" name="img" />
                            </div>
                            <div style="clear:both"></div>
                           <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea name="noiDung" id="NoiDung" class="form-control" rows="3"></textarea>

                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-default">Thêm Bài Đăng</button>
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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">CKEDITOR.replace('NoiDung');</script>
@endsection