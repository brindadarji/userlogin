<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersData;
use Session;
use Hash;

class loginController extends Controller
{
    public function dashBoard(){
        $data = array();
        if(Session::has('loginId')){
            $data = UsersData::where('id', "=", Session::get('loginId'))->first();
        }
        return view("dashboard", compact('data'));
    }

    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required |email',
            'password'=>'required|min:5|max:10',
        ]);
        
        $user = new UsersData();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $res = $user->save();
        if($res){
            return back()->with('success','Registered Successfully');
        }else{
            return back()->with('fail','Something Wrong');
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required |email',
            'password'=>'required|min:5|max:10',
        ]);
        $user = UsersData::where('email', "=", "$request->email")->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail','Password is Incorrect');
            }
            return back()->with('success','Logged in');
        }
        else{
            return back()->with('fail','No user found');
        }
    }

    public function logOut(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
