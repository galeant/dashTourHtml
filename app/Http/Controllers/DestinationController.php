<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destination;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class DestinationController extends Controller
{
    public function province(){
        $response = Province::get();
        return response()->json($response,200);
    }
    public function city(Request $req){
        $response = City::where('province_id',$req->id)->get();
        return response()->json($response,200);
    }
    public function destination(Request $req){
        $response = Destination::where([
                'province'=>$req->province,
                'city'=>$req->city,
            ])->get();
        return response()->json($response,200);
    }
}
