<?php

namespace App\Http\Controllers\API;

use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class AboutController extends Controller
{
    public function edit_about(){
        return About::orderBy('id','desc')->first();
    }

    public function update_about(Request $request, $id ){
        $about = About::find($id);
        $this->validate($request,[
            'name' => 'required',
            'email'=> 'required'
        ]);
        if ($about->photo != $request->photo) {
            $strpos = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo)->resize(700,500); 
            $upload_path = public_path()."/img/upload";
            $image = $upload_path.$about->photo;
            $img->save($upload_path.$name);
            if (file_exists($image)) {
                @unlink($image);
            } else {
                $name = $about->photo;
            }  
        } 

        if ($about->cv != $request->cv) {
            $strpos = strpos($request->cv, ';');
            $sub = substr($request->cv, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $namecv = time().".".$ex;
            $img = Image::make($request->cv)->resize(700,500); 
            $upload_path = public_path()."/img/upload";
            $image = $upload_path.$about->cv;
            $img->save($upload_path.$namecv);
            if (file_exists($image)) {
                @unlink($image);
            } else {
                $namecv = $about->cv;
            }  
        } 

        $about->name = $request->name;
        $about->email = $request->email;
        $about->phone = $request->phone;
        $about->address = $request->address;
        $about->description = $request->description;
        $about->taqline = $request->taqline;
        $about->photo = $name;
        $about->cv = $namecv;
        $about->save();
    }
}
