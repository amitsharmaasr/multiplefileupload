<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function uploadPhoto()
    {
        return view('upload_form');
    }

    public function uploadSubmit(Request $request)
    {
        foreach ($request->photos as $photo) {
            $filename = $photo->store('photos');
            Photo::create([
                'filename' => $filename
            ]);
        }
	$photo = Photo::all();
        return view('view_form', compact('photo'));
        //return 'Upload successful!';
    }

    public function deletePhoto(Request $request){
	$photos = Photo::find($request->id);
	if($photos->delete()){
		        $photo = Photo::all();
		        return view('view_form', compact('photo'));

	}
    }   

    public function view(){
	$photo = Photo::all();
	return view('view_form', compact('photo'));
    } 
}
