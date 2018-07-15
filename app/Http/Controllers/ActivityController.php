<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class ActivityController extends Controller
{
    public function all(Request $req){
        $response = Activity::where('name','like','%'.$req->q.'%')->get();
        return response()->json($response,200);
    }
    public function add(Request $req){
        $validate = Activity::where('name',$req->activityName)->first();
        if($validate == null){
            $save = Activity::create([
                'name' => $req->activityName
            ]);
            $response = [
                'status' => 'success',
                'info' => $req->activityName.'has saved'
            ];
        }
        $response = [
            'status' => 'fail',
            'info' => $req->activityName.'already exist'
        ];
        return response()->json($response,200);
    }
    public function update(Request $req, $id){
        $activity = Activity::where('activityId',$id)->first();
        $activity->update([
            'name' => $req->activityName
        ]);
        $response = [
            'status' => 'success',
            'info' => $req->activityName.'has updated'
        ];
        return response()->json($response,200);
    }
    public function delete($id){
        $activity = Activity::where('activityId',$id)->delete();
        $response = [
            'status' => 'success',
            'info' => $activity->name.'has delete'
        ];
        return response()->json($response,200);
    }
}
