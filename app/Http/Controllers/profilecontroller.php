<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use auth;
use Illuminate\Support\Facades\Hash;
class profilecontroller extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {

        return view('profile');
    }
    public function form()
    {

        return view('edit');
    }
    public function update(Request $request){
        $avatar=$request->file('avatar');
        if ($avatar){
            $avatar_name=rand(100,1000);
            $ext = strtolower($avatar->getClientOriginalExtension());
            $avatar_full_name=$avatar_name.'.'.$ext;
            $upload_path='public/profile/';
            $avatar->move($upload_path,$avatar_full_name);
            $avatar_url=$upload_path.$avatar_full_name;
            $avatar=$avatar_url;
        }

        user::where('id', auth::id())->update(array(
            'name'=>$request->name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
            'avatar'=>$avatar

        ));

        return redirect()->route('profile')->withErrors(['msg'=>'Update Succesfully!']);

    }
}
