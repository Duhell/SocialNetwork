<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function home(Request $request)
    {
        Auth::logout();
        if($request->hasAny('email','password')){
            $request->validate([
                'email'=>'email|required',
                'password'=>'required'
            ]);
            $credendials = $request->only('email','password');

            if(Auth::attempt($credendials)){
                return redirect()->route('feeds');
            }else{
                return redirect()->route('login')->withErrors(['message'=>'Wrong email or password!']);
            }
        }else{
            return view('signin');
        }
    }
    public function signup(Request $request)
    {

        if($request->hasAny('name','email','password','confirm_password')){

            $request->validate([
                'name'=>'required|max:255',
                'email'=>'email|required|unique:users,email',
                'password'=>'min:8|max:10|required',
                'confirm_password' => 'required|same:password'
            ]);

            $details = $request->only('name','email','password','confirm_password');
            if($details['password'] !== $details['confirm_password']){
                return redirect()->route('signup')->withErrors(['message'=>'Password does not match!']);
            }
            if($details){
                $user = new User;
                $user->name = $details['name'];
                $user->email = $details['email'];
                $user->password = Hash::make($details['password']);
                $user->save();

                return redirect()->route('login')->with(['message'=>'Successfully Created an Account']);
            }
        }else{
            return view('signup');
        }
    }

    public function changeProfilePicture(Request $request){
        if($request->hasFile('uploadProfilePic')){
            $file = $request->file('uploadProfilePic');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/photos',$filename);

            User::where('id',auth()->user()->id)->update(['profilepicture'=>$path]);
        }
        return redirect()->route('feeds');

    }

    public function edit(Request $request){
        $user = Auth::user();
        return view('LoginUserViews.userinfo',['data'=>$user]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
