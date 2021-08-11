<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait UploadTrait{

    public function verifyAndStoreImage(Request $request, $inputname , $foldername , $disk, $imageable_id, $imageable_type) {

        if( $request->hasFile( $inputname ) ) {

            // Check img
            if (!$request->file($inputname)->isValid()) {
                flash('Invalid Image!')->error()->important();
                return redirect()->back()->withInput();
            }

            $photo = $request->file($inputname);
            $name = Str::slug($request->input('name'));
            $filename = $name. '.' . $photo->getClientOriginalExtension();


            // insert Image
            $data['filename'] = $filename;
            $data['imageable_id'] = $imageable_id;
            $data['imageable_type'] = $imageable_type;
            Image::create($data);

            return $request->file($inputname)->storeAs($foldername, $filename, $disk);

        }

        return null;

    }

    public function Delete_attachment($disk,$path,$id)
    {
        Storage::disk($disk)->delete($path);
        image::where('imageable_id',$id)->delete();
    }  
    
    
}