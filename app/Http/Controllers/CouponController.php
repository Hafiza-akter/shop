<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Coupon;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couponList = Coupon::where('active_status',1)->orderBy('id','DESC')->paginate(5);
        // dd($couponList);
        return view('coupon/list',compact('couponList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coupon/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'code' => 'required',
            'type' => 'required',
            'value' => 'required',
            'upto' => 'required',
            'active_status' => 'required',
            'validity' => 'required',
        ]);
        $coupon = new Coupon();
        $coupon->code = $request->input('code');
        $coupon->type = $request->input('type');
        $coupon->value = $request->input('value');
        $coupon->upto = $request->input('upto');
        $coupon->active_status = $request->input('active_status');
        $coupon->validity = $request->input('validity');
        $coupon->active_status = 1;
        $coupon->save();
        return redirect()->route('couponList')->with('message','Coupon create successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::where('id',$id)->first();
        return view('coupon/edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $validation = $request->validate([
            'code' => 'required',
            'type' => 'required',
            'value' => 'required',
            'upto' => 'required',
            'active_status' => 'required',
            'validity' => 'required',
        ]);
        $coupon = Coupon::where('id',$request->id)->first();
        $coupon->code = $request->input('code');
        $coupon->type = $request->input('type');
        $coupon->value = $request->input('value');
        $coupon->upto = $request->input('upto');
        $coupon->active_status = $request->input('active_status');
        $coupon->validity = $request->input('validity');
        $coupon->active_status = 1;
        $coupon->save();
        return redirect()->route('couponList')->with('message','Coupon create successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $coupon = Coupon::where('id',$id)->first();
       $coupon->active_status = 0;
       $coupon->save();
       return redirect()->route('couponList')->with('message','Coupon deleted successfully!');
    }
}
