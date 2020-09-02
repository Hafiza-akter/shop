<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comInfo = Setting::all()->first();
        return view('setting/list',compact('comInfo'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $comInfo = Setting::where('id',$id)->first();
        return view('setting/edit',compact('comInfo'));
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
        $validate = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'about' => 'required',
        ]);
        $id = $request->input('id');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $about = $request->input('about');
       
        $comInfo = Setting::Where('id',$id)->first();
        $comInfo->name = $name;
        $comInfo->address = $address;
        $comInfo->about = $about;
        $comInfo->phone = $phone;
        $num = rand(1,100);
        if($request->hasFile('image')){
            $data = getimagesize($request->file('image'));
            $w = $data[0];
            $h = $data[1];

            if($w == 117 && $h ==30){
                if ($request->hasFile('image')){
                    $file = $request->file('image');
                    // dd($file);
                    $file->move(public_path().'/website/images', $name.'_'.$num.''.'.'.$file->getClientOriginalExtension());
                    $image = $name.'_'.$num.''.'.'.$file->getClientOriginalExtension();
                }
               
                $comInfo->logo = $image;
            }
            else{
                return redirect()->route('settingedit',$id)->with('message','Logo size should be 117 X 30 !');
            }
        }
        $comInfo->save();
        return redirect()->route('settinglist')->with('message','Company Info updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
