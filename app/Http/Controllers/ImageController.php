<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
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
   
   public function getSignatures(){
    // path to public
    $path = public_path('id_signatures/');
   
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
   public function handleUpload(Request $request){
        $files = $request->file('files');
        foreach ($files as $file) {
            // Get the original file name
            $filename = $file->getClientOriginalName();
            
            // Move the file to the public folder
            $file->move(public_path('id_template/'), $filename);
        }

        // Return a response indicating success
        return response()->json(['message' => 'Templates uploaded successfully']);
   }

   public function handleUploadSignature(Request $request){
        // dd($request->file('signatureImage'));
        if($request->hasFile('signatureImage')){
            $file = $request->file('signatureImage');
            // Get the original file name
            $filename = $file->getClientOriginalName();

            // Create an instance of Intervention Image
            $image = Image::make($file->getRealPath());  
             // Make the signature image transparent
            $image->opacity(100); // Set transparency to 0 (fully transparent)
             // Move the file to the public folder
             $image->save(public_path('id_signatures/').$filename);
             // Return a response indicating success
        return response()->json(['message' => 'Signature uploaded successfully']);
        }
        // Return a response indicating failure
    return response()->json(['message' => 'No signature image provided'], 400);
   }
}
