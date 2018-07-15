<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use App\Company;
use App\User;
use App\Mail\WelcomeMail;
use App\Mail\ConfirmMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use DB;
use Yajra\Datatables\Datatables;

class PartnerController extends Controller
{
    public function indexPartner(){
        $company = $this->partnerActivity();
        $partner = $company;
        // return $partner;
        return view('admin.partner.index',[
            'partner' => $partner
        ]);
        // dd($company);
    }

    public function detailPartner($companyId){
        $company = Company::leftjoin('provinces', 'provinces.id', 'company.companyProvince')
            ->leftjoin('cities', 'cities.id', 'company.companyCity')
            ->where('companyId', $companyId)
            ->select('company.*', 'provinces.name as province', 'cities.name as city')->first();        
        $status = '';
        if($company->status=="Active"){
            $status = '<h4 class="font-bold col-green pull-right">Active</h4>';
        }
        else if($company->status=="Disabled"){
            $status = '<h4 class="font-bold col-red pull-right">Disabled</h4>';
        }
        $province = Province::all();
        $cities = City::where('province_id',$company->companyProvince)->get();
        $member = User::where('companyId', $companyId)->get();
        return view('admin.partner.detail',[
            'company' => $company,
            'status' => $status,
            'province' => $province,
            'city' => $cities,
            'member' => $member
        ]);
        // dd($company);
    }


    public function partnerAccomodation(){

    }

    public function partnerActivity(){
        $company = Company::whereIn('status', ['active', 'disabled'])
            ->select(
            DB::raw('CONCAT("Activity") AS partnerType'),
            'companyId as partnerId',
            'companyName',
            'email as picEmailAddress',
            'fullName as picName',
            'status')->get();
        return $company;
    }

    public function partnerCarrental(){
        
    }

    public function findPartner(Request $request){
        $type = $request->type;
        $keyword = $request->keyword;
        $partner="";
        if($type=="Activity"){
            $partner = $this->findPartnerActivity($keyword);
        }

        return Datatables::of($partner)
            ->addColumn('action', function ($partner) {
                return '<a href="/admin/partner/index/'.$partner->partnerId.'"><i class="glyphicon glyphicon-edit"></i>View Detail</a>';
            })
            ->make(true);
        
    }

    public function findPartnerActivity($keyword){
        $company = Company::where('companyId','like', '%'.$keyword.'%')
            ->orwhere('email','like', '%'.$keyword.'%')
            ->orWhere('companyName', 'like', '%'.$keyword.'%')
            ->orWhere('fullName', 'like', '%'.$keyword.'%')
            ->whereIn('status', ['active', 'disabled'])
            ->select(
                DB::raw('CONCAT("Activity") AS partnerType'),
                'companyId as partnerId',
                'companyName',
                'email as picEmailAddress',
                'fullName as picName',
                'status')
            ->get();
        return $company;
    }
    public function indexActivity(){
        $company = Company::whereIn('status', ['NotVerified','AwaitingSubmission','AwaitingModeration','InsufficientData', 'Rejected'])
            ->select(
            'companyId as partnerId',
            'companyName',
            'email as picEmailAddress',
            'status', 'updated_at')->get();
        return view('admin.partner.activity.index',[
            'company' => $company
        ]);
    }
    public function detailActivity($id){
        $company = Company::leftjoin('provinces', 'provinces.id', 'company.companyProvince')
            ->leftjoin('cities', 'cities.id', 'company.companyCity')
            ->where('companyId', $id)
            ->select('company.*', 'provinces.name as province', 'cities.name as city')->first();
        $province = Province::all();
        $cities ='';
        if($company->companyProvince!=NULL){
            $cities = City::where('province_id',$company->companyProvince)->get();
        }

        $message = '';
        if($company->status=="NotVerified"){
            $message = '<h4 class="font-bold col-grey pull-right">Not Verified</h4>';
        }
        else if($company->status=="AwaitingSubmission"){
            $message = '<h4 class="font-bold col-orange pull-right">Awaiting Submission</h4>';
        }
        else if($company->status=="AwaitingModeration"){
            $message = '<h4 class="font-bold col-orange pull-right">Awaiting Moderation</h4>';
        }
        else if($company->status=="InsufficientData"){
            $message = '<h4 class="font-bold col-orange pull-right">Insufficient Data</h4>';
        }
        else if($company->status=="Rejected"){
            $message = '<h4 class="font-bold col-rejected pull-right">Rejected</h4>';
        }

        $memo = Company::where('companyId', $id)->value('companyRegistrationMemo');
        $registrationProceed = Company::where('companyId', $id)->value('status');
        return view('admin.partner.activity.detail',[
            'company' => $company,
            'province' => $province,
            'city' => $cities,
            'message' => $message,
            'memo' => $memo,
            'registrationProceed' => $registrationProceed,
        ])->with('success', [$message]);;
    }

    public function sendChangePassword($userId){
        $user = User::where('userId', $userId)->first();
        Mail::to($user->email)->send(new WelcomeMail($user));
        return response()->json('success', 200);
    }

    public function getEmail($userId){
        $email = User::where('userId', $userId)->value('email');
        return $email;
    }

