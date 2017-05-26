@extends('site.layout.index')
@section('title')
	{{$xemcfs->name}}
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

		  <h2 class="w3" style="font-family:'T';">{{$xemcfs->name}}</h2>
			<div class="single">
			   
			    <div class="b-bottom"> <br/>
			    	
			      {!!$xemcfs->noiDung!!}
			      <p>{{date('d-m-Y',$xemcfs->time)}} <a class="span_link" href="#">
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
