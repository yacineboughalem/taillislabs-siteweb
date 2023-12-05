<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\Image as ImageModel;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    private $dir_images     ;
    private $dir_thumbnails ;

    public function __construct() {
        $this->dir_images     = '/app/public/images/';
        $this->dir_thumbnails = '/app/public/images/thumbnails/';

        // check if directory exixt or make it
        if( !is_dir( storage_path().$this->dir_images ) && !is_dir( storage_path().$this->dir_thumbnails ) ){
            @mkdir( storage_path().$this->dir_images , 0777 );
            @mkdir( storage_path().$this->dir_thumbnails , 0777 );
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $images = ImageModel::all();
        return response($images);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'prefix' => 'sometimes',
        ]);
        $file  = $request->file('image');
        // make image upload to storage
        $generatedStr  = Str::random(20);
        $imageName     = pathinfo( $file->getClientOriginalName() , PATHINFO_FILENAME).'.webp';
        $fullImageName = ( $request->prefix ? Str::slug($request->prefix,'-').'_' : null ).$generatedStr."_".$imageName;
        // uploading with resizing
        
        $imageMaker = Image::make( $file );

            // upload default size
            $design = DB::table('setting_design')->first();

            // upload the origin image as a small version
            $smallThumbImage = Image::make( $file );
            $smallThumbImage->fit(300,300)
                ->encode('webp', 100)
                ->save( storage_path( $this->dir_thumbnails.$fullImageName )  );


            // push watermark to image if its enabled
            if( $design->watermark_status == 'ENABLE' ){
                $posittions = [ 'tl' => 'top-left', 'tr' => 'top-right', 'bl' => 'bottom-left', 'br' => 'bottom-right', 'c' => 'center'];
                $calcsize   = ceil( $imageMaker->height() / 3 ) ;
                $calcMargin = ceil( $imageMaker->height() / 20 ) ;

                if( $design->watermark_type == 'image' ){
                    // set watermark from image
                    $imageBase = ImageModel::find( $design->watermark_image );
                    $watermark = Image::make( storage_path( $this->dir_images.$imageBase->name ) );
                    $watermark->resize( $calcsize , $calcsize, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $imageMaker->insert($watermark, $posittions[ $design->watermark_position ] , $calcMargin , $calcMargin );
                }



            }
            // save image uploaded
            $imageMaker
                ->encode('webp', 100)
                ->save( storage_path( $this->dir_images.$fullImageName )  );


        $image = ImageModel::create([ "name" => $fullImageName ]);
        $image->save();
        
        return response( $image );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageModel  $image
     * @return \Illuminate\Http\Response
     */
    public function show(ImageModel $image)
    {
        //
        return response($image);
    }
    public function getImageFile(ImageModel $image , $type = 'image' )
    {
        switch ($type) {
            case 'image': $path = public_path().'/storage/images/'.$image->name; break;
            case 'thumbnail': $path = public_path().'/storage/images/thumbnails/'.$image->name; break;
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = \Response::stream(function() use($file) {
            echo $file;
        }, 200, ["Content-Type"=> $type]);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageModel  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageModel $image)
    {
        //
        $image->delete();

        $imageFiles = [
            storage_path().$this->dir_images.$image->name ,
            storage_path().$this->dir_thumbnails.$image->name ,
        ];

        File::delete($imageFiles);

        return response(['message'=>'image has been successfully removed']);

    }
}
