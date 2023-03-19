<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Image;

trait  HandleImageTrait
{
    protected $path = 'upload/users/';
    
    public function verify($request)
    {
        return $request->has('image');
    }
    public function saveImage($request)
    {
        if($this->verify($request)){
            // $file = $request->file('image'); 
            // $name = time().$file->getClientOriginalName();
            // $extension = $file->getClientOriginalExtension();
            // $image = Image::make($file)->resize(300,300);
            // Storage::put($this->path.$name, $image);
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save($this->path . $name);
            return $name;
        }
    }
    public function updateImage($request, $currentImage)
    {
        if($this->verify($request))
        {
            $this->deleteImage($currentImage);
            return $this->saveImage($request);
        }
        return $currentImage;
    }
    public function deleteImage($imageName)
    {
        if($imageName && file_exists($this->path.$imageName))
        {
            unlink($this->path.$imageName);
        }
    }

}


