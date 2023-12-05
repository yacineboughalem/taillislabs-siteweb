<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Models\Post;
use Auth;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('collections')->latest()->get();
        return view('admin.pages.blog.posts.index', compact('posts'));
    }

    public function pending()
    {
        $posts = Post::where('is_approved', false)->get();
        return view('admin.pages.blog.posts.pending', compact('posts'));
    }

    public function create()
    {
        $collections = Collection::where("type","post")->get();
        return view('admin.pages.blog.posts.create', compact('collections'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'collections' => 'sometimes|array',
        ]);

        $imageName = $this->uploadImage($request->file('image'), $request->get('title'));

        $post = Post::create([
            'admin_id' => Auth::id(),
            'title' => $request->get('title'),
            'slug' => Str::slug($request->get('title')),
            'image' => $imageName,
            'short' => $request->get('short'),
            'body' => $request->get('body'),
            'meta_title' => $request->get('meta_title') ?? null,
            'meta_slug' => Str::slug($request->get('meta_slug')) ?? null,
            'meta_description' => $request->get('meta_description') ?? null,
            'meta_keywords' => $request->get('meta_keywords') ?? null,
            'type_post' => $request->get('type_post', 'NORMAL'),
            'status' => $request->has('status') ? 1 : 0,
            'is_approved' => 1,
        ]);

        $post->collections()->attach($request->collections);

        return redirect()->route('admin.post.index')->with(['message' => __('The action ran successfully!')]);
    }

    public function enable($id)
    {
        $post = Post::findOrFail($id);
        $post->update(['status' => !$post->status]);

        return redirect('/panel/post');
    }

    public function approval($id)
    {
        $post = Post::findOrFail($id);
        $post->update(['is_approved' => !$post->is_approved]);

        return redirect()->back();
    }

    public function edit(Post $post)
    {
        $collections = Collection::where("type","post")->get();
        $selectedCollections = $post->collections->pluck('id')->toArray();

        return view('admin.pages.blog.posts.edit', compact('post', 'collections', 'selectedCollections'));
    }

  

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => ['required', 'max:191', Rule::unique("posts")->ignore($id)],
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'collections' => 'sometimes|array',
        ]);

        $post = Post::find($id);
        $imageName = $this->uploadImage($request->file('image'), $request->title, $post->image);

        $post->update([
            'admin_id' => Auth::id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => $imageName,
            'short' => $request->short,
            'body' => $request->body,
            'meta_title' => $request->meta_title ?? null,
            'meta_slug' => Str::slug($request->meta_slug) ?? null,
            'meta_description' => $request->meta_description ?? null,
            'meta_keywords' => $request->meta_keywords ?? null,
            'type_post' => $request->type_post ?? 'NORMAL',
            'status' => $request->has('status') ? 1 : 0,
        ]);

        $post->collections()->sync($request->collections);

        return redirect('/panel/post');
    }

    protected function uploadImage($image, $title, $existingImage = null)
    {
        if ($image) {
            $currentDate = now()->toDateString();
            $imageName = Str::slug($title) . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
    
            if (!Storage::disk('public')->exists('posts')) {
                Storage::disk('public')->makeDirectory('posts');
            }
    
            $img = Image::make($image->getRealPath());
            $img->stream(); // <-- Key point
            Storage::disk('public')->put('posts/' . $imageName, $img);
    
            return $imageName;
        } elseif ($existingImage) {
            return $existingImage;
        }
    
        return "default.png";
    }
    
   

    public function destroy($id)
    {
        $post = Post::find($id);

        if (Storage::disk('public')->exists('posts/' . $post->image)) {
            Storage::disk('public')->delete('posts/' . $post->image);
        }

        $post->collections()->detach();

        $post->delete();

        return redirect('/panel/post');
    }
}
