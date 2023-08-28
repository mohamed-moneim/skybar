<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\restuser;
use App\Models\offers;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        //valdiate
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|unique:restusers',
            'password' => 'required|string|min:6',
            'mobile' => 'required|min:6'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $user = new restuser();
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->name = $request->name;
        $user->rid = 999;
        $user->password = Hash::make($request->password);
        $user->save();
        $response = ['user' => $user];
        return response()->json($response, 200);

    }

    public function login(Request $req)
    {
        // validate inputs
        $rules = [
            'email' => 'required',
            'password' => 'required|string'
        ];
        $req->validate($rules);
        // find user email in users table
        $user = restuser::where(['email'=>$req->email,"rid"=>999])->first();
        // if user email found and password is correct
        if ($user && Hash::check($req->password, $user->password)) {
            $response = ['user' => $user];
            return response()->json($response, 200);
        }
        $response = ['message' => 'Incorrect email or password'];
        return response()->json($response, 400);
    }
    public function getoffers(){
        $cats =  DB::table('offers as of')
        ->join('settings as set', 'of.rid', '=', 'set.rid')->where("set.offer",1)->select("of.*")->distinct()->get();
        return response()->json($cats, 200);

    }
}