<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        if($request->hasAny('first_name','last_name','email','password','confirm_password')){
            $request->validate([
                'first_name'=>'required|max:255',
                'last_name'=>'required|max:255',
                'email'=>'email|required|unique:users,email',
                'password'=>'min:8|max:10|required',
                'confirm_password' => 'required|same:password'
            ]);

            $details = $request->only('first_name','last_name','email','password','confirm_password');
            if($details['password'] !== $details['confirm_password']){
                return redirect()->route('signup')->withErrors(['message'=>'Password does not match!']);
            }
            if($details){
                $user = new User;
                $user->firstname = $details['first_name'];
                $user->lastname = $details['last_name'];
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

    public function editView(){
        $user = Auth::user();
        return view('LoginUserViews.userinfo',['data'=>$user]);
    }

    public function edit(Request $request){
        try{
            $user = Auth::user();
            foreach($request->all() as $key=>$value){
            if($key != '_token'){
                $user->$key = $value;
            }
            }
            $user->save();
            return response()->json(['success'=>'Updated successfully.']);
        }catch(Exception $error){
            return response()->json(['error'=>$error]);
        }
    }

    public function viewUser(string $id){
        $user = User::find($id);
        $posts = Post::where('user_id',$id)->get()->sortByDesc('created_at');
        return view('LoginUserViews.viewUser',['data'=>$user,'posts'=>$posts]);
    }

    public function search(Request $request)
    {
        $users = DB::table('users')->where('firstname','LIKE','%' . $request->search .'%')->orWhere('lastname','LIKE','%'. $request->search .'%')->get();
        return view('LoginUserViews.searchResult',[
            'results' => $users
        ])->render();
    }

    public function updateUserStatus(){
        $users = User::where('last_seen','>',now()->subMinutes(3))->get();
        return view('LoginUserViews.activeUsers',['onlineUsers'=>$users])->render();
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
