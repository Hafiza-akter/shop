<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\User;
use Hash;
use Session;

class UserController extends Controller
{
    public function index(){
        // $user = Session::get('user');
        // dd($user->email);
        $userList = User::orderBy('id','DESC')->paginate(5);
        return view('user/list',compact('userList'));
    }
    public function create(){
        return view('user/create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email'  => 'required|unique:users,email',
            'password' => 'required',
            'status' => 'required',
            
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $status = $request->input('status');
        if($request->input('super_admin')){
            $superAdmin = 1;
        }
        else{
            $superAdmin = 0;
        }
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->status = $status;
        $user->is_super_admin = $superAdmin;
        $user->save();
        return redirect()->route('userlist')->with('message', 'User created successfully!');

    }
    public function delete($id){
        $query = User::Where('id',$id)->delete();
        return redirect()->route('userlist')->with('message','User removed successfully!');
    }
    public function edit($id){
        // return $id;
        $user = User::Where('id',$id)->first();
       return view('user/edit', compact('user'));
    }
    public function update(Request $request){
        $id = $request->input('id');
        $validatedData = $request->validate([
            'name' => 'required',
            'email'  => 'required|unique:users,email,'.$id,
            'password' => 'required',
            'status' => 'required',
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $status = $request->input('status');
        if($request->input('super_admin')){
            $superAdmin = 1;
        }
        else{
            $superAdmin = 0;
        }
        $user = User::Where('id',$id)->first();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->status = $status;
        $user->is_super_admin = $superAdmin;
        $user->save();
        return redirect()->route('userlist')->with('message', 'User edited successfully!');
    }
}
