<?php
// http://www.expertphp.in/article/php-laravel-5-intervention-image-upload-and-resize-tutorial
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Image;

class FileController extends Controller
{
    public function getResizeImage()
    {
        return view('resizeimage');
    }
    public function postResizeImage(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $photo = $request->file('photo');
        $imagename = time().'.'.$photo->getClientOriginalExtension(); 
   
   		// To create thumbnail
        $destinationPath = public_path('/uploads/thumbnail_images');
        $thumb_img = Image::make($photo->getRealPath());
        
        // $thumb_img->resize(100, 100);	// To create thumbnail
        $thumb_img->encode('jpg', 75); 		// To compress image

        $thumb_img->save($destinationPath.'/'.$imagename, 30);		// here second parameter is image compression quality

        // To upload the original image
        $destinationPath = public_path('/uploads/normal_images');
        $photo->move($destinationPath, $imagename);
        return back()
            ->with('success','Image Upload successful')
            ->with('imagename',$imagename);
    }
}