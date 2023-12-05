<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\Image as ImageModel;

class UploadController extends Controller
{
    private $dir_images     ;

    public function __construct() {
        $this->dir_images     = '/app/public/images/';

        // check if directory exixt or make it
        if( !is_dir( storage_path().$this->dir_images ) ){
            @mkdir( storage_path().$this->dir_images , 0777 );
        }
    }

    //
    public function image(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png,webp|max:2048'
        ]);
        $file  = $request->file('file');
        // make image upload to storage
        $generatedStr  = Str::random(20);
        $imageName     = $file->getClientOriginalName();
        $fullImageName = $generatedStr."_".$imageName;
        // uploading with resizing
        $imageMaker = Image::make( $file );
            // upload the large image
            $imageMaker->save( storage_path( $this->dir_images.$fullImageName )  );

        $image = ImageModel::create([ "name" => $fullImageName ]);
        $image->save();

        return response( $image );
    }

    public function destroyImage(ImageModel $image)
    {
        $image->delete();

        $imageFiles = [
            storage_path().$this->dir_images.$image->name
        ];

        File::delete($imageFiles);

        return response(['message'=>'image has been successfully removed']);

    }
}
