@extends('site.layout.index')
@section('title')
	Trang Chủ 
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="css/clock.css">
@endsection
@section('content')
<div class="banner">
<div class="container">	
		<h2>WelCome DTMers</h2>
		<p>Chào mừng mọi người ghé thăm Website Sinh Viên Đại Học Tài Nguyên Và Môi Trường TP.Hồ Chí Minh</p>
		<div class="clock">
			<div id="Date"></div>
			  <ul>
			      <li id="hours"></li>
			      <li id="point">:</li>
			      <li id="min"></li>
			      <li id="point">:</li>
			      <li id="sec"></li>
			  </ul>
		</div>
</div>
</div>
<div class="services w3l wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
		
	</div>
	<!-- technology-left -->
	<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
		<div class="tech-no">
		<?php 
			$post1 = $post->shift();
			$post2 = $post->shift();
			$post3 = $post->shift();
		?>
			<!-- technology-top -->
			
			 <div class="tc-ch wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
				
					<div class="tch-img">
						<a title="{{$post1->name}}" href="chi-tiet/{{$post1->id}}/{{$post1->nameKhongDau}}.html"><img alt="{{$post1->name}}" src="upload/post/{{$post1->img}}" class="img-responsive" alt=""></a>
					</div>
					
					<h3><a title="{{$post1->name}}" href="chi-tiet/{{$post1->id}}/{{$post1->nameKhongDau}}.html">{{$post1->name}}</a></h3>
					<h6>BY <a title="{{$post1->user->name}}" href="user/{{$post1->user->id}}/{{$post1->user->nameKhongDau}}.html">{{$post1->user->name}} </a>{{date('d-m-Y', $post1->time)}}</h6>
						<div class="bht1">
							<a title="{{$post1->name}}"  href="chi-tiet/{{$post1->id}}/{{$post1->nameKhongDau}}.html">Continue Reading</a>
						</div>
						<div class="soci">
							<ul>
								<li class="hvr-rectangle-out"><a class="fb" target="_black" href="https://www.facebook.com/sharer/sharer.php?u={{getUrl()}}chi-tiet/{{$post1->id}}/{{$post1->nameKhongDau}}.html"></a></li>
									<li class="hvr-rectangle-out"><a class="goog" target="_black" href="https://plus.google.com/share?url={{getUrl()}}chi-tiet/{{$post1->id}}/{{$post1->nameKhongDau}}.html"></a></li>

								<div id="fb-root"></div>
								<script>(function(d, s, id) {
								  var js, fjs = d.getElementsByTagName(s)[0];
								  if (d.getElementById(id)) return;
								  js = d.createElement(s); js.id = id;
								  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7&appId=1758926274389371";
								  fjs.parentNode.insertBefore(js, fjs);
								}(document, 'script', 'facebook-jssdk'));</script>
							</ul>
						</div>
						<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<!-- technology-top -->
			<!-- technology-top -->
			<div class="w3ls">
				<div class="col-md-6 w3ls-left wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
					 <div class="tc-ch">
						<div class="tch-img">
							<a title="{{$post2->name}}" href="chi-tiet/{{$post2->id}}/{{$post2->nameKhongDau}}.html">
							<img alt="{{$post2->name}}" src="upload/post/{{$post2->img}}" class="img-responsive" ></a>
						</div>
					
						<h3><a title="{{$post2->name}}" href="chi-tiet/{{$post2->id}}/{{$post2->nameKhongDau}}.html">{{$post2->name}}</a></h3>
						<h6>BY <a title="{{$post2->user->name}}" href="user/{{$post2->user->id}}/{{$post2->user->nameKhongDau}}.html">{{$post2->user->name}} </a>{{date('d-m-Y',$post2->time)}}</h6>
							<div class="bht1">
								<a title="{{$post2->name}}" href="chi-tiet/{{$post2->id}}/{{$post2->nameKhongDau}}.html">Read More</a>
							</div>
							<div class="soci">
								<ul>
									<li class="hvr-rectangle-out"><a class="fb" target="_black" href="https://www.facebook.com/sharer/sharer.php?u={{getUrl()}}chi-tiet/{{$post2->id}}/{{$post2->nameKhongDau}}.html"></a></li>
									<li class="hvr-rectangle-out"><a class="goog" target="_black" href="https://plus.google.com/share?url={{getUrl()}}chi-tiet/{{$post2->id}}/{{$post2->nameKhongDau}}.html"></a></li>
								</ul>
							</div>
							<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 w3ls-left wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
					 <div class="tc-ch">
						<div class="tch-img">
							<a title="{{$post3->name}}" href="chi-tiet/{{$post3->id}}/{{$post3->nameKhongDau}}.html">
							<img alt="{{$post3->name}}" src="upload/post/{{$post3->img}}" class="img-responsive" ></a>
						</div>
					
						<h3><a title="{{$post3->name}}" href="chi-tiet/{{$post3->id}}/{{$post3->nameKhongDau}}.html">{{$post3->name}}</a></h3>
						<h6>BY <a title="{{$post3->user->name}}" href="user/{{$post3->user->id}}/{{$post3->user->nameKhongDau}}.html">{{$post3->user->name}} </a>{{date('d-m-Y',$post2->time)}}</h6>
							<div class="bht1">
								<a title="{{$post3->name}}" href="chi-tiet/{{$post3->id}}/{{$post3->nameKhongDau}}.html">Read More</a>
							</div>
							<div class="soci">
								<ul>
									<li class="hvr-rectangle-out"><a class="fb" target="_black" href="https://www.facebook.com/sharer/sharer.php?u={{getUrl()}}chi-tiet/{{$post3->id}}/{{$post3->nameKhongDau}}.html"></a></li>
									<li class="hvr-rectangle-out"><a class="goog" target="_black" href="https://plus.google.com/share?url={{getUrl()}}chi-tiet/{{$post3->id}}/{{$post3->nameKhongDau}}.html"></a></li>
								</ul>
							</div>
							<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- technology-top -->
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
										<li class="hvr-rectangle-out"><a class="fb" target="_black" href="https://www.facebook.com/sharer/sharer.php?u={{getUrl()}}chi-tiet/{{$pt->id}}/{{$pt->nameKhongDau}}.html"></a></li>
									<li class="hvr-rectangle-out"><a class="goog" target="_black" href="https://plus.google.com/share?url={{getUrl()}}chi-tiet/{{$pt->id}}/{{$pt->nameKhongDau}}.html"></a></li>
									</ul>
								</div>
								<div class="clearfix"></div>
						
					 </div>
						<div class="clearfix"></div>
				</div>
			@endforeach
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

@section('js')
<script type="text/javascript" src="js/clock.js"></script>
@endsection