<?php
use Illuminate\Http\Request;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'checkLogin'], function(){
	Route::get('/', function(){
		return redirect('/overview');
	});

	Route::get('/products', 'ProductController@productView');
	Route::get('/products/addProduct', 'ProductController@addProductView');
	Route::get('/products/detail/{id}', 'ProductController@detail');
	Route::get('/products/edit/{id}', 'ProductController@edit');
	Route::post('/products/save', 'ProductController@save');
	Route::post('/products/update', 'ProductController@update');
	// TEST
	// IMAGE BETA 1
	Route::get('deleteImage/{type}/{id}', 'ImageController@delete');
	// UPDATE BETA 1
	Route::post('/products/update1', 'ProductController@update1');
	// 
	Route::get('/products/enabled/{id}', 'ProductController@enabled');
	Route::get('/products/disabled/{id}', 'ProductController@disabled');
	Route::get('/products/deletefile/{id}',  'ProductController@deletefile');
	Route::get('/products/remove/{id}', 'ProductController@remove');
	Route::get('/dataproduct', 'ProductController@dataproduct');

	Route::get('/setting',function(){
		return view('page.setting');
	});
	Route::get('/campaign', function(){
		return view('page.campaign');
	});
	Route::get('/bookings', function(){
		return view('page.booking');
	});
	Route::get('/reports', 'ReportController@index');

	Route::get('/users', 'UserController@user');
	Route::post('/users/updateaccess', 'UserController@updateaccess');
	Route::post('/users/adduser', 'UserController@adduser');
	Route::get('/users/resetpassworduser/{id}',  'UserController@resetpassworduser');
	Route::get('/users/deleteuser/{id}',  'UserController@deleteuser');
	Route::get('/users/userowner/{id}',  'UserController@userowner');
	Route::get('/users/usercustom/{id}',  'UserController@usercustom');

});
// ADMINISTRATION

Route::get('/overview','RegisterController@homePage');
Route::get('/register','RegisterController@formSegment')->name('register');
Route::post('/register','RegisterController@registerProcess');
Route::get('/register/activation/{token}','RegisterController@verification');
Route::post('/register/activated','RegisterController@activated');
Route::get('/register/profile','RegisterController@formCompany');
Route::post('/register/profile','RegisterController@profileSave');
Route::get('/register/complete','RegisterController@complete');
Route::get('/register/waiting','RegisterController@awaiting');
Route::post('/register/{type}','RegisterController@kuration');
Route::get('/resend','RegisterController@resend');
Route::post('/draft','RegisterController@draft');
// LOGIN LOGOUT
Route::get('/login','RegisterController@formLogin')->name('login');
Route::post('/login','RegisterController@loginProcess');
// Route::get('/logout','RegisterController@logout');

// ADMIN
Route::prefix('admin')->group(function(){
	Route::get('/','AdminController@home');
	Route::get('/login','AdminController@formLogin');
	Route::post('/login','AdminController@loginProcess');
	Route::get('/data/{tipe}','AdminController@data');
	Route::get('/company/{id}','AdminController@dataCompany');
	Route::get('/logout','AdminController@logout');
	
	//PARTNER
	Route::prefix('partner')->group(function($id){
		Route::get('/', function(){
			return redirect('/admin/partner/index');
		});
		Route::get('/index','Admin\PartnerController@indexPartner');
		Route::get('/index/{id}','Admin\PartnerController@detailPartner');
		Route::get('/findPartner','Admin\PartnerController@findPartner');
		Route::get('/sendChangePassword/{id}','Admin\PartnerController@sendChangePassword');
		Route::get('/getEmail/{id}','Admin\PartnerController@getEmail');
		Route::get('/disablePartner/{id}','Admin\PartnerController@disablePartner');

		Route::get('/activity','Admin\PartnerController@indexActivity');
		Route::get('/activity/{id}','Admin\PartnerController@detailActivity');
		Route::get('/findActivity','Admin\PartnerController@findActivity');
		Route::post('/updatePartner','Admin\PartnerController@updatePartner');
		Route::post('/registration','Admin\PartnerController@registration');
		Route::post('/resendVerification','Admin\PartnerController@resendVerification');
		Route::post('/updateAkta','Admin\PartnerController@updateAkta');
		Route::post('/updateSIUP','Admin\PartnerController@updateSIUP');
		Route::post('/updateNPWP','Admin\PartnerController@updateNPWP');
		Route::post('/updateKTP','Admin\PartnerController@updateKTP');
		Route::get('/deleteAkta/{id}','Admin\PartnerController@deleteAkta');
		Route::get('/deleteSIUP/{id}','Admin\PartnerController@deleteSIUP');
		Route::get('/deleteNPWP/{id}','Admin\PartnerController@deleteNPWP');
		Route::get('/deleteKTP/{id}','Admin\PartnerController@deleteKTP');

	});

	//PRODUCT

	Route::prefix('product')->group(function($id){
		Route::get('/', function(){
			return redirect('/admin/product/index');
		});
		Route::get('/index','Admin\ProductController@index');
		Route::get('/detail/{id}','Admin\ProductController@detail');
		Route::get('/listProduct','Admin\ProductController@listProduct');
		Route::get('/findProduct','Admin\ProductController@findProduct');

	});

	//MASTER DATA
	Route::prefix('master')->group(function(){
		Route::prefix('place')->group(function($id){
			Route::get('/', function(){
				return redirect('/admin/master/place/index');
			});
			Route::get('/index','Admin\AdminController@indexPlace');
			Route::get('/find','Admin\AdminController@findPlace');
			Route::get('/create','Admin\AdminController@createPlace');
			Route::post('/add','Admin\AdminController@addPlace');
			Route::get('/edit/{id}','Admin\AdminController@editPlace');
			Route::post('/update','Admin\AdminController@updatePlace');
			Route::post('/deletePhoto/','Admin\AdminController@deletePhoto');
			Route::get('/status/active/{id}','Admin\AdminController@activeStatusPlace');
			Route::get('/status/disabled/{id}','Admin\AdminController@disabledStatusPlace');

		});
		Route::prefix('place-type')->group(function($id){
			Route::get('/index','Admin\AdminController@indexPlaceType');
			Route::get('/list','Admin\AdminController@listPlaceType');
			Route::post('/add','Admin\AdminController@addPlaceType');
			Route::post('/edit','Admin\AdminController@editPlaceType');
			Route::get('/find/{id}','Admin\AdminController@findPlaceType');
			Route::get('/delete/{id}','Admin\AdminController@deletePlaceType');
		});
	});

	//API
	Route::prefix('dataapi')->group(function($id){
		Route::get('/findCity/{id}','Admin\AdminController@findCity');
		Route::get('/findDistrict/{id}','Admin\AdminController@findDistrict');
		Route::get('/findVillage/{id}','Admin\AdminController@findVillage');
	});
});
// ACTIVITY
Route::get('/activity','ActivityController@all');
Route::post('/activity','ActivityController@add');
Route::post('/activity/update/{id}','ActivityController@add');
Route::get('/destination/delete/{id}','DestinationController@add');
// DESTINATION
Route::get('/province','DestinationController@province');
Route::get('/city','DestinationController@city');
Route::get('/destination','DestinationController@destination');
// WILAYAH(PROVINSI/KOTA/KECAMATAN)
Route::get('/cities','DestinationController@cities');

