<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::Where('status',1)
                            ->orderBy('id','DESC')->paginate(3);
        return view('banner/list',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('banner/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'image' => 'required|image',
            'link' => 'required'

        ]);
        $title = $request->input('title');
        $status = 1;
        $link = $request->input('link');
        $image = 'demothumb.png';
        $num = rand(1,100);
        $data = getimagesize($request->file('image'));
        $w = $data[0];
        $h = $data[1];
        if($w == 1159 && $h ==398){
            if ($request->hasFile('image')){
                $file = $request->file('image');
                // dd($file);
                $file->move(public_path().'/images/banner', $title.'_'.$num.''.'.'.$file->getClientOriginalExtension());
                $image = $title.'_'.$num.''.'.'.$file->getClientOriginalExtension();
            }
           
            $Banner = new Banner();
            $Banner->title = $title;
            $Banner->status = 1;
            $Banner->img_path = $image;
            $Banner->link = $link;
            $Banner->save();
            return redirect()->route('bannerList')->with('message','Banner created successfully!');
        }
        else{
            return redirect()->route('bannerCreate')->with('message','Banner size should be 1159 X 398 !');

        }


        
       
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
      
        $banner = Banner::where('id',$id)->first();
        return view('banner/edit',compact('banner'));
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
            'title' => 'required',
            'link' => 'required'

        ]);
        $title = $request->input('title');
        $status = 1;
        $link = $request->input('link');
        $num = rand(1,100);
        $banner = Banner::where('id',$request->input('id'))->first();
        $banner->title = $title;
        $banner->status = 1;
        $banner->link = $link;
        if($request->hasFile('image')){
            $data = getimagesize($request->file('image'));
            $w = $data[0];
            $h = $data[1];

            if($w == 1159 && $h ==398){
                if ($request->hasFile('image')){
                    $file = $request->file('image');
                    // dd($file);
                    $file->move(public_path().'/images/banner', $title.'_'.$num.''.'.'.$file->getClientOriginalExtension());
                    $image = $title.'_'.$num.''.'.'.$file->getClientOriginalExtension();
                }
               
                $banner->img_path = $image;
                $banner->save();
                return redirect()->route('bannerEdit',$banner->id)->with('message','Banner updated successfully!');
                // return redirect()->route('bannerEdit', ['id' => $request->input('id')]);
            }
            else{
                return redirect()->route('bannerEdit',$banner->id)->with('message','Banner size should be 1159 X 398 !');
            }
        }
        else{

            $banner->save();
            return redirect()->route('bannerList')->with('message','Banner updated successfully!');
        }
       


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $banner = Banner::where('id',$id)->first();
        $banner->status = 0;
        $banner->save();
            return redirect()->back()->with('message','Banner deleted successfully!');
        
    }
}
