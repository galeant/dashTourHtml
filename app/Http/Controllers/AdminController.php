<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\Company;
use DB;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Datatables;

class AdminController extends Controller
{
    public function home()
    {   
        if(session()->get('token') != null && session()->get('account') != null)
        {
            return view('admin.home');
        }else{
            return redirect('admin/login');
        }
    }
    public function data($tipe)
    {
        if($tipe == 'baru'){
            $suplier = Company::where(['status' => 'AwaitingModeration'])->get();
        }else if($tipe == 'aktif'){
            $suplier = Company::where(['status' => 'active'])->get();
        }else if($tipe == 'suspend'){
            $suplier = Company::where(['status' => 'suspend'])->get();
        }else if($tipe == 'decline'){
            $suplier = Company::where(['status' => 'decline'])->get();
        }else{
            $suplier = [
                'pesan' => 'error'
            ];
        }
        return Datatables::of($suplier)
            ->addColumn('action', function ($suplier) {
                return '<a href="/admin/company/'.$suplier->companyId.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->make(true);
    }
    public function dataCompany($id){
        $data = Company::with([
                'products',
                'province',
                'city',
                'products.prices',
                'products.image_destination',
                'products.image_activity',
                'products.image_accommodation',
                'products.image_other',
                'products.videos',
                'products.itineraries',
                'products.schedules',
                'products.destinations',
                'products.destinations.province',
                'products.destinations.city',
                'products.destinations.destination',
                'products.activities',
                'products.includes',
                'products.excludes'
            ])
            ->where('companyId', $id)->first();
        // dd($data);
        $province = DB::table('provinces')->get();
        return view('admin.companyProfile',['data'=>$data,'provinces'=>$province]);
    }
    public function formLogin()
    {
        return view('admin.login');
    }
    public function loginProcess(Request $req)
    {
        $cek = Admin::where(['email' => $req->email,'password' => md5($req->password)])->first();
        if($cek != null)
        {
            $token = str_random(50);
            session()->put('account', $cek['email']);
            session()->put('token', $token);
            $cek->update([
                'token' => $token
            ]);
            return redirect('/admin');
        }else{
            return redirect('/admin/login');
        }
    }

    public function booking()
    {
        return view('admin.page.home');
    }
    public function transaction()
    {
        return view('admin.page.home');
    }
    public function user()
    {
        return view('admin.page.home');
    }
    public function setting()
    {
        return view('admin.page.home');
    }
    public function logout(){
        Session::flush();
        return redirect('admin/login');
    }
}
