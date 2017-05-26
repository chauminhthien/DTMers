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
		<div class="w3agile-1">
			<div class="welcome">
				<div class="welcome-top heading">
					<h2 class="w3">WELCOME</h2>
					<div class="welcome-bottom">
						<img src="images/t4.jpg" class="img-responsive" alt="">
						<p>Cảm ơn các bạn đã ghé thăm Website của chúng tôi</p>
						<p>Đây là một Website mang tính chất phi lợi nhuận. Và mục đích của nhóm là muốn đem lại một thứ gì đó nhỏ nhoi cho ngôi trường được mang tên <strong>Trường Đại Học Tài Nguyên Và Môi Trường TP.Hồ Chí Minh</strong></p>
						<p>Nhóm chỉ mong các bạn và thầy cô chia sẻ những kiến thức hay để Website có nhiều bài sinh động hơn. Bên cạnh đó nếu các bạn phát hiện ra lổi của hệ thống thì mong các bạn hay thông báo cho Ban Quản Trị Web biết để khắc phục nhanh chống hơn</p>
						<p>Nhóm Chân Thành Cảm ơn</p>
					</div>
				</div>
			</div>
			<div class="team">	
				<h3 class="team-heading">Thành Viên Của Nhóm</h3>
				<div class="team-grids">
					<div class="col-md-6 team-grid">
						<div class="team-grid1" style="height:360px">
							<img src="upload/img_user/cmt_n.jpg" alt=" " class="img-responsive" height="350px">
							<div class="p-mask">
								<p style="font-size:20px;">Châu Minh Thiện</p>
								
							</div>
						</div>
						<h5 style="font-family:'T';">Châu Minh Thiện<span>ADMINISTRATOR</span></h5>
						<ul class="social">
							<li><a class="social-facebook" target="_black" href="https://www.facebook.com/chauminhthien0212">
								<i></i>
								<div class="tooltip"><span>Facebook</span></div>
								</a></li>
							<li><a class="social-twitter" href="#">
								<i></i>
								<div class="tooltip"><span>Twitter</span></div>
								</a></li>
							<li><a class="social-google" href="#">
								<i></i>
								<div class="tooltip"><span>Google+</span></div>
								</a></li>
						</ul>
					</div>
					<div class="col-md-6 team-grid">
						<div class="team-grid1" style="height:360px">
							<img src="upload/img_user/HN.png" alt=" " class="img-responsive" height="350px">
							<div class="p-mask">
								<p style="font-size:20px;">Nguyễn Thị Huỳnh Như</p>
								
							</div>
						</div>
						<h5 style="font-family:'T';">Nguyễn Thị Huỳnh Như<span>Quản Trị Viên</span></h5>
						<ul class="social">
							<li><a class="social-facebook" target="_black" href="https://www.facebook.com/nhu.huynh.18041092">
								<i></i>
								<div class="tooltip"><span>Facebook</span></div>
								</a></li>
							<li><a class="social-twitter" href="#">
								<i></i>
								<div class="tooltip"><span>Twitter</span></div>
								</a></li>
							<li><a class="social-google" href="#">
								<i></i>
								<div class="tooltip"><span>Google+</span></div>
								</a></li>
						</ul>
					</div>
					<div class="col-md-6 team-grid">
						<div class="team-grid1" style="height:360px">
							<img src="upload/img_user/Trong.jpg" alt=" " class="img-responsive" height="350px">
							<div class="p-mask">
								<p style="font-size:20px;">Lưu Hoàng Trọng</p>
								
							</div>
						</div>
						<h5 style="font-family:'T';">Lưu Hoàng Trọng<span>Quản Trị Viên</span></h5>
						<ul class="social">
							<li><a class="social-facebook" target="_black" href="https://www.facebook.com/trong.luuhoang">
								<i></i>
								<div class="tooltip"><span>Facebook</span></div>
								</a></li>
							<li><a class="social-twitter" href="#">
								<i></i>
								<div class="tooltip"><span>Twitter</span></div>
								</a></li>
							<li><a class="social-google" href="#">
								<i></i>
								<div class="tooltip"><span>Google+</span></div>
								</a></li>
						</ul>
					</div>
				
					<div class="clearfix"> </div>
				</div>				
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