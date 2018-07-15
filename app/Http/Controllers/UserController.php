<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{

    public function user(){
        $companyid = 1;
        $userid = 1;
        if(DB::table('role_activity')->where('userId', $userid)->exists()==false){
            $this->userowner($userid);
        }
        // $this->usercustom(2);
        // $this->usercustom(3);

        $this->useraccess($userid);
        $datauser = DB::table('user')->where('companyId', $companyid)->get();
        $thisuser = DB::table('user')->where('userId', $userid)->get(); 
        $countuser = DB::table('user')->where('companyId', $companyid)->where('roleId', 2)->count();
        $accessuser = DB::table('role_activity')
                ->join('user', 'role_activity.userId', 'user.userId')
                ->join('navbar_activity', 'navbar_activity.navbarActivityId','role_activity.navbarActivityId')
                ->join('navbar', 'navbar_activity.navbarId', 'navbar.navbarId')
                ->where('companyId', $companyid)
                ->get();
        $datanavbar = DB::table('navbar')->get();
        $dataactivity = DB::table('navbar_activity')->get();
        // return $accessuser;
        return view('page.user', [
            'datauser' => $datauser,    
            'datanavbar' => $datanavbar, 
            'dataactivity' => $dataactivity, 
            'accessuser' => $accessuser, 
            'countuser' => $countuser 
        ]);
    }
    public function updateaccess(Request $request){
        $useraccess = $request->all();
        $setaccess=DB::table('role_activity')
                    ->where('userId', $useraccess["user_id"])
                    ->update(['roleActivityStatus' => 0]);
        if(!empty($useraccess["user_access"])){
            foreach($useraccess["user_access"] as $selected){
                echo $selected;
                $updateaccess=DB::table('role_activity')
                        ->where('roleActivityId', $selected)
                        ->update(['roleActivityStatus' => 1]);
            }
        }
        return redirect()->back();
    }

    public function adduser(Request $request){
        $adduser = $request->all();
        $userId= DB::table('user')->insertGetId([
            'email' => $adduser['email'], 
            'companyId' => 1,
            'roleId' => 2
        ]);
        $this->usercustom($userId);
	    return redirect()->back();
    }

    public function resetpassworduser($id){
        $resetpassword = DB::table('user')->where('userId', $id)->first();
	    return redirect()->back();
    }

    public function deleteuser($id){
        $delete = DB::table('user')->where('userId', $id)->delete();
	    return redirect()->back();
    }

    public function useraccess($userid){
        $userrole = DB::table('user')->where('userId', $userid)->value('roleId'); 
        $usermenuaccess = DB::table('user')->join('role_activity', 'user.userId', 'role_activity.userId')
        ->where('role_activity.userId', $userid)
        ->orderBy('navbarActivityId')
        ->select('navbarActivityId', 'roleActivityStatus')
        ->get();
        session([
            'userrole' => $userrole,
            'overviewfullaccess' => $usermenuaccess[0]->roleActivityStatus,
            'productsfullaccess' => $usermenuaccess[1]->roleActivityStatus,
            'productsview' => $usermenuaccess[2]->roleActivityStatus,
            'productsupdate' => $usermenuaccess[3]->roleActivityStatus,
            'productsadd' => $usermenuaccess[4]->roleActivityStatus,
            'bookingsfullaccess' => $usermenuaccess[5]->roleActivityStatus,
            'campaignfullaccess' => $usermenuaccess[6]->roleActivityStatus,
            'campaignview' => $usermenuaccess[7]->roleActivityStatus,
            'campaignupdate' => $usermenuaccess[8]->roleActivityStatus,
            'campaignadd' => $usermenuaccess[9]->roleActivityStatus,
            'reportsfullaccess' => $usermenuaccess[10]->roleActivityStatus,
            'usersfullaccess' => $usermenuaccess[11]->roleActivityStatus,
            'usersview' => $usermenuaccess[12]->roleActivityStatus,
            'usersupdate' => $usermenuaccess[13]->roleActivityStatus,
            'usersadd' => $usermenuaccess[14]->roleActivityStatus
        ]);
    }

    public function userowner($userid){
        if(DB::table('role_activity')->where('userId', $userid)->exists()==false){
            $navbaractivity = DB::table('navbar_activity')
                ->select('navbarActivityId')
                ->get();
            foreach($navbaractivity as $na){
                $roleactivity = DB::table('role_activity')
                    ->insert([
                        'userId' => $userid,
                        'roleId' => 1,
                        'navbarActivityId' => $na->navbarActivityId,
                        'roleActivityStatus' => 1 
                ]);
            }
            return redirect('/overview');
        }
        else{
            return "User Access Exists";
        }
        
    }

    public function usercustom($userid){
        if(DB::table('role_activity')->where('userId', $userid)->exists()==false){
            $navbaractivity = DB::table('navbar_activity')
                ->select('navbarActivityId')
                ->get();
            foreach($navbaractivity as $na){
                $roleactivity = DB::table('role_activity')
                    ->insert([
                        'userId' => $userid,
                        'roleId' => 2,
                        'navbarActivityId' => $na->navbarActivityId,
                        'roleActivityStatus' => 0
                ]);
            }
            $roleactivityoverview = DB::table('role_activity')
                    ->where('userId', $userid)
                    ->where('navbarActivityId', 1)
                    ->where('roleId', 2)
                    ->update([
                        'roleActivityStatus' => 1 
                ]);
                
            return redirect('/overview');
        }
        else{
            return "User Access Exists";
        }
        
    }

}
