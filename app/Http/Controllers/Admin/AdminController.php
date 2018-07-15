<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Datatables;
use App\TipsQuestion;
use App\Destination;
use App\PlaceTranslation;
use App\PlaceActivity;
use App\PlaceSchedule;
use App\PlaceTips;
use App\PlaceType;
use App\PlacePhoto;
use Hash;
use DB;

class AdminController extends Controller
{
    public function indexPlace(){
        
        $place_type = PlaceType::all();
        $province = Province::all();
        $destination = Destination::join('cities', 'cities.id', 'destination.city')
            ->join('provinces', 'provinces.id', 'cities.province_id')
            ->join('place_type', 'place_type.placeTypeId', 'destination.placeTypeId')
            ->select(
                DB::raw("DATE_FORMAT(destination.updated_at, '%M %d, %Y - %H:%i') updated "), 
                'destinationId',
                'destination.destination', 
                'destination.destinationStatus as status', 
                'cities.name as city',
                'provinces.name as province',
                'place_type.placeTypeNameEN')
            ->orderBy('destination.updated_at', 'desc')
            ->get();
        return view('admin.master.place.index', [
            'province' => $province,
            'place_type' => $place_type,
            'destination' => $destination
        ]);
    }
    public function findPlace(Request $request){
        $datasearch = $request->all();
        // $keyword = $datasearch['keyword'];
        $place_type = $datasearch['place_type'];
        $city = $datasearch['city'];
        $province = $datasearch['province'];
        $keyword = $datasearch['keyword'];
        $destination = Destination::join('cities', 'cities.id', 'destination.city')
            ->join('provinces', 'provinces.id', 'destination.province')
            ->join('place_type', 'place_type.placeTypeId', 'destination.placeTypeId')
            ->where('place_type.placeTypeId', $datasearch['place_type'])
            ->where('city', 'like', '%'.$datasearch['city'].'%')
            ->where('province', 'like', '%'.$datasearch['province'].'%')
            ->where('destination.destination', 'like', '%'.$datasearch['keyword'].'%')
            ->orWhere(function ($query) use ($place_type, $city, $province, $keyword){
                $query->where('place_type.placeTypeId', 'like', '%'.$place_type.'%')
                ->where('city', 'like', '%'.$city.'%')
                ->where('province', 'like', '%'.$province.'%')
                ->where('destination.destination', 'like', '%'.$keyword.'%');})
            ->select(
                DB::raw("DATE_FORMAT(destination.updated_at, '%M %d, %Y - %H:%i') updated "), 
                'destinationId',
                'destination.destination', 
                'destination.destinationStatus as status', 
                'cities.name as city',
                'provinces.name as province',
                'destination.updated_at',
                'place_type.placeTypeNameEN')
            ->get();
        return Datatables::of($destination)
            ->addColumn('action', function ($destination) {
                return '<a href="/admin/master/place/edit/'.$destination->destinationId.'"> View Detail</a>';
            })
            ->make(true);
    }
    public function findCity($id){
        $cities = City::where('province_id',$id)->get();
        return response()->json($cities,200);
    }
    public function findDistrict($id){
        $districts = District::where('city_id',$id)->get();
        return response()->json($districts,200);
    }
    public function findVillage($id){
        $villages = Village::where('district_id',$id)->get();
        return response()->json($villages,200);
    }

