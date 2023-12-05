<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use DB;

class BannerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');

        $this->dir_images     = '/app/public/banners/';

        // check if directory exixt or make it
        if( !is_dir( storage_path().$this->dir_images ) ){
            @mkdir( storage_path().$this->dir_images , 0777 );
        }
    }



    public function index()
    {
        $banners = Banner::all();
        return view('admin.pages.banner.index', compact('banners'));
    }



    public function create()
    {
        return view('admin.pages.banner.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'max:191|unique:banners',
            'subtitle' => 'max:255',
            'photo' => 'required|image|mimes:jpeg,jpg,png,webp',
        ]);


        $photo = $request->file('photo');
        if (isset($photo)) {
            if (!Storage::disk('public')->exists('banners')) {
                Storage::disk('public')->makeDirectory('banners');
            }
            $currentDate = Carbon::now()->toDateString();
            $photoName = $currentDate . '-' . uniqid() . '.' . $photo->getClientOriginalExtension();

            $img = Image::make($photo->getRealPath());
            $img->stream(); // <-- Key point
            Storage::disk('local')->put('public/banners/' . $photoName, $img);
        } else {
            $photoName = "default.png";
        }
        //dd($photoName);

        //new categorie
        $banner = new Banner();
        $banner->title = $request->title ? $request->title : "";
        $banner->subtitle = $request->subtitle ? $request->subtitle : "";
        $banner->name = $request->name ? $request->name : "weiterlesen";
        $banner->link = $request->link ? $request->link : "/about";
        // $banner->type_btn = $request->type_btn;
        // $banner->color = $request->color ? $request->color : "";
        // $banner->type_banner = $request->type_banner ? $request->type_banner : "All";
        $banner->photo = $photoName;
        $banner->save();
        return redirect()->route('admin.banner.index')->with( ['message' => __('The action run successfully!') ] );

    }





    public function edit($id)
    {
        $banners = Banner::find($id);
        return view('admin.pages.banner.edit', compact('banners'));
    }

    



    public function update(Request $request, $id)
    {
        //validation
        $this->validate($request, [
            // 'title' => ['required','max:191'],
            // 'subtitle' => 'required', 'max:191',
            'photo' => 'image|mimes:jpeg,jpg,png,webp',
        ]);


        $banner = Banner::find($id);

        //upload new  images
        $photo = $request->file('photo');
        //upload image
        if (isset($photo)) {

            $currentDate = Carbon::now()->toDateString();
            $photoName = $currentDate . '-' . uniqid() . '.' . $photo->getClientOriginalExtension();

            //cree new folder si not existe
            if (!Storage::disk('public')->exists('banners')) {
                Storage::disk('public')->makeDirectory('banners');
            }

            // delete old image
            if (Storage::disk('public')->exists('banners/' . $banner->photo)) {
                Storage::disk('public')->delete('banners/' . $banner->photo);
            }

            $img = Image::make($photo->getRealPath());
            $img->stream();// <-- Key point

            Storage::disk('local')->put('public/banners/' . $photoName, $img);

            $banner->photo = $photoName;
        }

        //update banner
        $banner->title = $request->title ? $request->title : "";
        $banner->subtitle = $request->subtitle ? $request->subtitle : "";
        $banner->name = $request->name ? $request->name : "weiterlesen";
        $banner->link = $request->link ? $request->link : "/about";
        // $banner->type_btn = $request->type_btn;
        // $banner->color = $request->color ? $request->color : "";
        // $banner->type_banner = $request->type_banner ? $request->type_banner : "All";
        $banner->save();

        return redirect('/panel/banner');
    }

   

    public function destroy($id)
    {
        $banner = Banner::find($id);

        //delete images
                  
    //    if(Storage::disk('public')->exists('banners/'.$banner->photo)){
    //           Storage::disk('public')->delete('banners/'.$banner->photo);    }
           
    //        $banner->delete();
  
    //       Session::flash('msg', 'Votre delete a été bien passer'); 
        
    //     $banners = Banner::all();
    //     return view('panel.pages.banner.index', compact('banners'));


        File::delete( storage_path( $this->dir_images.$banner->photo ) );
        $banner->delete();
        $banners = Banner::all();
        return redirect()->route('admin.banner.index')->with( ['message' => __('The action run successfully!') ] );
        // return view('panel.pages.banner.index', compact('banners'));
    }




    public function enable($id) {

        $banners = DB::table('banners')->where('id',$id)->get();
        foreach ($banners as $banner) 
        {
            if ($banner->status==1) 
            {
                DB::table('banners')
                                    ->where('id', $id)
                                    ->update(['status' => 0]);

                                    Session::flash('success','Banner invisible');
            }
            else
            {
                 DB::table('banners')
                                    ->where('id', $id)
                                    ->update(['status' => 1]);
                                    Session::flash('success','Banner visible');
            }
        }
            
            return redirect('/panel/banner');
    }

}