//
Route::get('/setting',function(){
	return view('page.setting');
});
Route::get('/campaign', function(){
	return view('page.campaign');
});

//zikri
// Route::get('/bookings', 'BookingController@index');
Route::get('/bookings/bytransactiondate', 'BookingController@bytransactiondate');
Route::get('/bookings/filterbytransactiondate', 'BookingController@filterbytransactiondate');
Route::get('/bookings/byactivityschedule', 'BookingController@byactivityschedule');
Route::get('/bookings/filterbyactivityschedule', 'BookingController@filterbyactivityschedule');
Route::get('/bookings/schedule/{id}', 'BookingController@listbyschedule');
Route::get('/bookings/detail/{id}', 'BookingController@detail');
Route::get('/bookings/detailbyschedule/{id}', 'BookingController@detailbyschedule');

Route::get('/bookings', function(){
	return view('page.booking');
});
Route::get('/data', 'TestController@data');
Route::get('/datasearch/{id}', 'TestController@datasearch');



Route::get('/json/activitytag', function () {
	$activitytag = DB::table('activity')
		->select('activityId as id', 'name as text')
		->get();
	return $activitytag;
});
Route::get('/json/destination', function () {
	$destination = DB::table('destination')
		->select('destinationId as id', 'destination as text')
		->get();
	return $destination;
});
Route::get('/json/bookings', function () {
	$bookings = DB::table('bookings')
		->join('schedule', 'bookings.scheduleId', 'schedule.scheduleId')
		->join('user','bookings.userId', 'user.userId')
		->select('bookingId', 'bookings.created_at', 'fullname', 'email')
		->get();
	$data['data'] = $bookings;
	return $data;
});

Route::get('/json/products', function () {
	$products = DB::table('bookings')
		->join('schedule', 'bookings.scheduleId', 'schedule.scheduleId')
		->join('user','bookings.userId', 'user.userId')
		->select('bookingId', 'bookings.created_at', 'fullname', 'email')
		->get();
	$data['data'] = $bookings;
	return $data;
});
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/member/password/reset', 'Auth\MemberForgotPasswordController@showLinkRequestForm')->name('member.password.request');
Route::get('/member/password/reset/{token}', 'Auth\MemberResetPasswordController@showResetForm')->name('member.password.reset');
Route::post('/member/password/email', 'Auth\MemberForgotPasswordController@sendResetLinkEmail')->name('member.password.email');
Route::post('/member/password/reset', 'Auth\MemberResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', function(){
	Auth::logout();
	session()->flush();
	return redirect('/login');
})->name('logout');


//API END POINT
Route::get('api/product','API\ProductController@products');
Route::get('api/product/{id}','API\ProductController@product_detail');

// TEST
Route::get('popo','TestController@tester');
route::get('draft/{id}','TestController@draft');