    public function createPlace(){
        $place_type = PlaceType::all();
        $province = Province::all();
        $tips_question = TipsQuestion::all();
        return view('admin.master.place.create', [
            'province' => $province,
            'place_type' => $place_type,
            'tips_question' => $tips_question
        ]);
    }
    public function addPlace(Request $request){
        $data =Input::all();
        // dd($data);
        if( $data['placeVisitHours']=="" ||  $data['placeVisitHours']==NULL){
            $placeVisitHours = 0;
        }
        else{
            $placeVisitHours = $data['placeVisitHours'];
        }
        if( $data['placeVisitMinutes']=="" ||  $data['placeVisitMinutes']==NULL){
            $placeVisitMinutes = 0;
        }
        else{
            $placeVisitMinutes =$data['placeVisitMinutes'];
        }
        $destination = new Destination;
        $destination->destination = $data['EN']['placeName'];
        $destination->village = $data['village'];
        $destination->district = $data['district'];
        $destination->city = $data['city'];
        $destination->province = $data['province'];
        $destination->latitude = $data['latitude'];
        $destination->longitude = $data['longitude'];
        $destination->placeVisitHours = $placeVisitHours;
        $destination->placeVisitMinutes = $placeVisitMinutes;
        $destination->placeScheduleType = $data['placeScheduleType'];
        $destination->destinationPhoneNumber = $data['format'].'-'.$data['phone'];
        $destination->destinationAddress = $data['address'];
        $destination->placeTypeId = $data['placeType'];
        $destination->save();
        //EN
        $pt = new PlaceTranslation;
        $pt->destinationId = $destination->destinationId;
        $pt->placeName = $data['EN']['placeName'];
        $pt->placeDescription = $data['EN']['placeDescription'];
        $pt->languageId = 1;
        $pt->save();
        //ID
        $pt = new PlaceTranslation;
        $pt->destinationId = $destination->destinationId;
        $pt->placeName = $data['ID']['placeName'];
        $pt->placeDescription = $data['ID']['placeDescription'];
        $pt->languageId = 2;
        $pt->save();

        foreach($data['placeActivity'] as $dpa){
            $pt = new PlaceActivity;
            $pt->destinationId = $destination->destinationId;
            $pt->placeActivityName = $dpa;
            $pt->save();
        }
        if($data['placeScheduleType']=="yes"){
            foreach($data['placeSchedule'] as $dps){
                $ps = new PlaceSchedule;
                $ps->destinationId = $destination->destinationId;
                $ps->placeScheduleDay = $dps['ScheduleDay'];
                $ps->placeScheduleCondition = $dps['ScheduleCondition'];
                if($dps['ScheduleCondition']=='Close'){
                    $ps->placeScheduleStartHour = '00:00';
                    $ps->placeScheduleEndHour = '00:00';
                }
                else{
                    if(array_key_exists('FullDay', $dps)){
                        $ps->placeScheduleStartHour = '00:00:00';
                        $ps->placeScheduleEndHour = '23:59:59';
                    }
                    else{
                        $ps->placeScheduleStartHour = $dps['StartHour'];
                        $ps->placeScheduleEndHour = $dps['EndHour'];
                    }
                    
                }
                $ps->save();
            }
        }
        else{
            foreach($data['placeSchedule'] as $dps){
                $ps = new PlaceSchedule;
                $ps->destinationId = $destination->destinationId;
                $ps->placeScheduleDay = $dps['ScheduleDay'];
                $ps->placeScheduleCondition = "Open";
                $ps->placeScheduleStartHour = '00:00:00';
                $ps->placeScheduleEndHour = '23:59:59';
                $ps->save();
            }
        }
        foreach($data['placeTips'] as $dpt){
            // dd($dpt);
            $pt = new PlaceTips;
            $pt->destinationId = $destination->destinationId;
            $pt->tipsQuestionId = $dpt['questionId'];
            $pt->placeTipsAnswer = $dpt['EN'];
            $pt->languageId = 1;
            $pt->save();

            $pt = new PlaceTips;
            $pt->destinationId = $destination->destinationId;
            $pt->tipsQuestionId = $dpt['questionId'];
            $pt->placeTipsAnswer = $dpt['ID'];
            $pt->languageId = 2;
            $pt->save();
        }
        // dd($data);
        if($request->hasFile('placePhoto')){
            $i = 0;
            foreach($data['placePhoto'] as $dpp){
                $i++;
                $fileName = 'place_'.$i.'_';
                $fileExt = $dpp->getClientOriginalExtension();
                $fileToSave = $fileName.time().'.'.$fileExt;
                $path = $dpp->move('upload/place',$fileToSave);
                $pp = new PlacePhoto;
                $pp->destinationId = $destination->destinationId;
                $pp->placePhotoUrl = 'upload/place/'.$fileToSave;
                $pp->save();
            }
        }

        return redirect('admin/master/place');

    }

