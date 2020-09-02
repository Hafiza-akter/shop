<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\User;
use App\model\Product;
use App\model\Order;
use Hash;
use Session;
use Carbon\Carbon;


class LoginController extends Controller
{
    public function index(){
        
        return view('login');
    }
    public function login(Request $request){
        $validateData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $email = $request->input('email');
        $pass = $request->input('password');
        $user = User::where('email',$email)
                    ->where('status',1)
                    ->first();
        if(!$user){
            return redirect()->back()->with('message','Incorrect username or password!');
        }
        if(!Hash::check($pass,$user->password)){
            return redirect()->back()->with('message','Incorrect username or password!');
        }

        Session::put('user', $user);
        return redirect()->route('dashboard')->with('message','Login Success!');
    }
    public function logout(){
        session()->flush();
        return redirect()->route('base');
    }
    public function dashboard(){
        $totalOrder = Order::all()->count();
        $totalUser = User::all()->count();
        $totalProduct = Product::where('status',1)->count();
        $recentOrders = Order::whereDate('order_date', '>', Carbon::now()->subDays(7))
        ->get()->count();
                                // dd($recentOrders);
        return view('dashboard',compact('totalOrder','totalUser','totalProduct','recentOrders'));
    }
}
