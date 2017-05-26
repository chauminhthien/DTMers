
<!DOCTYPE HTML>
<html>
<head>
<title>@yield('title') - DTMers :. Sinh Viên Đại Học Tài Nguyên Và Môi Trường TP.Hồ Chí Minh</title>
<meta name="description" content="@yield('title')- DTMers :. Sinh Viên Đại Học Tài Nguyên Và Môi Trường TP.Hồ Chí Minh">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="@yield('title'), dtm, Sinh Viên Đại Học Tài Nguyên Và Môi Trường TP.Hồ Chí Minh, sinh viên, DTM" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<base href="{{asset('')}}">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
@yield('css')
<link href='css/css.css' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel='stylesheet' type='text/css' />	
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
@yield('js')
<!-- //animation-effect -->
</head>
<body>
	@include('site.layout.menu')
	<!--start-main-->
	<div class="header-bottom">
		<div class="container">
			<div class="logo wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
				<h1><a href="{{asset('')}}">DTMers</a></h1>
				<p><label class="of"></label>Sinh Viên Đại Học Tài Nguyên Và Môi Trường TP.Hồ Chí Minh<label class="on"></label></p>

			</div>
		</div>
	</div>
<!-- banner -->

	@yield('content')
<div class="footer">
		<div class="container">
			<div class="col-md-4 footer-left wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
				<h4>Giới Thiệu </h4>
				<p>Website phi lợi nhuận do các bạn sinh viên trường Đại Học Tài Nguyên Và Môi Trường Tp.Hồ Chí Minh Xây dựng</p>
				<img src="images/t4.jpg" class="img-responsive" alt="giới thiệu">
					<div class="bht1">
						<a href="gioi-thieu.html">Read More</a>
					</div>
			</div>
			<div class="col-md-4 footer-middle wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
			<h4>Fan Page</h4>
			<div class="mid-btm">
			</div>
			<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7&appId=1758926274389371";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-page" data-href="https://www.facebook.com/dtmerstphcm/" data-tabs="timeline" data-width="400" data-height="130" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/dtmerstphcm/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/dtmerstphcm/">DTMers - Sinh Viên Đại Học Tài Nguyên Và Môi Trường TP.HCM</a></blockquote></div>
			</div>
			<div class="col-md-4 footer-right wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
				<h4>Thông Tin Cá Nhân</h4>
				
				<div class="name">
					
					@if(isset($user_dtm))

						<div class="user_dtm">
							<img src="upload/img_user/{{$user_dtm->img}}" alt="{{$user_dtm->name}}" class="img-responsive img_user">
							
							<a title="{{$user_dtm->name}}" href="user/{{$user_dtm->id}}/{{$user_dtm->nameKhongDau}}.html"><h2>{{$user_dtm->name}}</h2></a>
							<div class="clearfix"> </div>	
							<a class="btn btn-default link" title="Đăng Xuất" href="dang-xuat.html">Đăng Xuất</a>
						</div>
					@else
						<div>
							<a class="btn btn-default link" title="Đăng Nhập" href="dang-nhap.html">Đăng Nhập</a>
							<a class="btn btn-default link" title="Đăng Ký" href="dang-ky.html">Đăng Ký</a>
						</div>
					@endif
				
				</div>	
						
				<div class="clearfix"> </div>
					
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="copyright wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
				<div class="container">
					<p>© 2016  | Design by <a href="{{asset('')}}">DTMers</a></p>
				</div>
			</div>

</body>
<script type="text/javascript">
	$(document).ready(function() {
			$(window).scroll(function(){
				if($(window).scrollTop() >50){
					$('#scroll').removeClass('menu9');
					$('#scroll').addClass('scrool');
					$('.backtop').addClass('hiddenback');
				}else{
					$('#scroll').removeClass('scrool');
					$('#scroll').addClass('menu9');
					$('.backtop').removeClass('hiddenback');
				};
			});
			$('.backtop').click(function(){
				$('html, body').animate({scrollTop:0}, 500);
			});
    });
</script>
</html>