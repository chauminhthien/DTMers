@extends('site.layout.index')
@section('title')
	{{$info->name}} 
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
				<h2 class="w3">Thông Tin Cá Nhân</h2>		
					<div class="contact-grids">
						
						<div class="col-md-12 contact-grid1">
							<h4>Info</h4>
							<ul>
								<li><i class="glyphicon glyphicon-user" aria-hidden="true"></i> Name : {{$info->name}}</li>
								<li><i class="glyphicon glyphicon-picture" aria-hidden="true"></i> Ảnh Đại Diện : <img src="upload/img_user/{{$info->img}}" width="100px"></li>
								<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email: {{$info->email}}</li>
								<li><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i> Chức Vụ : 
								@if($info->quyen == 1)
									ADMINISTRATOR
								@elseif($info->quyen == 2)
									Quản Trị Viên
								@else
									Thành Viên
								@endif
								</li>
								@if($user_dtm->id == $info->id)
								<li>
									<a class="btn btn-default link" title="Đăng Bài Viết" href="user/sua-thong-tin-ca-nhan.html">Thay Đổi Thông Tin Cá Nhân</a>
								</li>
								@endif
							</ul>

						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 contact-grid">
							<h2 style="color:orange; font-family:'T';">Các Bài Đăng Của: {{$info->name}}</h2>
							@foreach($post as $pt)
								<div class="wthree">
									 <div class="col-md-6 wthree-left wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
										<div class="tch-img">
												<a title="{{$pt->name}}" href="chi-tiet/{{$pt->id}}/{{$pt->nameKhongDau}}.html"><img src="upload/post/{{$pt->img}}" class="img-responsive" alt="{{$pt->name}}"></a>
											</div>
									 </div>
									 <div class="col-md-6 wthree-right wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
											<h3><a title="{{$pt->name}}" href="chi-tiet/{{$pt->id}}/{{$pt->nameKhongDau}}.html">{{$pt->name}}</a></h3>
												<div class="bht1">
													<a title="{{$pt->name}}" href="chi-tiet/{{$pt->id}}/{{$pt->nameKhongDau}}.html">Read More</a>
												</div>
												<div class="soci">
													<ul>
														<li class="hvr-rectangle-out"><a class="fb" target="_black" href="https://www.facebook.com/sharer/sharer.php?u=www.dtmers.com/public/chi-tiet/{{$pt->id}}/{{$pt->nameKhongDau}}.html"></a></li>
									<li class="hvr-rectangle-out"><a class="goog" target="_black" href="https://plus.google.com/share?url=www.dtmers.com/public/chi-tiet/{{$pt->id}}/{{$pt->nameKhongDau}}.html"></a></li>
													</ul>
												</div>
												<div class="clearfix"></div>
										
									 </div>
										<div class="clearfix"></div>
								</div>
							@endforeach
							<div class="col-lg-12"> 
								<ul class="pagination">
									
									{{$post->links()}}
								</ul>
							</div>
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

