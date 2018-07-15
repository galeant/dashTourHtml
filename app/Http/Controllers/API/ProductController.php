<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Product;

class ProductController extends Controller
  {
      public function index(){
          $response = Product::with([
              'prices','files','itineraries','schedules','destinations','activities'
          ])->get();
          return response()->json($response,200);
      }


      public function products()
        {
          $products = Product::get();
          if(Input::get('destination') !==null && !empty(Input::get('destination')))
            {
              $products = Product::whereHas('destinations',function($query){
                $query->where('product_destination.destinationId',Input::get('destination'));
              })->get();
            }

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

          $return = array(
            "success" => true,
            "message" => "Success to get products",
            "data" => array(
              "total" => count($data),
              "result" => $data
            )
          );

          return response()->json($return,200);
        }

      public function product_detail($product_id)
        {
          $products = Product::where('productId',$product_id)->get();
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

      $return = array(
        "success" => true,
        "message" => "Success to get products",
        "data" => array(
          "total" => count($data),
          "result" => (object) $data[0]
        )
      );

      return response()->json($return,200);
        }
  }
