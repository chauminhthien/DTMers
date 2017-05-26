@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Report
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
                                <th>Lý Do</th>
                                <th>Thời Gian</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($report as $re)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$re->id}}</td>
                                    <td> <a href="admin/bai-dang/xem-bai-dang/{{$re->baidang->id}}/{{$re->baidang->nameKhongDau}}.html">{{$re->baidang->name}}</a></td>
                                    <td>{{$re->lydo}}</td>
                                    <td>{{date('d-m-Y',$re->time)}}</td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/report/{{$re->id}}/xoa.html"
                                    >Delete</a></td>
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