<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.

*/




Route::get('/','PageController@getIndex');
Route::get('chi-tiet/{id}/{url}.html','PageController@getChiTiet');
Route::get('cate/{id}/{url}.html','PageController@getCate');
Route::get('tiem-kiem.html','PageController@getTimKiem');
Route::get('lien-he.html','PageController@getLienHe');
Route::post('lien-he.html','PageController@postLienHe');
Route::get('confessions.html','PageController@getCfs');
Route::get('confessions/{id}/{url}.html','PageController@getXemCfs');
Route::get('dang-nhap.html','PageController@getLogin');
Route::post('dang-nhap.html','PageController@postLogin');
Route::get('dang-xuat.html','PageController@getLogout');
Route::get('dang-ky.html','PageController@getDangKy');
Route::post('dang-ky.html','PageController@postDangKy');
Route::get('gioi-thieu.html','PageController@getGioiThieu');
Route::get('report/{id}/{url}.html', 'PageController@getReport');
Route::post('report/{id}/{url}.html', 'PageController@postReport');
Route::get('post-confessions.html','PageController@getConfessions');
Route::post('post-confessions.html','PageController@postConfessions');
Route::get('404.html','PageController@get404');

//Route::any('{all?}', 'PageController@get404')->where('all', '(.*)');

Route::group(['prefix' => 'user', 'middleware' => 'user_check'],function(){
	Route::get('dang-bai.html', 'PageController@getDangBai');
	Route::post('dang-bai.html', 'PageController@postDangBai');

	Route::get('{id}/{url}.html', 'PageController@getInfo');

	Route::get('sua-thong-tin-ca-nhan.html', 'PageController@getSuaInfo');
	Route::post('sua-thong-tin-ca-nhan.html', 'PageController@postSuaInfo');


});


Route::get('admin/dang-nhap.html', 'UserController@getLogin');
Route::get('admin/', function(){
	return redirect('admin/user/danh-sach-user.html');
});

Route::post('admin/dang-nhap.html', 'UserController@postLogin');
Route::get('admin/dang-xuat.html', 'UserController@getLogout');

Route::group(['prefix' => 'admin', 'middleware' => 'admin_check'], function(){
	Route::group(['prefix' => 'user'], function(){
		Route::get('danh-sach-user.html','UserController@getDanhSach');

		Route::get('them-user.html','UserController@getThem');
		Route::post('them-user.html','UserController@postThem');

		Route::get('{id}/sua-user.html','UserController@getSua');
		Route::post('{id}/sua-user.html','UserController@postSua');
		
		Route::get('xoa/{id}','UserController@getXoa');

		Route::get('thong-tin-user.html','UserController@getInfo');
		Route::post('thong-tin-user.html','UserController@postInfo');
	});

	Route::group(['prefix' => 'the-loai'], function(){
		Route::get('danh-sach.html','CateController@getDanhSach');

		Route::get('them-the-loai.html','CateController@getThem');
		Route::post('them-the-loai.html','CateController@postThem');

		Route::get('{id}/sua-the-loai.html','CateController@getSua');
		Route::post('{id}/sua-the-loai.html','CateController@postSua');
		
		Route::get('{id}/{ck}/check.html','CateController@getCheck');
	});
	Route::group(['prefix' => 'bai-dang'], function(){
		Route::get('danh-sach.html','PostController@getDanhSach');
		Route::get('xem-bai-dang/{id}/{url}.html','PostController@getXem');

		Route::get('them-bai-dang.html','PostController@getThem');
		Route::post('them-bai-dang.html','PostController@postThem');

		Route::get('{id}/{ck}/check.html','PostController@getCheck');

		Route::get('{id}/sua-bai-dang.html','PostController@getSua');
		Route::post('{id}/sua-bai-dang.html','PostController@postSua');
		
		Route::get('xoa/{id}','PostController@getXoa');
	});

	Route::group(['prefix' => 'report'], function(){
		Route::get('danh-sach.html','ReportController@getDanhSach');
		
		Route::get('{id}/xoa.html','ReportController@getXoa');
	});

	Route::group(['prefix' => 'confessions'], function(){
		Route::get('danh-sach.html','CfsController@getDanhSach');
		Route::get('{id}/{ck}/check.html','CfsController@getCheck');
		
		Route::get('xoa/{id}','CfsController@getXoa');
	});

	Route::group(['prefix' => 'capche'], function(){
		Route::get('danh-sach-capche.html','CapcheController@getDanhSach');

		Route::get('them-capche.html','CapcheController@getThem');
		Route::post('them-capche.html','CapcheController@postThem');

		Route::get('{id}/sua-capche.html','CapcheController@getSua');
		Route::post('{id}/sua-capche.html','CapcheController@postSua');
		
		Route::get('xoa/{id}','CapcheController@getXoa');
	});


});


