<?php

namespace App\Http\Controllers\Admin\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\Collection;
use Session;
use DB;

class CollectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }




    public function index()
    {
        $categories = Collection::latest()->get();
        return view('admin.pages.blog.categories.index', compact('categories'));
    }

   
    public function create()
    {
        $categories = Collection::all();
        return view('admin.pages.blog.categories.create', compact('categories'));
    }



    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|unique:collections',
            'image' => 'mimes:jpeg,png,jpg'
        ]);

        // get form image
        $image = $request->file('image');
        $slug  = Str::slug($request->name);

        if(isset($image)){
          // make unique  name for image

            $currentDate  = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('collections')){

                Storage::disk('public')->makeDirectory('collections');
            }
 
            $category = Image::make($image->getRealPath());
            $category->stream();
            Storage::disk('public')->put('collections/'.$imagename, $category);

            if(!Storage::disk('public')->exists('collections/slider')){

                Storage::disk('public')->makeDirectory('collections/slider');
            }

            // resizeimage Slider 
            $slider = Image::make($image->getRealPath())->resize(500,333);
            $slider->stream();
            Storage::disk('public')->put('collections/slider/'.$imagename, $slider);

        } else {
            $imagename = "default.png";
        }

     

        $CategoriePost= new Collection();
        $CategoriePost->name=$request->name;
        $CategoriePost->type=$request->type;
        $CategoriePost->slug=Str::slug($request->name);
        $CategoriePost->image=$imagename;
        $CategoriePost->parent_id = $request->parent ? $request->parent : 0;
        $CategoriePost->save();
        
		return redirect()->route('admin.collection.index')->with(['message' => __('The action ran successfully!')]);

    }





    public function edit($id)
    {
        $category = Collection::find($id);
        $categories = Collection::all();
        return view('admin.pages.blog.categories.edit', compact('category','categories'));

    }





    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required',Rule::unique("collections")->ignore($id)],
            'image' => 'mimes:jpeg,png,jpg'
        ]);

        // get form image
        $image = $request->file('image');
        $slug  = Str::slug($request->name);

        $category = Collection::find($id);
        

        if(isset($image)){
          // make unique  name for image

            $currentDate  = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('categoriePost')){

                Storage::disk('public')->makeDirectory('categoriePost');
            }

            // delete old image
            if(Storage::disk('public')->exists('categoriePost/'.$category->image)){
                Storage::disk('public')->delete('categoriePost/'.$category->image);
            }

            // resizeimage
            $categoryname = Image::make($image->getRealPath());
            $categoryname->stream();
            Storage::disk('public')->put('categoriePost/'.$imagename, $categoryname);


            if(!Storage::disk('public')->exists('categoriePost/slider')){

                Storage::disk('public')->makeDirectory('categoriePost/slider');
            }
            // delete old image
            if(Storage::disk('public')->exists('categoriePost/slider/'.$category->image)){
                Storage::disk('public')->delete('categoriePost/slider/'.$category->image);
            }

            // resizeimage Slider
            $slider = Image::make($image->getRealPath())->resize(500,333);
            $slider->stream();
            Storage::disk('public')->put('categoriePost/slider/'.$imagename, $slider);
    
        } else {
            $imagename =$category->image;
        }


        
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->image=$imagename;
        $category->parent_id = $request->parent ? $request->parent : 0;

        $category->save();
        
		return redirect()->route('admin.collection.index')->with(['message' => __('The action ran successfully!')]);
    }







    public function destroy($id)
    {
        $category = Collection::find($id);
        if(Storage::disk('public')->exists('categoriePost/'.$category->image)){
            Storage::disk('public')->delete('categoriePost/'.$category->image);
        }

        if(Storage::disk('public')->exists('categoriePost/slider/'.$category->image)){
            Storage::disk('public')->delete('categoriePost/slider/'.$category->image);
        }

        $category->delete();
		return redirect()->route('admin.collection.index')->with(['message' => __('The action ran successfully!')]);

    }
}
