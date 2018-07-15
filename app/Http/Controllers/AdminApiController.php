<?php

namespace App\Http\Controllers;

use App\AdminApi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Carbon\Carbon;
use App\Product;
use App\Itinerary;
use App\Destination;

class AdminApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminApi  $adminApi
     * @return \Illuminate\Http\Response
     */
    public function show(AdminApi $adminApi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminApi  $adminApi
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminApi $adminApi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminApi  $adminApi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminApi $adminApi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminApi  $adminApi
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminApi $adminApi)
    {
        //
    }
    public function product(){
        $products = Product::get();
        $i = 0;
        foreach($products as $p){
            $data[$i]['productName'] = $p->productName;
            $data[$i]['activity'] = array();
            foreach($p->activities as $a){
                array_push($data[$i]['activity'], $a->name);
            }
            $data[$i]['destination'] = array();
            foreach($p->destinations as $d){
                // $dest = [];
                // $dest['destination_name'] = $d->destination;
                // $dest['city'] = $d->city;
                // $dest['province'] = $d->province;
                array_push($data[$i]['destination'], $d);
            }
            $schedule= $p->schedules[0];
            $startDate=Carbon::parse($schedule->startDate);
            $endDate=Carbon::parse($schedule->endDate);
            $startHours=Carbon::parse($schedule->startHours);
            $endHours=Carbon::parse($schedule->endHours);

            if($startDate == $endDate){
                $data[$i]['total-hour'] = $endHours->diffInHours($startHours);
            }
            else{
                $data[$i]['total-day'] = $endDate->diffInDays($startDate)+1;
            }
            $data[$i]['schedule'] = $p->schedules;
            $data[$i]['price'] = $p->prices[0];
            $data[$i]['file'] = $p->files;
            $i++;
        }
        return response()->json($data,200);
    }
    // public function product_detail(){
    //     $productid = request('productId');
    //     $products = Product::find($productid);
    //     $data['productName'] = $products->productName;
    //     $data['productCategory'] = $products->productCategory;
    //     $data['meetingpoint-lat'] = $products->meetingPointLatitude;
    //     $data['meetingpoint-long'] = $products->meetingPointLongitude;
    //     $data['meetingpoint-note'] = $products->meetingPointNote;
    //     $data['termcondition'] = $products->termCondition;
    //     $data['cancellationType'] = $products->cancellationType;
    //     $data['minCancellationDay'] = $products->minCancellationDay;
    //     $data['cancellationFee'] = $products->cancellationFee;
    //     $data['cancellationDetails'] = $products->cancellationDetails;
    //     $data['startSellingDate'] = $products->startSellingDate;
    //     $data['endSellingDate'] = $products->endSellingDate;
        
    //     $data['activity'] = array();
    //     foreach($products->activities as $a){
    //         array_push($data['activity'], $a->name);
    //     }
    //     $data['price-include'] = array();
    //     foreach($products->includes as $i){
    //         array_push($data['price-include'], $i->description);
    //     }
    //     $data['price-exclude'] = array();
    //     foreach($products->excludes as $e){
    //         array_push($data['price-exclude'], $e->description);
    //     }
    //     $data['destination'] = $products->destinations;
    //     $itinerary = $products->itineraries;
    //     $days = array();
    //     foreach ($itinerary as $iti) {
    //         $days[] = $iti['day'];
    //     }
    //     for($j=0; $j<max($days); $j++){
    //         $data['itinerary'][$j] = array();
    //         foreach($products->itineraries as $iti){
    //             if(($j+1) == ($iti->day)){
    //                 array_push($data['itinerary'][$j],$iti);
    //             }
    //         }
    //     }
    //     return response()->json($data,200);
    // }
    public function product_detail($id){
        $productid = $id;
        $products = Product::find($productid);
        $data['productName'] = $products->productName;
        $data['productCategory'] = $products->productCategory;
        $data['meetingpoint-lat'] = $products->meetingPointLatitude;
        $data['meetingpoint-long'] = $products->meetingPointLongitude;
        $data['meetingpoint-note'] = $products->meetingPointNote;
        $data['termcondition'] = $products->termCondition;
        $data['cancellationType'] = $products->cancellationType;
        $data['minCancellationDay'] = $products->minCancellationDay;
        $data['cancellationFee'] = $products->cancellationFee;
        $data['cancellationDetails'] = $products->cancellationDetails;
        $data['startSellingDate'] = $products->startSellingDate;
        $data['endSellingDate'] = $products->endSellingDate;
        
        $data['activity'] = array();
        foreach($products->activities as $a){
            array_push($data['activity'], $a->name);
        }
        $data['price-include'] = array();
        foreach($products->includes as $i){
            array_push($data['price-include'], $i->description);
        }
        $data['price-exclude'] = array();
        foreach($products->excludes as $e){
            array_push($data['price-exclude'], $e->description);
        }
        $data['destination'] = $products->destinations;
        $itinerary = $products->itineraries;
        $days = array();
        foreach ($itinerary as $iti) {
            $days[] = $iti['day'];
        }
        for($j=0; $j<max($days); $j++){
            $data['itinerary'][$j] = array();
            foreach($products->itineraries as $iti){
                if(($j+1) == ($iti->day)){
                    array_push($data['itinerary'][$j],$iti);
                }
            }
        }
        return response()->json($data,200);
    }
}
