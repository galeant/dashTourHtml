<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use JWTAuthException;

use App\User;
use App\Admin;
use App\Member;

class AuthController extends Controller
{
    public function registerUser(Request $req)
    {
        $this->validate($req,[
            'name' => 'required',
            'ownerEmail' => 'required'
        ]);
        
        $name = $req->input('name');
        $ownerEmail = $req->input('ownerEmail');
        $password = rand(5,1000);
        $companyCode = '1';
        
        //kodingan untuk save kaya gini adalah koding model mass assigment
        //harus di deklarasiin dulu fillablenya
        $user = new User([
            'name' => $name,
            'email' => $ownerEmail,
            'companyCode' => $companyCode,
            'password' => bcrypt($password)
        ]);

        $credentials = [
            'email' => $ownerEmail,
            'password' => $password
        ];

        if($user->save())
        {   
            $token = null;
            try{
                if(!$token = JWTAuth::attempt($credentials))
                {
                    return response()->json([
                        'msg' => 'Email or Password incorrect'
                    ], 404);
                }
            }catch(JWJAuthException $e){
                return response()->json([
                    'msg' => 'failed to create token'
                ], 400);
            }

            $user->signin = [
                'href' => 'login url',
                'method' => 'POST',
            ];
            $response = [
                'msg' => 'user created',
                'user' => $user,
                'token' => $token
            ];

            return response()->json($response, 201);
        }
        $response = [
            'msg' => 'something wrong, please contact admin'
        ];

        return response()->json($response,404);
    }
    public function loginUser(Request $req)
    {
        $email = $req->input('email');
        $password = md5($req->input('password'));

        $validation = User::where('email',$email)->get();
        if(count($validation) != 0 || null)
        {
            $validation2 = User::where(['email' => $email, 'password' => $password])->get();
            if(count($validation2) != 0 || null)
            {
                $response = [
                    'status' => 'success',
                    'msg' => 'user with id-'.$validation2[0]->id.'-has login',
                    'CompanyCode' => $validation[0]->companyCode
                ];

                return response()->json($response, 200);
            }else{
                $response = [
                    'status' => 'fail',
                    'msg' => 'wrong password' 
                ];
    
                return response()->json($response, 404);
            }
        }
        $response = [
            'status' => 'fail',
            'msg' => 'somenthing wrong'
        ];
        return response()->json($response,404);
    }

    public function logoutUser(){

    }

     public function registerAdmin(Request $req)
    {
        $this->validate($req,[
            'name' => 'required',
            'ownerEmail' => 'required'
        ]);
        
        $name = $req->input('name');
        $ownerEmail = $req->input('ownerEmail');
        $password = rand(5,1000);
        $companyCode = '1';
        
        //kodingan untuk save kaya gini adalah koding model mass assigment
        //harus di deklarasiin dulu fillablenya
        $user = new User([
            'name' => $name,
            'email' => $ownerEmail,
            'companyCode' => $companyCode,
            'password' => bcrypt($password)
        ]);

        $credentials = [
            'email' => $ownerEmail,
            'password' => $password
        ];

        if($user->save())
        {   
            $token = null;
            try{
                if(!$token = JWTAuth::attempt($credentials))
                {
                    return response()->json([
                        'msg' => 'Email or Password incorrect'
                    ], 404);
                }
            }catch(JWJAuthException $e){
                return response()->json([
                    'msg' => 'failed to create token'
                ], 400);
            }

            $user->signin = [
                'href' => 'login url',
                'method' => 'POST',
            ];
            $response = [
                'msg' => 'user created',
                'user' => $user,
                'token' => $token
            ];

            return response()->json($response, 201);
        }
        $response = [
            'msg' => 'something wrong, please contact admin'
        ];

        return response()->json($response,404);
    }
    
    public function loginAdmin(Request $req)
    {
        $email = $req->input('email');
        $password = md5($req->input('password'));

        $validation = User::where('email',$email)->get();
        if(count($validation) != 0 || null)
        {
            $validation2 = User::where(['email' => $email, 'password' => $password])->get();
            if(count($validation2) != 0 || null)
            {
                $response = [
                    'status' => 'success',
                    'msg' => 'user with id-'.$validation2[0]->id.'-has login',
                    'CompanyCode' => $validation[0]->companyCode
                ];

                return response()->json($response, 200);
            }else{
                $response = [
                    'status' => 'fail',
                    'msg' => 'wrong password' 
                ];
    
                return response()->json($response, 404);
            }
        }
        $response = [
            'status' => 'fail',
            'msg' => 'somenthing wrong'
        ];
        return response()->json($response,404);
    }
    public function logoutAdmin(){

    }

    public function registerMember(Request $req)
    {
        $this->validate($req,[
            'name' => 'required',
            'ownerEmail' => 'required'
        ]);
        
        $name = $req->input('name');
        $ownerEmail = $req->input('ownerEmail');
        $password = rand(5,1000);
        $companyCode = '1';
        
        //kodingan untuk save kaya gini adalah koding model mass assigment
        //harus di deklarasiin dulu fillablenya
        $user = new User([
            'name' => $name,
            'email' => $ownerEmail,
            'companyCode' => $companyCode,
            'password' => bcrypt($password)
        ]);

        $credentials = [
            'email' => $ownerEmail,
            'password' => $password
        ];

        if($user->save())
        {   
            $token = null;
            try{
                if(!$token = JWTAuth::attempt($credentials))
                {
                    return response()->json([
                        'msg' => 'Email or Password incorrect'
                    ], 404);
                }
            }catch(JWJAuthException $e){
                return response()->json([
                    'msg' => 'failed to create token'
                ], 400);
            }

            $user->signin = [
                'href' => 'login url',
                'method' => 'POST',
            ];
            $response = [
                'msg' => 'user created',
                'user' => $user,
                'token' => $token
            ];

            return response()->json($response, 201);
        }
        $response = [
            'msg' => 'something wrong, please contact admin'
        ];

        return response()->json($response,404);
    }
    public function loginMember(Request $req)
    {
        $email = $req->input('email');
        $password = md5($req->input('password'));

        $validation = User::where('email',$email)->get();
        if(count($validation) != 0 || null)
        {
            $validation2 = User::where(['email' => $email, 'password' => $password])->get();
            if(count($validation2) != 0 || null)
            {
                $response = [
                    'status' => 'success',
                    'msg' => 'user with id-'.$validation2[0]->id.'-has login',
                    'CompanyCode' => $validation[0]->companyCode
                ];

                return response()->json($response, 200);
            }else{
                $response = [
                    'status' => 'fail',
                    'msg' => 'wrong password' 
                ];
    
                return response()->json($response, 404);
            }
        }
        $response = [
            'status' => 'fail',
            'msg' => 'somenthing wrong'
        ];
        return response()->json($response,404);
    }
    public function logoutMember(){

    }
}
