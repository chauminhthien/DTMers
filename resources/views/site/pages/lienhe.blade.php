@extends('site.layout.index')
@section('title')
	Liên Hệ
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="css/clock.css">
@endsection
@section('content')
<div class="banner-1">
</div>
<div class="services w3l wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
		
	</div>
	<!-- technology-left -->
	<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
		<div class="contact-section">
				<h2 class="w3">Liên Hệ</h2>		
					<div class="contact-grids">
						<div class="col-md-8 contact-grid">
							
							<p>Nếu Bạn có thắc mắc hay có đống gớp gì về chúng tôi. Bạn hãy nói với chúng tôi. Xin cảm ơn các bạn đả ủng hộ</p>
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
							<form action="lien-he.html" method="post">
							
								<input type="text" name="title" placeholder="Vui Lòng Nhập Title Vào"  required="">
								<input type="email" name="email" placeholder="Vui Lòng Nhập Email Vào"  required="">
								<textarea type="text" name="noidung"  required=""></textarea>
								<input type="hidden" value="{{csrf_token()}}" name="_token">
								<input type="submit" value="Send">
							</form>
						</div>
						<div class="col-md-4 contact-grid1">
							<h4>Address</h4>
							<div class="contact-top">
								
								
								<div class="clearfix"></div>
							</div>
							<ul>
									<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i> Office : 0963.501.008</li>
									<li><i class="glyphicon glyphicon-phone" aria-hidden="true"></i> Mobile : 0963.501.008</li>
									<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>dtmers@gmail.com</li>
									<li><i class="glyphicon glyphicon-print" aria-hidden="true"></i> Fax : Chưa Có</li>
								</ul>

						</div>
						<div class="clearfix"></div>
					</div>
				
			</div>
			
		</div>
		<!-- technology-right -->
		<div class="col-md-3 technology-right">
				
				
				<div class="blo-top1">
							
					<div class="tech-btm">
					<a class="btn btn-default link" title="Đăng Bài Viết" href="user/dang-bai.html">Đăng Bài</a>
					<div class="search-1 wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
							<form action="tiem-kiem.html" method="get">
								<input type="search" name="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
								<input type="hidden" value="{{csrf_token()}}" name="_token">
								<input type="submit" value=" ">

							</form>	
						</div>
					<h4>Các Bài Đăng Khác </h4>
						@foreach($more as $mor)
						<div class="blog-grids wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
							<div class="blog-grid-left">
								<a title="{{$mor->name}}" href="chi-tiet/{{$mor->id}}/{{$mor->nameKhongDau}}.html"><img src="upload/post/{{$mor->img}}" class="img-responsive" alt="{{$mor->name}}"></a>
							</div>
							<div class="blog-grid-right">
								
								<h5><a title="{{$mor->name}}" href="chi-tiet/{{$mor->id}}/{{$mor->nameKhongDau}}.html">{{$mor->name}}</a> </h5>
							</div>
							<div class="clearfix"> </div>
						</div>
						@endforeach

					<div class="insta wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
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
</div>
@endsection

