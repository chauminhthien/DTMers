@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Confessions
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
                                <th>Trạng Thái</th>
                                <th>Duyệt Bài</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cfs as $pt)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$pt->id}}</td>
                                    <td>{{$pt->name}}</td>
                                    {{-- <td>{{date('d-m-Y',$pt->time)}}</td> --}}
                                    <td>{!!$pt->noiDung!!}</td>
                                    <td>
                                        @if($pt->st == 1)
                                            <i class="glyphicon glyphicon-ok"></i>
                                        @elseif($pt->st == 0)
                                            <i class="glyphicon glyphicon-remove"></i>
                                        @endif
                                    </td>
                                    @if($pt->st == 0)
                                        <td><i class="glyphicon glyphicon-ok"></i> <a href="admin/confessions/{{$pt->id}}/Y/check.html"
                                        >Duyệt</a></td>
                                    @elseif($pt->st == 1)
                                        <td><i class="glyphicon glyphicon-remove"></i> <a href="admin/confessions/{{$pt->id}}/N/check.html"
                                        >Khoá</a></td>
                                    @endif
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/confessions/xoa/{{$pt->id}}"> Delete</a></td>
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