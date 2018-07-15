<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use App\Product;
use App\ProductActivity;
use App\ProductDestination;
use App\Itinerary;
use App\Price;
use App\Includes;
use App\Excludes;
use App\Schedule;
use App\ImageDestination;
use App\ImageActivity;
use App\ImageAccommodation;
use App\ImageOther;


class ProductController extends Controller
{
    public function index(){
        return view('admin.product.index');
    }
    
    public function listProduct(){
        $product = Product::join('company', 'company.companyId', 'product.companyId')
            ->select('product.*', 'companyName')
            ->get();
        
        return Datatables::of($product)
            ->addColumn('action', function ($product) {
                return '<a href="/admin/product/detail/'.$product->productId.'"><i class="glyphicon glyphicon-edit"></i>View Detail</a>';
            })
            ->make(true);
    }

    public function findProduct(Request $request){
        $status = $request->status;
        $keyword = $request->keyword;
        $product = Product::join('company', 'company.companyId', 'product.companyId')
            ->orWhere(function ($query) use ($keyword, $status){
                $query->where('product.status', 'like', $status.'%')
                    ->where('companyName','like', '%'.$keyword.'%');})
            ->orWhere(function ($query) use ($keyword, $status){
                $query->where('product.status', 'like', $status.'%')
                    ->where('productType','like', '%'.$keyword.'%');})
            ->orWhere(function ($query) use ($keyword, $status){
                $query->where('product.status', 'like', $status.'%')
                    ->where('ProductName','like', '%'.$keyword.'%');})
            ->select('product.*', 'companyName')
            ->get();
        return Datatables::of($product)
            ->addColumn('action', function ($product) {
                return '<a href="/admin/product/detail/'.$product->productId.'"><i class="glyphicon glyphicon-edit"></i>View Detail</a>';
            })
            ->make(true);
        
    }
    public function detail($id){
        $product = Product::find($id);
        $activity = ProductActivity::join('activity', 'activity.activityId', 'product_activity.activityId')
            ->where('productId', $id)->get();
        $days = Itinerary::where('productId', $id)
			->max('day');
        $itinerary = Itinerary::where('productId', $id)
            ->orderBy('day', 'asc')
            ->get();
        $price = Price::where('productId', $id)
            ->get();
        $includes = Includes::where('productId', $id)
            ->get();
        $excludes = Excludes::where('productId', $id)
            ->get();
        $schedule = Schedule::where('productId', $id)
            ->get();
        $destination = ProductDestination::join('destination', 'destination.destinationId', 'product_destination.destinationId')
            ->join('provinces', 'provinces.id', 'destination.province')
            ->join('cities', 'cities.id', 'destination.city')
            ->where('productId', $id)
            ->select(
                'destination', 
                'destination.destinationId', 
                'provinces.name as province', 
                'cities.name as city',
                'provinces.id as provinceId', 
                'cities.id as cityId')
            ->get();
        // return $destination;
        $province = Province::all();
        $city = City::all();
        $image_destination = ImageDestination::where('productId', $id)->get();
        $image_accommodation = ImageAccommodation::where('productId', $id)->get();
        $image_activity = ImageActivity::where('productId', $id)->get();
        $image_other = ImageOther::where('productId', $id)->get();
            
        return view('admin.product.detail',[
            'product' => $product, 
            'activity' => $activity,
            'days' => $days,
            'itinerary' => $itinerary,
            'price' => $price,
            'includes' => $includes,
            'excludes' => $excludes,
            'schedule' => $schedule,
            'destination' => $destination,
            'province' => $province,
            'city' => $city,
            'image_destination' => $image_destination,
            'image_accommodation' => $image_accommodation,
            'image_activity' => $image_activity,
            'image_other' => $image_other
        ]);
    }
}
