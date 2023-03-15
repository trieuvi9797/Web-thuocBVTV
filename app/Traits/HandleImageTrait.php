<?php
namespace App\Traits;

use Image;

trait  HandleImageTrait
{
    protected $path = 'upload/users/';
    
    public function veryfy($request)
    {
        return $request->has('image');
    }
    public function saveImage($request)
    {
        if($this->veryfy($request)){
            // $file = $request->file('image'); 
            // $name = time().$file->getClientOriginalName();
            // $extension = $file->getClientOriginaExtension();
            // $image = Image::make($file)->resize(300,300);
            // Strorage::put($this->path.$name, $image);
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save($this->path . $name);
            return $name;
        }
    }
    public function updateImage($request, $currentImage)
    {
        if($this->veryfy($request))
        {
            $this->deleteImage($currentImage);
            return $this->saveImage($request);
        }
        return $currentImage;
    }
    public function deleteImage($imageName)
    {
        if(file_exists($this->path.$imageName))
        {
            unlink($this->path.$imageName);
        }
    }

}


