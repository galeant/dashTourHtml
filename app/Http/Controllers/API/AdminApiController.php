<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\AdminApi;
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
    public $successStatus = 200;

    public function login(){
        if(Auth::guard('adminapi')->attempt(['email' => request('email'), 'password' => request('password')])){
            $adminapi = AdminApi::where('email', request('email'))->first();
            $success['token'] =  $adminapi->createToken('api.pigijo.id')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['api_token'] = str_random(100);
        $adminapi = AdminApi::create($input);
        $success['token'] =  $adminapi->createToken('pigijo.id')->accessToken;
        $success['name'] =  $adminapi->name;

        return response()->json(['success'=>$success], $this->successStatus);
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
