<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use CURLFILE;

class TestController extends Controller
{
    public function index(){
        $url = 'https://kakashi.cyberblaze.tech/category';
        $catlist =  $this->sendRequest($url);
        return view('testlist',compact('catlist'));

    }
    public function catimg($id){
        $url = 'https://kakashi.cyberblaze.tech/imagesbycat/'.$id;
        $imgList = $this->sendRequest($url);
        return view('testDetails',compact('imgList'));
    }
    public function createprofile(){
        return view('testProfileCreate');
    }
    public function storeprofile(Request $request){
        // dd($request);
        $name = $request->input('fname').' '.$request->input('lname');
        $email = $request->input('email');
        $address = $request->input('address');
        $phone = $request->input('phone');
        // $cfile = curl_file_create('resource/test.png','image/png','testpic'); 
        if($request->hasFile('image')){
            $cfile = $request->file('image');
            $fileName = "asd.jpg";
            $path = $request->file('image')->move(public_path().'/images', $fileName);
            // $photo = $this->makeCurlFile($cfile,$fileName);
            // dd($photo);

            // dd($cfile->name);
            // dd(public_path().'/images', $fileName);
            $cFile = curl_file_create('/images/asd.jpg');
        }
        // dd($cfile);
        $ch = curl_init();
        $post = [
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'phone' => $phone,
            'image' => $cfile      
          ];
        // dd($post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, 'https://kakashi.cyberblaze.tech/profile/create');
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response);
        dd($result);
        if($result->status == 1){
            return redirect()->back()->with('message','successfully created!');
        }
        else{
            return redirect()->back()->with('message','Failed!');

        }

        

    }
    function makeCurlFile($file,$fileName){
        $mime = mime_content_type($fileName);
        $info = pathinfo($file);
        $name = $info['basename'];
        $output = new CURLFile($file, $mime, $name);
        return $output;
        }
    public function sendRequest($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }
}

