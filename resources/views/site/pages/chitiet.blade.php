@extends('site.layout.index')
@section('title')
	{{$chitiet->name}}
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

		  <h2 class="w3" style="font-family:'T';">{{$chitiet->name}}</h2>
			<div class="single">
			   <img src="upload/post/{{$chitiet->img}}" alt="{{$chitiet->name}}" class="img-responsive" alt="">
			    <div class="b-bottom"> <br/>
			    <h2 class="w3" style="font-family:'T';">{{$chitiet->name}}</h2>
			      {!!$chitiet->noiDung!!}
			      <br/>
			      <p>Ngày: <strong style="color:orange">{{date('d-m-Y',$chitiet->time)}}</strong> By <a title="{{$chitiet->user->name}}" href="user/{{$chitiet->user->id}}/{{$chitiet->user->nameKhongDau}}.html" style="color:orange">{{$chitiet->user->name}}</a></p> 
			      	<br/>
					{{-- like --}}
			      <div>
			      	<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7&appId=1758926274389371";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<div class="fb-like" data-href="{{getUrl()}}" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
			      </div>
				 {{-- end like --}}
				<br/>
				<a style="color:orange" href="report/{{$chitiet->id}}/{{$chitiet->nameKhongDau}}.html">Báo Cáo Vi Phạm</a>
				</div>
			 </div>
			  

							
				{{-- binh luan --}}
					<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7&appId=1758926274389371";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<div class="fb-comments" data-href="{{getUrl()}}" data-width="100%" data-numposts="7"></div>
				{{-- end binh luan --}}

				<div class="clearfix"></div>
			</div>
		</div>
		<!-- technology-right -->
		<div class="col-md-3 technology-right">
				
				
				<div class="blo-top1">
							
					<div class="tech-btm">
					<a class="btn btn-default link" title="Đăng Bài Viết" href="user/dang-bai.html">Đăng Bài</a>
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
									<a title="{{$mor->name}}" href="chi-tiet/{{$mor->id}}/{{$mor->nameKhongDau}}.html"><img src="upload/post/{{$mor->img}}" class="img-responsive" alt="{{$mor->name}}"></a>
								</div>
								<div class="blog-grid-right">
									
									<h5><a title="{{$mor->name}}" href="chi-tiet/{{$mor->id}}/{{$mor->nameKhongDau}}.html">{{$mor->name}}</a> </h5>
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
