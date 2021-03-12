<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Session;

class PhotoController extends Controller
{
    public function uploadPhoto()
    {
        return view('upload_form');
    }

    public function uploadSubmit(Request $request)
    {
        $allowedType = ['image/png', 'image/jpg', 'image/jpeg'];
        foreach ($request->photos as $photo) {
            if(in_array($photo->getMimeType(), $allowedType)){  
                $filename = $photo->store('photos');
                Photo::create([
                    'filename' => $filename
                ]);
            }
        }
        Session::flash('message', 'Image Uploaded Successfully'); 
        return redirect('gallery');

    }

    public function deletePhoto(Request $request){
	$photos = Photo::find($request->id);
	if($photos->delete()){
                Session::flash('message', 'Image Deleted Successfully'); 
	}else{
                Session::flash('message', 'Image Deleted Unsuccessfully'); 
    }
    return redirect('gallery');
    }   

    public function view(){
        $photo = Photo::all();
	    return view('view_form', compact('photo'));
    } 
}
