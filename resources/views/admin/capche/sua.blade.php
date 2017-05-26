@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">CapChe
                            <small>Sửa</small>
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
                        <form action="admin/capche/{{$capche->id}}/sua-capche.html" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Câu Hỏi </label>
                                <input class="form-control" value="{{$capche->ch}}" required="required" name="ch" placeholder="Vui Lòng Nhập Câu Hỏi Vào Vào" />
                            </div>
                            <div class="form-group">
                                <label>Câu Trả Lời </label>
                                <input class="form-control" value="{{$capche->tl}}" required="required" name="tl" placeholder="Vui Lòng Nhập Câu Trả Lời Vào Vào" />
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-default">Sửa CapChe</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        
@endsection