    public function editPlace($id){
        $place_type = PlaceType::all();
        $province = Province::all();
        $destination = Destination::join('cities', 'cities.id', 'destination.city')
            ->join('provinces', 'provinces.id', 'cities.province_id')
            ->join('place_type', 'place_type.placeTypeId', 'destination.placeTypeId')
            ->where('destinationId', $id)
            ->first();
        $destinationEN = PlaceTranslation::where('destinationId', $id)
            ->where('languageId', 1)
            ->first();
        $destinationID = PlaceTranslation::where('destinationId', $id)
            ->where('languageId', 2)
            ->first();
        $place_activity = PlaceActivity::join('activity', 'place_activities.placeActivityName', 'activity.activityId')
            ->where('destinationId', $id)->get();
        // dd($place_activity);
        $place_schedule = PlaceSchedule::where('destinationId', $id)->get();
        $place_tips = PlaceTips::where('destinationId', $id)->get();
        // return $place_tips;
        $place_photo = PlacePhoto::where('destinationId', $id)->get();
        $count_place_tips = PlaceTips::where('destinationId', $id)->groupBy('tipsQuestionId')->orderBy('placeTipsId', 'asc')->get();
        $tips_question = TipsQuestion::all();
        return view('admin.master.place.edit', [
            'province' => $province,
            'destination' => $destination,
            'destinationEN' => $destinationEN,
            'destinationID' => $destinationID,
            'place_type' => $place_type,
            'place_activity' => $place_activity,
            'place_schedule' => $place_schedule,
            'place_photo' => $place_photo,
            'place_tips' => $place_tips,
            'count_place_tips' => $count_place_tips,
            'tips_question' => $tips_question
        ]);
    }
    public function activeStatusPlace($id){
        $destination = Destination::find($id);
        $destination->destinationStatus= 'active';
        $destination->save();
    }
    public function disabledStatusPlace($id){
        $destination = Destination::find($id);
        $destination->destinationStatus= 'disabled';
        $destination->save();
    }
    public function updatePlace(Request $request){
        $data =Input::all();
        $id_destination = $data['destinationId'];
        // dd($data);
        $destination = Destination::find($id_destination);
        $destination->destination = $data['EN']['placeName'];
        $destination->village = $data['village'];
        $destination->district = $data['district'];
        $destination->city = $data['city'];
        $destination->province = $data['province'];
        $destination->latitude = $data['latitude'];
        $destination->longitude = $data['longitude'];
        $destination->placeVisitHours = $data['placeVisitHours'];
        $destination->placeVisitMinutes = $data['placeVisitMinutes'];
        $destination->placeScheduleType = $data['placeScheduleType'];
        $destination->destinationPhoneNumber = $data['format'].'-'.$data['phone'];
        $destination->destinationAddress = $data['address'];
        $destination->placeTypeId = $data['placeType'];
        $destination->save();
        //delete
        PlaceTranslation::where('destinationId', $id_destination)->delete();
        //EN
        $pt = new PlaceTranslation;
        $pt->destinationId = $destination->destinationId;
        $pt->placeName = $data['EN']['placeName'];
        $pt->placeDescription = $data['EN']['placeDescription'];
        $pt->languageId = 1;
        $pt->save();
        //ID
        $pt = new PlaceTranslation;
        $pt->destinationId = $destination->destinationId;
        $pt->placeName = $data['ID']['placeName'];
        $pt->placeDescription = $data['ID']['placeDescription'];
        $pt->languageId = 2;
        $pt->save();
        //delete
        PlaceActivity::where('destinationId', $id_destination)->delete();
        foreach($data['placeActivity'] as $dpa){
            $pt = new PlaceActivity;
            $pt->destinationId = $destination->destinationId;
            $pt->placeActivityName = $dpa;
            $pt->save();
        }
        //delete
        PlaceSchedule::where('destinationId', $id_destination)->delete();
        if($data['placeScheduleType']=="yes"){
            foreach($data['placeSchedule'] as $dps){
                $ps = new PlaceSchedule;
                $ps->destinationId = $destination->destinationId;
                $ps->placeScheduleDay = $dps['ScheduleDay'];
                $ps->placeScheduleCondition = $dps['ScheduleCondition'];
                if($dps['ScheduleCondition']=='Close'){
                    $ps->placeScheduleStartHour = '00:00';
                    $ps->placeScheduleEndHour = '00:00';
                }
                else{
                    if(array_key_exists('FullDay', $dps)){
                        $ps->placeScheduleStartHour = '00:00:00';
                        $ps->placeScheduleEndHour = '23:59:59';
                    }
                    else{
                        $ps->placeScheduleStartHour = $dps['StartHour'];
                        $ps->placeScheduleEndHour = $dps['EndHour'];
                    }
                }
                $ps->save();
            }
        }
        else{
            foreach($data['placeSchedule'] as $dps){
                $ps = new PlaceSchedule;
                $ps->destinationId = $destination->destinationId;
                $ps->placeScheduleDay = $dps['ScheduleDay'];
                $ps->placeScheduleCondition = "Open";
                $ps->placeScheduleStartHour = '00:00:00';
                $ps->placeScheduleEndHour = '23:59:59';
                $ps->save();
            }
        }
        //delete
        PlaceTips::where('destinationId', $id_destination)->delete();
        foreach($data['placeTips'] as $dpt){
            // dd($dpt);
            $pt = new PlaceTips;
            $pt->destinationId = $destination->destinationId;
            $pt->tipsQuestionId = $dpt['questionId'];
            $pt->placeTipsAnswer = $dpt['EN'];
            $pt->languageId = 1;
            $pt->save();

            $pt = new PlaceTips;
            $pt->destinationId = $destination->destinationId;
            $pt->tipsQuestionId = $dpt['questionId'];
            $pt->placeTipsAnswer = $dpt['ID'];
            $pt->languageId = 2;
            $pt->save();
        }
        if($request->hasFile('placePhoto')){
            $i = 0;
            foreach($data['placePhoto'] as $dpp){
                $i++;
                $fileName = 'place_'.$i.'_';
                $fileExt = $dpp->getClientOriginalExtension();
                $fileToSave = $fileName.time().'.'.$fileExt;
                $path = $dpp->move('upload/place',$fileToSave);
                $pp = new PlacePhoto;
                $pp->destinationId = $destination->destinationId;
                $pp->placePhotoUrl = 'upload/place/'.$fileToSave;
                $pp->save();
            }
        }
        

        return redirect('admin/master/place/edit/'.$id_destination);
    }

