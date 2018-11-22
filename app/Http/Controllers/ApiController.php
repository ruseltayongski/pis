<?php
namespace PIS\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PIS\Cdo;
use PIS\Personal_Information;
use PIS\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
   public function login(Request $request){
       $username = $request->username;
       $password = $request->password;
       $user = User::leftJoin('personal_information','personal_information.userid','=','users.username')
           ->where('username',$username)
           ->first(['fname','lname','mname','bbalance_cto','password']);

        if($user && Hash::check($password,$user->password)){
            return json_encode($user);
        }

        return "{}";
   }

   public function cdo($userid,$offset){
        $cdo = Cdo::where('prepared_name','=',$userid)->offset($offset)->limit(10)->get();
        return $cdo;
   }

}

?>