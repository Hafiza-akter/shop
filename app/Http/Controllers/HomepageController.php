<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\HomePage;
use App\model\Category;
use Illuminate\Support\Str;



class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeSetting = HomePage::all()->first();
        return view('homePage/list',compact('homeSetting'));
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
        $homeSetting = HomePage::where('id',$id)->first();
        $category = Category::all();
        return view('homePage/edit',compact('homeSetting','category'));
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
            'category1' => 'required',
            'category2' => 'required',
            'category3' => 'required'
        ]);
        $id = $request->input('id');
        $category1 = $request->input('category1');
        $category2 = $request->input('category2');
        $category3 = $request->input('category3');
        $homeSetting = HomePage::Where('id',$id)->first();
        $homeSetting->category1 = $category1;
        $homeSetting->category2 = $category2;
        $homeSetting->category3 = $category3;
        if ($request->hasFile('banner1')){
            $name = Str::random(20);
            $data = getimagesize($request->file('banner1'));
            $num = rand(1,1000);
            $w = $data[0];
            $h = $data[1];
            if($w == 800 && $h ==152){
                if ($request->hasFile('banner1')){
                    $file = $request->file('banner1');
                    // dd($file->getClientOriginalName());
                    $file->move(public_path().'/website/images/banner/', $name.'_'.$num.''.'.'.$file->getClientOriginalExtension());
                    $image = $name.'_'.$num.''.'.'.$file->getClientOriginalExtension();
                }
                $homeSetting->banner1 = $image;
            }
            else{
                return redirect()->route('homepageedit',$id)->with('message','Banner one size should be 800 X 152 !');

            }
        }

        if ($request->hasFile('banner2')){
            $name = Str::random(20);
            $data = getimagesize($request->file('banner2'));
            $num = rand(1,1000);
            $w = $data[0];
            $h = $data[1];
            if($w == 800 && $h ==152){
                if ($request->hasFile('banner2')){
                    $file = $request->file('banner2');
                    // dd($file->getClientOriginalName());
                    $file->move(public_path().'/website/images/banner/', $name.'_'.$num.''.'.'.$file->getClientOriginalExtension());
                    $image = $name.'_'.$num.''.'.'.$file->getClientOriginalExtension();
                }
                $homeSetting->banner2 = $image;
            }
            else{
                return redirect()->route('homepageedit',$id)->with('message','Banner Two size should be 800 X 152 !');

            }
        }

        if ($request->hasFile('banner3')){
            $name = Str::random(20);
            $data = getimagesize($request->file('banner3'));
            $num = rand(1,1000);
            $w = $data[0];
            $h = $data[1];
            if($w == 1042 && $h ==111){
                if ($request->hasFile('banner3')){
                    $file = $request->file('banner3');
                    // dd($file->getClientOriginalName());
                    $file->move(public_path().'/website/images/banner/', $name.'_'.$num.''.'.'.$file->getClientOriginalExtension());
                    $image = $name.'_'.$num.''.'.'.$file->getClientOriginalExtension();
                }
                $homeSetting->banner3 = $image;
            }
            else{
                return redirect()->route('homepageedit',$id)->with('message','Banner Three size should be 1042 X 111 !');

            }
        }
        $homeSetting->save();
        return redirect()->route('homepagelist')->with('message','Successfully Updated!');

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
