<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;


class userController extends Controller
{
    public function User(){
      return view('welcome');
    }
    //sign up
    public function saveUser(Request $request){
      // $this->validate($request, [
      //   'password' => 'min:6',
      //   'co_password' => 'required_with:password|same:password|min:6'
      //   ]);
      $user_data = array();
      $user_data['first_name'] = $request->first_name;
      $user_data['last_name'] = $request->last_name;
      $user_data['name_of_organization'] = $request->name_of_organization;
      $user_data['street'] = $request->street;
      $user_data['city'] = $request->city;
      $user_data['e_mail'] = $request->e_mail;
      $user_data['mobile_number'] = $request->mobile_number;
      $user_data['password'] = $request->password;
      $user_data['co_password'] = $request->co_password;
    //  dd($user_data);
    DB::table('users')->insert($user_data);
    return Redirect::to('/');
    }
    //login Controller
    public function loginFrom(){
      return view('pages.login');
    }
    public function Login(Request $request){
     $number = $request->phone_number;
     $pass = $request->password;

      $user = DB::table('users')->where('mobile_number',$number)->first();
       $user_number = $user->mobile_number;
       $user_pass = $user->password;
       Session::put('id',$user->id);
       Session::put('first_name',$user->first_name);
      if($number === $number && $user_pass === $pass){
        return view('pages.licence-key');
      }else{
        echo "no";
      }
    }

    public function userData(Request $request){


        $datum = DB::table('users')->where('id',$request->id)->first();

        return response()->json($datum);
    }

   public function encryptData(Request $request){

        $datum = Crypt::encryptString($request->id.$request->month);

     return response()->json($datum);
   }
   public function licenceSave(Request $request){
           $data = array();
          $data['id'] = $request->input('id');
          $data['licence_key'] = $request->input('licence_key');
          $data['month'] = $request->input('month');
          $update = DB::table('users')
          ->where('id', $data['id'])
          ->update([ 'license_key' => $data['licence_key'], 'expire_date' => $data['month'] ]);

     return response()->json('success');
   }
}
