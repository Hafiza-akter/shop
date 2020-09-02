<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\SubCategory;
use App\model\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scategory = SubCategory::Where('status',1)
                            ->orderBy('id','DESC')->paginate(5);
        return view('subCategory/list',compact('scategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::Where('status',1)->get();
        return view('subCategory/create',compact('category'));
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
            'name' => 'required',
            'status' => 'required',
            'image' => 'required|image',
            'category' => 'required'


        ]);
        $name = $request->input('name');
        $status = $request->input('status');
        $category = $request->input('category');
        $image = 'demothumb.png';
        $num = rand(1,100);
        if ($request->hasFile('image')){
            // $file = $request->file('image');
            // // dd($file);
            // $file->move(public_path().'/images', $name.'_'.$num.''.'.'.$file->getClientOriginalExtension());
            // $image = $name.'_'.$num.''.'.'.$file->getClientOriginalExtension();



                $data = getimagesize($request->file('image'));
                $w = $data[0];
                $h = $data[1];
                if($w == 338 && $h ==399){
                    if ($request->hasFile('image')){
                        $file = $request->file('image');
                        // dd($file);
                        $file->move(public_path().'/images', $name.'_'.$num.''.'.'.$file->getClientOriginalExtension());
                        $image = $name.'_'.$num.''.'.'.$file->getClientOriginalExtension();
                    }
                }
                else{
                    return redirect()->route('subCategoryCreate')->with('message','Sub Category banner size should be 338 X 399 !');

                }
        }


        $subCategory = new SubCategory();
        $subCategory->name = $name;
        $subCategory->status = $status;
        $subCategory->category_id = $category;
        $subCategory->img_path = $image;
        $subCategory->save();
        return redirect()->route('subCategoryList')->with('message','Sub Category added successfully!');



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
        $subCategory = SubCategory::where('id',$id)->first();
        $category = Category::Where('status',1)->get();
        return view('subCategory/edit',compact('subCategory','category'));
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
            'status' => 'required',
            'category' => 'required'


        ]);
        $name = $request->input('name');
        $status = $request->input('status');
        $category = $request->input('category');
        $id = $request->input('id');
        $image = 'demothumb.png';
        $num = rand(1,100);
        $subCategory =  SubCategory::where('id',$id)->first();
        if ($request->hasFile('image')){
            // $file = $request->file('image');
            // // dd($file);
            // $file->move(public_path().'/images', $name.'_'.$num.''.'.'.$file->getClientOriginalExtension());
            // $image = $name.'_'.$num.''.'.'.$file->getClientOriginalExtension();



                $data = getimagesize($request->file('image'));
                $w = $data[0];
                $h = $data[1];
                if($w == 338 && $h ==399){
                    if ($request->hasFile('image')){
                        $file = $request->file('image');
                        // dd($file);
                        $file->move(public_path().'/images', $name.'_'.$num.''.'.'.$file->getClientOriginalExtension());
                        $image = $name.'_'.$num.''.'.'.$file->getClientOriginalExtension();
                        $subCategory->img_path = $image;
                    }
                }
                else{
                    return redirect()->route('subCategoryEdit',$id)->with('message','Sub Category banner size should be 338 X 399 !');

                }
        }


        
        $subCategory->name = $name;
        $subCategory->status = $status;
        $subCategory->category_id = $category;
        $subCategory->save();
        return redirect()->route('subCategoryList')->with('message','Sub Category edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $subCategory = SubCategory::where('id',$id)->first();
        $subCategory->status = 0;
        $subCategory->save();
            return redirect()->back()->with('message','Sub Category deleted successfully!');
    }
}
