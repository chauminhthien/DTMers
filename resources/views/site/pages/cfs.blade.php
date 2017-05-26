@extends('site.layout.index')
@section('title')
	Đăng Confessions
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="css/clock.css">
@endsection
@section('content')
<div class="banner-1">


</div>

	<!-- technology-left -->
	<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
			<div class="agileinfo">

		  <h2 class="w3" style="font-family:'T';">Đăng Confessions</h2>
			<div class="contact-grids">
						<div class="col-md-12 contact-grid">
							
							<p>Hãy mạnh dạng nói lên suy của mình cho mọi người biết. Và tất nhiên mọi người sẽ không biết bạn là ai kễ cả Admin</p>
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
	                        @if(session('loi'))
	                            <div class="alert alert-danger">
	                                {{session('loi')}}
	                            </div>
	                        @endif
							<form action="post-confessions.html" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group ">
                                <label>Tiêu Đề Bài Viết </label>
                                <input class="form-control" required="required" name="name" placeholder="Vui Lòng Nhập Tên Bài Vào" />
                            </div>
                            <div style="clear:both"></div>
                           <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea name="noiDung" id="noiDung" class="form-control" rows="3"></textarea>
								<script type="text/javascript">CKEDITOR.replace('noiDung');</script>
                            </div>
                            <div class="form-group">
	                                <label>Trả Lời Câu Hỏi:  <strong style="color:red">{{$capche->ch}}</strong></label>
	                                <input type="text" required="required" placeholder="Trả Lời Câu hỏi" class="form-control" name="capche" />
	                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-default">Thêm Bài Đăng</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
						</div>
						<div class="clearfix"></div>
					</div>
			  


				<div class="clearfix"></div>
			</div>
		</div>
		<!-- technology-right -->
		<div class="col-md-3 technology-right">
				
				
				<div class="blo-top1">
							
					<div class="tech-btm">
					<a class="btn btn-default link" title="Đăng Confessions" href="post-confessions.html">Đăng Confessions</a>
					<br/>
					<div class="search-1">
							<form action="tiem-kiem.html" method="get">
								<input type="search" name="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
								<input type="hidden" value="{{csrf_token()}}" name="_token">
								<input type="submit" value=" ">

							</form>
						</div>
					<h4>Bài Viết Liên Quan </h4>
						@foreach($more as $mor)
							<div class="blog-grids wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
								<div class="blog-grid-left">
									<a title="{{$mor->name}}" href="confessions/{{$mor->id}}/{{$mor->nameKhongDau}}.html"><img src="upload/cfs/cfs.jpg" class="img-responsive" alt="{{$mor->name}}"></a>
									
								</div>
								<div class="blog-grid-right">
									
									<h5><a title="{{$mor->name}}" href="confessions/{{$mor->id}}/{{$mor->nameKhongDau}}.html">{{$mor->name}}</a> </h5>
								</div>
								<div class="clearfix"> </div>
							</div>
						@endforeach
						<div class="insta">
					<h4>Fan Page</h4>
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7&appId=1758926274389371";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						
						<div class="fb-page" data-href="https://www.facebook.com/dtmerstphcm" data-tabs="messages" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/dtmerstphcm" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/dtmerstphcm">DTMers - Sinh Viên Đại Học Tài Nguyên Và Môi Trường TP.HCM</a></blockquote></div>


					</div>
					
					
					</div>
					
					
					
				</div>
				
			
		</div>
		<div class="clearfix"></div>
		<!-- technology-right -->
	</div>

	<!-- technology-left -->
	<div class="technology">
	
</div>
@endsection
@section('js')
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

@endsection