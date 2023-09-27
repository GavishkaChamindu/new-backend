<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $req)

    {

$validateData = $req->validate([

'name' => 'required',
'pass' => 'required',

]);




      $user = new User;
      $user->name = $validateData['name'];
      $user->pass = $validateData['pass'];
      $user->save();

      return ("ok");
    }

    function show(){
        return User::all();
       }

       function login(Request $req){
        $user = User::where('name',$req->name)->first();
        if(!$user){

            return ["error"=>"no matched"];
        }
        return $user;
       }
}

