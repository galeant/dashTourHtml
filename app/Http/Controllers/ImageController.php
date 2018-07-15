<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageDestination;
use App\ImageActivity;
use App\ImageAccommodation;
use App\ImageOther;
use App\Videos;
class ImageController extends Controller
{
    // BETA 1
    public function delete($type,$id){
        if($type == 'dest'){
            ImageDestination::where('id',$id)->delete();
            return view('page.productDetail1')->with('alert','Image Destination success Deleted');
        }else if($type == 'act'){
            ImageActivity::where('id',$id)->delete();
            return view('page.productDetail1')->with('alert','Image Activity success Deleted');
        }else if($type == 'acc'){
            ImageAccommodation::where('id',$id)->delete();
            return view('page.productDetail1')->with('alert','Image Accommodation success Deleted');
        }else if($type == 'oth'){
            ImageOther::where('id',$id)->delete();
            return view('page.productDetail1')->with('alert','Image Other success Deleted');
        }else{
            Videos::where('id',$id)->delete();
            return view('page.productDetail1')->with('alert','Video success Deleted');
        }
    }
    // BETA 2
    // public function deleteImageDestination($id){
    //     ImageDestination::where('id',$id)->delete();
    //     return view('page.productDetail1')->with('alert','Image Destination success Deleted');
    // }
    // public function deleteImageActivity($id){
    //     ImageActivity::where('id',$id)->delete();
    //     return view('page.productDetail1')->with('alert','Image Activity success Deleted');
    // }
    // public function deleteImageAccommodation($id){
    //     ImageAccommodation::where('id',$id)->delete();
    //     return view('page.productDetail1')->with('alert','Image Accommodation success Deleted');
    // }
    // public function deleteImageOther($id){
    //     ImageOther::where('id',$id)->delete();
    //     return view('page.productDetail1')->with('alert','Image Other success Deleted');
    // }
    // public function deleteVideo($id){
    //     Videos::where('id',$id)->delete();
    //     return view('page.productDetail1')->with('alert','Video success Deleted');
    // }
}
