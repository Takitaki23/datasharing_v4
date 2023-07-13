<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ImageController extends Controller
{
   public function getImages(){
        // path to public
        $path = public_path('id_image/');
       
        // get all images in path
        $imageFiles = File::files($path);
        // dd($imageFiles);
        $imageNames = [];
        foreach ($imageFiles as $imageFile) {
            $imageName = basename($imageFile);
            $imageNames[] = $imageName;
           
        }
        return response()->json($imageNames);
   }
}
