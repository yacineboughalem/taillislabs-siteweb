<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Post;
use Toastr;

class BlogController extends Controller
{

   public function blog(Request $request)
   {
      $posts = Post::latest()->approved()->published()->paginate(6);
      $categories = Collection::all();
      $this->vider_session($request);
      return view('frontend.pages.blog.index', compact('posts', 'categories'));
   }




   // public function postByCategory($slug)
   // {
   //    $category = Collection::with(['posts'])->where('slug', $slug)->first();

   //    $posts = Post::where([
   //       ['status', true],
   //       ['slug', $category]
   //    ])
   //       ->orderBy('id', 'DESC')
   //       ->get();

   //    $categories = Collection::with(['posts'])->get();

   //    return view('frontend.pages.works.category', compact('category', 'works', 'categories'));
   // }


   // public function postByCategory($slug)
   // {
   //    $category = Collection::where('slug', $slug)->first();

   //    $posts = Post::where([
   //       ['status', true],
   //       ['slug', $category]
   //    ])
   //       ->orderBy('id', 'DESC')
   //       ->get();

   //    $categories = Collection::get();

   //    return view('frontend.pages.blog.category', compact('category', 'posts', 'categories'));
   // }


   public function postByCategory( $slug )
   {   
       $category = Collection::where([ 'slug' => $slug ])->enabled()->firstOrFail();

       $posts = Post::with([
                       'collections' => fn($c) => $c->enabled()
                   ])
                   ->whereHas('collections', function($c) use ($category) {
                       return $c->where([ 'collections.id' => $category->id ]);
                   })
                   ->enabled()
                   ->paginate(20);
     

       return view('frontend.pages.blog.category',compact('category','posts'));
   }


   public function showBlog($slug)
   {
      $categories = Collection::all();
      // $post = Post::findOrFail($blog_id);
      $post = Post::where(['slug' => $slug])->firstOrFail();;

      $postsFeatured = Post::where('type_post', 'FEATURED')->get();
      $postsLatest = Post::where('type_post', 'LATEST')->paginate(5);

      return view('frontend.pages.blog.single', compact('post', 'categories', 'postsFeatured', 'postsLatest'));
   }





   public function vider_session($request)
   {
      $request->session()->put('search', '');
   }


   public function categorieBlog(Request $request, $categorie_id, $slug)
   {
      $posts = Collection::findOrFail($categorie_id)->posts()->paginate(4);
      $categories = Collection::all();

      $this->vider_session($request);


      return view('frontend.pages.blog.index', compact('posts', 'categories'));
   }

   // public function postByCategory($slug)
   // {
   //    //  $category = Collection::where('slug',$slug)->first();
   //    //  $posts = $category->posts()->get();

   //     $category = Collection::where('slug',$slug)->first();
   //     $posts = $category->posts()->get();
   //    //  $posts = $category->posts()->get();
   //    $categories = Collection::all();

   //     return view('frontend.pages.blog.category',compact('category','posts','categories'));
   // }


}