    public function deletePhoto(){
        $place_photo = PlacePhoto::find(request('key'));
        $result = $place_photo->delete();
        return response()->json();
    }
    public function indexPlaceType(){
        $place_type = PlaceType::all();
        return view('admin.master.place-type.index',
            ['place_type' => $place_type]
        );
    }
    public function listPlaceType(){
        $place_type = PlaceType::all();
        return Datatables::of($place_type)->make(true);
    }
    public function findPlaceType($id){
        $place_type = PlaceType::where('placeTypeId',$id)->first();
        return response()->json($place_type,200);
    }
    public function addPlaceType(Request $request){
        $data =Input::all();
        PlaceType::create($data);
        return redirect()->back();
    }
    public function editPlaceType(Request $request){
        $data =Input::all();
        $placeTypeId = $data["editPlaceTypeId"];
        $placeTypeNameEN = $data["editPlaceTypeNameEN"];
        $placeTypeNameID = $data["editPlaceTypeNameID"];
        $place_type = PlaceType::find($placeTypeId);
        $place_type->placeTypeNameEN =  $placeTypeNameEN;
        $place_type->placeTypeNameID =  $placeTypeNameID;
        $place_type->save();
        return redirect()->back();
    }
    public function deletePlaceType($id){
        $place_type = PlaceType::find($id);
        $result = $place_type->delete();
        return redirect()->back();
    }
}
