<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as ImageMaker;
use App\Models\Image;
use App\Models\Admin;


class AdminController extends Controller
{
    private $dir_images     ;
    private $dir_thumbnails ;

    public function __construct(Request $request)
    {
        //$this->middleware('admin_super')->except(['edit','update']);

        $this->dir_images     = '/app/public/images/';
        $this->dir_thumbnails = '/app/public/images/thumbnails/';

        // check if directory exixt or make it
        if( !is_dir( storage_path().$this->dir_images ) ){
            @mkdir( storage_path().$this->dir_images , 0777 );
        }
        if( !is_dir( storage_path().$this->dir_thumbnails ) ){
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
        $admins = Admin::paginate(20);
        return view('admin.pages.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            "name"      => "sometimes",
            "email"     => "required|unique:admins",
            "phone"     => "sometimes",
            "password"  => "required",
            "is_super"  => "sometimes",
            "is_active" => "sometimes",
        ]);

        $validated['is_super']   = $request->get('is_super') ? 1 : 0 ;
        $validated['is_active']  = $request->get('is_active') ? 1 : 0 ;
        $validated['password']   = Hash::make( $request->get('password') );

        $admin = Admin::create($validated);

        if( $request->hasFile('image') ){

            $image     = $request->file('image');
            $imageName = Str::random(5).'_img_'.$image->getClientOriginalName();

            $imageMaker = ImageMaker::make( $image );
            // upload original size
            $imageMaker->save( storage_path( $this->dir_images.$imageName )  );
            // upload the small image
            $imageMaker->fit(300,300)
                ->save( storage_path( $this->dir_thumbnails.$imageName )  );
            
            $admin->image()->create([
                "name" => $imageName
            ]);
        }

        $admin->save();

        return redirect()->route('admin.admin.index')->with( ['message' => __('The action ran successfully!') ] );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
        return view('admin.pages.admin.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
        $validated = $request->validate([
            "name"      => "sometimes",
            "email"     => "required" . ( $request->get("email") !== $admin->email ? "|unique:admins" : null ),
            "phone"     => "sometimes",
            "password"  => "sometimes",
            "is_super"  => "sometimes",
            "is_active" => "sometimes",
        ]);

        $validated['is_super']   = $request->get('is_super') ? 1 : 0 ;
        $validated['is_active']  = $request->get('is_active') ? 1 : 0 ;
        
        if( $request->has('password') ){
            $validated['password'] = Hash::make( $request->get('password') );
        }
        $admin->update( $validated );

        if( $request->hasFile('image') ){

            if( $admin->image ){
                $admin->image->delete();
            }

            $image     = $request->file('image');
            $imageName = Str::random(5).'_img_'.$image->getClientOriginalName();

            $imageMaker = ImageMaker::make( $image );
           
            // upload original size
            $imageMaker->save( storage_path( $this->dir_images.$imageName )  );
            // upload the small image
            $imageMaker->fit(300,300)
                ->save( storage_path( $this->dir_thumbnails.$imageName )  );
            
            $admin->image()->create([
                "name" => $imageName
            ]);
        }

        return redirect()->route('admin.admin.index')->with( ['message' => __('The action ran successfully!') ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        if( $admin->image ){
            $admin->image()->delete();
        }

        $admin->delete();
        return redirect()->route('admin.admin.index')->with( ['message' => __('The action ran successfully!') ] );
    }
}
