<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Product;
use App\model\Supplier;
use App\model\Category;
use App\model\ProductImage;
use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\ImageManagerStatic as Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productList = Product::Where('status',1)
                        ->orderBy('id','DESC')
                        ->paginate(5);
        return view('product/list',compact('productList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplierList = Supplier::where('status',1)->get();
        $categoryList = Category::where('status',1)->get();
        return view('product/create',compact('supplierList','categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        $validation = $request->validate([
            'name' => 'required',
            'sku' => 'required',
            'sell_price' => 'required',
            'buy_price' => 'required',
            'quantity' => 'required',
            'category' => 'required',
            'image' => 'required',
            'desc' => 'required',


        ]);
      
        
        $product = new Product();
        $product->name = $request->input('name');
        $product->desc = $request->input('desc');
        $product->sku = $request->input('sku');
        $product->sell_price = $request->input('sell_price');
        $product->buy_price = $request->input('buy_price');
        $product->quantity = $request->input('quantity');
        $product->supplier = $request->input('supplier_id');
        $product->brand = $request->input('brand');
        $product->return_policy = $request->input('return_policy');
        $product->warranty = $request->input('warranty');
        $product->categoty_id  = $request->input('category');
        $product->status = $request->input('status');
        if($request->input('featured')){
            $product->is_feature = 1;
        }
        if($request->input('is_sale')){
            $product->is_sale = 1;
            $product->discount_percentage = $request->input('discount_percentage');
        }
        $product->save();
        $productId = $product->id;
        if($request->hasFile('image')){
            // $filename = $this->generateUid(5).$this->generateUid(5);
            // $file = $request->file('image');
            // $file->move(public_path().'/images/products', $filename.'_pro'.'.'.$file->getClientOriginalExtension());
            // $img_path = $filename.'_pro'.'.'.$file->getClientOriginalExtension();
            // $image = new ProductImage();
            // $image->img_path = $img_path;
            // $image->status = 1;
            // $image->product_id  = $productId;
            // $image->save();
            // -------------------------
            // --------------------------------------

            $image = $request->file('image');
            $data = getimagesize($image);
            $w = $data[0];
            $h = $data[1];
            $requiredSize = 480;
            $aspectRatio = $w/$h;
            // dd($aspectRatio);
            if($aspectRatio >= 1.0){
                $newWidth = $requiredSize;
                $newHeight = $requiredSize / $aspectRatio;
                // dd($newWidth.'__'.$newHeight);
            }
            else{
                $newWidth = $requiredSize * $aspectRatio;
                $newHeight = $requiredSize;
                // dd($newWidth.'__'.$newHeight);

            }

            $imageName = $image->getClientOriginalName();
            $fileName = $this->generateUid(10).$this->generateUid(10);
            $directory = public_path().'/images/products/';
            $imageUrl = $directory.$fileName.'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize($newWidth, $newHeight)->save($imageUrl);
            $img = new ProductImage();
            $img->img_path = $fileName.'.'.$image->getClientOriginalExtension();
            $img->status = 1;
            $img->product_id  = $productId;
            $img->save();
        }
        return redirect()->back()->with('message','Product add successfully!');

    }
    function generateUid($length){
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';

        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
        return $string;
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
        $supplierList = Supplier::where('status',1)->get();
        $categoryList = Category::where('status',1)->get();
        $product = Product::Where('id',$id)->first();
        // dd($product);
        return view('product/edit',compact('product','supplierList','categoryList'));
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
        $validation = $request->validate([
            'name' => 'required',
            'sku' => 'required',
            'sell_price' => 'required',
            'buy_price' => 'required',
            'quantity' => 'required',
            'category' => 'required',
            'desc' => 'required',

            // 'image' => 'required',

        ]);
        // dd($request);
        $product = Product::Where('id',$request->input('id'))->first();
        $productId = $request->input('id');
        $product->name = $request->input('name');
        $product->desc = $request->input('desc');
        $product->sku = $request->input('sku');
        $product->sell_price = $request->input('sell_price');
        $product->buy_price = $request->input('buy_price');
        $product->quantity = $request->input('quantity');
        $product->supplier = $request->input('supplier_id');
        $product->brand = $request->input('brand');
        $product->return_policy = $request->input('return_policy');
        $product->warranty = $request->input('warranty');
        $product->categoty_id  = $request->input('category');
        $product->status = $request->input('status');
        
        if($request->input('featured')){
            $product->is_feature = 1;
        }
        else{
            $product->is_feature = 0;
        }
        if($request->input('is_sale')){
            $product->is_sale = 1;
            $product->discount_percentage = $request->input('discount_percentage');
        }
        else{
            $product->is_sale = 0;
            $product->discount_percentage = 0;
        }
        if($request->hasFile('image')){
            // $file = $request->file('image');
            // $filename = $this->generateUid(5).$this->generateUid(5);
            // $file->move(public_path().'/images/products',$filename.'_pro'.'.'.$file->getClientOriginalExtension());
            // $path = $filename.'_pro'.'.'.$file->getClientOriginalExtension();
            // $image = ProductImage::where('product_id',$product->id)->first();
            // $imgfullPath = public_path().'/images/products/'.$image->img_path; 
            // unlink($imgfullPath);           
            // $image->img_path = $path;
            // $image->save();

            $image = $request->file('image');
            $data = getimagesize($image);
            $w = $data[0];
            $h = $data[1];
            $requiredSize = 480;
            $aspectRatio = $w/$h;
            // dd($aspectRatio);
            if($aspectRatio >= 1.0){
                $newWidth = $requiredSize;
                $newHeight = $requiredSize / $aspectRatio;
                // dd($newWidth.'__'.$newHeight);
            }
            else{
                $newWidth = $requiredSize * $aspectRatio;
                $newHeight = $requiredSize;
                // dd($newWidth.'__'.$newHeight);

            }

            $imageName = $image->getClientOriginalName();
            $fileName = $this->generateUid(10).$this->generateUid(10);
            $directory = public_path().'/images/products/';
            $imageUrl = $directory.$fileName.'.'.$image->getClientOriginalExtension();
            // unlink($imageUrl);
            Image::make($image)->resize($newWidth, $newHeight)->save($imageUrl);
            $img = ProductImage::where('product_id',$productId)->first();
            $oldimg = $img->img_path;
            $oldimgFullPath = $directory.$oldimg;
            // dd($oldimgFullPath);
            unlink($oldimgFullPath);
            $img->img_path = $fileName.'.'.$image->getClientOriginalExtension();
            $img->status = 1;
            $img->product_id  = $productId;
            $img->save();
        }
        $product->save();
       
        return redirect()->back()->with('message','Product edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::Where('id',$id)->first();
        $product->status = 0;
        $product->save();
        return redirect()->route('productList')->with('message','Product Deleted Successfully!');
    }
}
