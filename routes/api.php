<?php

use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\ProductCollection;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::get('/product','API\ProductController@index');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/products', function () {
	$data = array();
	$products = DB::table('product')->get();
	$i = 0;
	foreach($products as $p){
		$data[$i]['detail'] = $p;
		$itinerary = DB::table('itinerary')
			->leftjoin('destination', 'itinerary.destinationId', 'destination.destinationId')
			->where('productId', $p->productId)
			->orderBy('day', 'asc')
			->get();
		$destination = DB::table('destination')
			->join('product_destination', 'product_destination.destinationId', 'destination.destinationId')
			->where('productId', $p->productId)
			->get();
		$data[$i]['destination'] = $destination;
		$data[$i]['itinerary'] = $itinerary;
		$i++;
	}
	return $data;
});

Route::get('/reports/salesreport', 'API\ReportController@salesreport');
Route::get('/reports/filtersalesreport', 'API\ReportController@filtersalesreport');
Route::get('/reports/productsales', 'API\ReportController@productsales');
Route::get('/reports/filterproductsales', 'API\ReportController@filterproductsales');
Route::get('/reports/upcomingschedule', 'API\ReportController@upcomingschedule');
Route::get('/reports/filterupcomingschedule', 'API\ReportController@filterupcomingschedule');
Route::get('/reports/salessettlement', 'API\ReportController@salessettlement');

Route::post('login', 'API\AdminApiController@login');
Route::post('register', 'API\AdminApiController@register');

Route::group(['middleware' => 'auth:admin-api'], function($id){
	Route::post('/admin/product','API\AdminApiController@product');
	Route::post('/admin/product/{id}','API\AdminApiController@product_detail');
});

// Route::post('product','API\AdminApiController@product');
// Route::post('product/{id}','API\AdminApiController@product_detail');