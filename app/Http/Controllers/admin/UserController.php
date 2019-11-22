<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Mail;

class UserController extends Controller
{
    public function add_user(){
    	return view('admin.add-user');
    }


    public function adding_user(Request $request){
    	//dd($request['name']);
    	$validate = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed:password_confirmation'],
        ]);
        if($validate->fails()){
        	return redirect()->back()->withErrors($validate);
        }

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if($user){
        	// Mail::send('mail.registration', ['user' => $user], function($message) use ($user){
         //        $message->to($user->email, $user->name)->subject('Registration Mail');
         //        $message->from('no-reply@gmail.com','App Admin');
         //    });
        	return redirect()->back()->with('success', 'User Added!');
        }
    }

    public function showing_users(){
    	// your code
        $users = User::all(); //dd($users);
        return view('admin.show_user')->with('users', $users);
    }

    public function edit_user($id){
        $user = User::find($id); //dd($user);
        return view('admin.edit_user')->with('user', $user);
    }


    public function update_user(Request $request, $id){
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255']
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate);
        }
        if($id){
            $user = User::find($id);
            $user->name = $request['name'];

            $user->save();
            return redirect()->back()->with('success', 'User Updated!');
        }
    }

    public function delete_user($id){
        //dd($id);
        if($id){
            $user = User::find($id);
            $user->delete();
            return redirect()->route('showing-users')->with('success', 'User deleted!');
        }
    }

}
