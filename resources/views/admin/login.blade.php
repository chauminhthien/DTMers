<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Đăng Nhập Hệ Thống - Admin - DTMers :. Sinh Viên Đại Học Tài Nguyên Và Môi Trường TP.Hồ Chí Minh</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="login/css/login.css">
    <link rel="stylesheet" href="login/css/bootstrap.min.css">
  </head>

  <body>

    <div class="vid-container">
  <video id="Video1" class="bgvid back" autoplay="false" muted="muted" preload="auto" loop>
      <source src="login/files/milky-way-river-1280hd.mp4.mp4" type="video/mp4">
  </video>
  <div class="inner-container">
    <video id="Video2" class="bgvid inner" autoplay="false" muted="muted" preload="auto" loop>
      <source src="login/files/milky-way-river-1280hd.mp4.mp4" type="video/mp4">
    </video>
    <div class="box">
      <h1>Login</h1>
      <p id="loilogin" style="color: red; font-size:15px"></p>
      @if(count($errors) > 0)
          <div class="alert alert-danger">
              @foreach($errors->all() as $loi)
                  {{$loi}} <br/>
              @endforeach
          </div>
      @endif
      @if(session('thongbao'))
          <div class="alert alert-danger">
              {{session('thongbao')}}
          </div>
      @endif
      <form method="post" action="admin/dang-nhap.html" >
        <input type="text" placeholder="Email"  name="email">
        <input type="password" placeholder="Password" name="pass" />
        <input type="hidden" value="{{csrf_token()}}" name="_token">
        <button type="submit">Login</button>
      </form>
     
    </div>
  </div>
</div>
    
    
    
  </body>
</html>
