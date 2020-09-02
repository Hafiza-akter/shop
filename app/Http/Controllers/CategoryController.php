<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Category;

class CategoryController extends Controller
{
    public function index(){
        // dd('ghfyt');
        $category = Category::Where('status',1)
                            ->orderBy('id','DESC')->paginate(5);
        return view('category/list',compact('category'));
    }
    public function create(){
        return view('category/create');
    }
    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'image' => 'required|image'


        ]);
        $name = $request->input('name');
        $status = $request->input('status');
        $image = 'demothumb.png';
        $num = rand(1,100);
        if ($request->hasFile('image')){
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
                    return redirect()->route('categoryCreate')->with('message','Category size should be 338 X 399 !');

                }
        }


        $category = new Category();
        $category->name = $name;
        $category->status = $status;
        $category->img_path = $image;
        $category->save();
        return redirect()->route('categoryCreate')->with('message','Category created successfully!');




    }
    public function edit($id){
        $category = Category::where('id',$id)->first();
        return view('category/edit',compact('category'));
    }
    public function update(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        $id = $request->input('id');
        $name = $request->input('name');
        $status = $request->input('status');
        $category = Category::where('id',$id)->first();
        $category->name = $name;
        $num = rand(1,100);
        $category->status = $status;
        if($request->hasFile('image')){
            // $file = $request->file('image');
            // $file->move(public_path().'/images', $name.'_cat'.'.'.$file->getClientOriginalExtension());

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
                return redirect()->route('categoryEdit',$id)->with('message','Category banner size should be 338 X 399 !');

            }
            $category->img_path = $image;
        }
        $category->save();
        return redirect()->back()->with('message','Successfully Updated!');
    
        
    }
    public function delete($id){
        $category = Category::where('id',$id)->first();
        $category->status = 0;
        $category->save();
            return redirect()->back()->with('message','Category deleted successfully!');
        
    }
    
}
