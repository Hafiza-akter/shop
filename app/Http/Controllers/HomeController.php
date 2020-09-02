<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Banner;
use App\model\Product;
use App\model\Category;
use App\model\SubCategory;
use App\model\Setting;
use App\model\HomePage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::Where('status',1)->orderBy('id','desc')->take(5)->get();
        // dd($banner);
        $featureProducts = Product::Where('status',1)
                                    ->where('is_feature',1)->get();
        $discountProducts = Product::Where('status',1)
                                    ->where('is_sale',1)->get();
        $categories = Category::Where('status',1)->orderBy('id','asc')->take(4)->get();
        $homeContent = HomePage::all()->first();
        // dd($categories);
        $comInfo = Setting::all()->first();
        return view('website/home',compact('banners','featureProducts','discountProducts','categories','comInfo','homeContent'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
