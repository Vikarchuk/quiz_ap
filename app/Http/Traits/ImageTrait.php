<?php

namespace App\Http\Traits;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


trait ImageTrait {

    public function uploadOne($request, $idImage, $modelItem)
    {
        $source = $request->file('image');
        if($source){
            if($idImage){
                $this->deleteImage($idImage);
            }
            $nameImage=$this->saveImage($source, $modelItem);
            $modelItem->image()->create(['body'=>$nameImage]);
        }
        if($request->remove){
            $this->deleteImage($idImage);
        }
    }
    private function saveImage($requestImage, $modelItem){
        $path = $requestImage->store('images/'.class_basename($modelItem).'/'.$modelItem->id.'/original', 'public');
        $path = Storage::disk('public')->path($path);
        $base = basename($path);
        $ext = $requestImage->extension();
        $img= Image::make($path)->resize($modelItem->width, $modelItem->height)->encode($ext, 100);
        Storage::disk('public')->put('images/'.class_basename($modelItem).'/'.$modelItem->id.'/thumb/'.$base, $img);
        return $base;
    }

    private function deleteImage($idImage){
        $imageDel = \App\Models\Image::find($idImage);
        $modelName = class_basename($imageDel->imageable);
        Storage::disk('public')->delete('images/'.$modelName.'/'.$imageDel->imageable_id.'/original/' . $imageDel->body);
        Storage::disk('public')->delete('images/'.$modelName.'/'.$imageDel->imageable_id.'/thumb/' . $imageDel->body);
        $imageDel->delete();
    }
}
