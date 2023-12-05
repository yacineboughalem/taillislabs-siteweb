<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    //
    public function categories()
    {
        $categories = Category::with(['image'])->withCount(['products'])->get();
        return view('frontend.pages.categories',compact('categories'));
    }

    public function show_by_slug( $slug )
    {   
        $category = Category::with([ 'image' ])->where([ 'slug' => $slug ])->enabled()->firstOrFail();

        $products = Product::with([
                        'images',
                        'brand' => fn($b) => $b->enabled() ,
                        'categories' => fn($c) => $c->enabled() ,
                    ])
                    ->whereHas('categories', function($c) use ($category) {
                        return $c->where([ 'categories.id' => $category->id ]);
                    })
                    ->enabled()
                    ->inRandomOrder()
                    ->paginate(20);

        return view('frontend.pages.products.category',compact('category','products'));
    }
}