    public function disablePartner($companyId){
        $company = Company::where('companyId', $companyId)->first();
        $company->status = "Disabled";
        $company->save();
        return response()->json('success', 200);
    }
    public function enablePartner($companyId){
        $company = Company::where('companyId', $companyId)->first();
        $company->status = "Active";
        $company->save();
        return response()->json('success', 200);
    }


    public function resendVerification(Request $request){
        $user = User::where('email', $request->input('email'))->first();
        Mail::to($request->input('email'))->send(new WelcomeMail($user));
        return redirect()->back();
    }
    public function updatePartner(Request $request){
        $data = $request->all();
        // return($data);
        $companyId = $data['companyId'];
        $company = Company::find($companyId);
        $company->fill($data)->save();
        return redirect()->back();
    }

    public function updateAkta(Request $request){
        // dd($request);
        $aktaPic = $request->file('aktaPic');
        if($request->hasFile('aktaPic')){
            $aktaExt = $aktaPic->getClientOriginalExtension();
            $aktaToSave = 'akta'.time().'.'.$aktaExt;
            $akta = $aktaPic->move('upload/document/akta',$aktaToSave);
            $company = Company::find($request->companyId);
            $company->aktaUrl = 'upload/document/akta/'.$aktaToSave;
            $company->save();
            return redirect()->back();
        }
    }

    public function updateSIUP(Request $request){
        $SIUPPic = $request->file('SIUPPic');
        if($request->hasFile('SIUPPic')){    
            $siupExt = $SIUPPic->getClientOriginalExtension();
            $siupToSave = 'siup'.time().'.'.$siupExt;
            $siup = $SIUPPic->move('upload/document/siup',$siupToSave);
            $company = Company::find($request->companyId);
            $company->siupUrl = 'upload/document/siup/'.$siupToSave;
            $company->save();
            return redirect()->back();
        }
    }

    public function updateNPWP(Request $request){
        $NPWPPic = $request->file('NPWPPic');
        if($request->hasFile('NPWPPic')){
            $npwpExt = $NPWPPic->getClientOriginalExtension();
            $npwpToSave = 'npwp'.time().'.'.$npwpExt;
            $npwp = $NPWPPic->move('upload/document/npwp',$npwpToSave);
            $company = Company::find($request->companyId);
            $company->npwpUrl = 'upload/document/npwp/'.$npwpToSave;
            $company->save();
            return redirect()->back();
        }
    }

    public function updateKTP(Request $request){
        $KTPPic = $request->file('KTPPic');
        if($request->hasFile('KTPPic')){
            $ktpExt = $KTPPic->getClientOriginalExtension();
            $ktpToSave = 'ktp'.time().'.'.$ktpExt;
            $ktp = $KTPPic->move('upload/document/ktp',$ktpToSave);
            $company = Company::find($request->companyId);
            $company->ktpUrl = 'upload/document/ktp/'.$ktpToSave;
            $company->save();
            return redirect()->back();
        }  
    }

    public function deleteAkta($companyId){
        $company = Company::find($companyId);
        $company->aktaUrl = null;
        $company->save();
        return redirect()->back();
    }

    public function deleteSIUP($companyId){
        $company = Company::find($companyId);
        $company->siupUrl = null;
        $company->save();
        return redirect()->back();
    }

    public function deleteNPWP($companyId){
        $company = Company::find($companyId);
        $company->npwpUrl = null;
        $company->save();
        return redirect()->back();
    }

    public function deleteKTP($companyId){
        $company = Company::find($companyId);
        $company->ktpUrl = null;
        $company->save();
        return redirect()->back();
    }

    public function registration(Request $request){
        $data = $request->all();
        
        if($data['proceedPartner']=='Insufficient Data'){
            $company = Company::find($data['companyId']);
            $company->status = 'InsufficientData';
            $registration->companyRegistrationMemo = $data['registrationMemo'];
            $company->save();
        }
        else if($data['proceedPartner']=='Reject Partner'){
            $company = Company::find($data['companyId']);
            $company->status = 'Rejected';
            $registration->companyRegistrationMemo = $data['registrationMemo'];
            $company->save();
            
        }
        else if($data['proceedPartner']=='Approve and Activate Partner'){
            $company = Company::find($data['companyId']);
            $company->status = 'Active';
            $registration->companyRegistrationMemo = $data['registrationMemo'];
            $company->save();
            
        }
        return redirect()->back();
    }


    public function findActivity(Request $request)
    {
        $type = $request->type;
        $keyword = $request->keyword;
        $company = Company::where('status', $type)
            ->where('email','like', '%'.$keyword.'%')
            ->where('companyName', 'like', '%'.$keyword.'%')
            ->orWhere(function ($query) use ($keyword, $type){
                $query->where('status', $type)
                    ->where('email','like', '%'.$keyword.'%');})
            ->orWhere(function ($query) use ($keyword, $type){
                $query->where('status', $type)
                    ->where('companyName', 'like', '%'.$keyword.'%');})
            ->select(
                'companyId as partnerId',
                'companyName',
                'email as picEmailAddress',
                'status', 'updated_at')->get();
        return Datatables::of($company)
            ->addColumn('action', function ($company) {
                return '<a href="/admin/partner/activity/'.$company->partnerId.'"><i class="glyphicon glyphicon-edit"></i>View Detail</a>';
            })
            ->make(true);
    }
}
