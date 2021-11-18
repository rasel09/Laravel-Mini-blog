<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    // ------------------------------------- home frontend show -------------------------
    public function index()
    {
        $categories = Category::all();
        $posts = Post::latest()->paginate(9);
        $sliders = Slider::all();
        return view('welcome', compact('categories', 'posts', 'sliders'));
    }
    // ------------------------------------------ single post ------------------------------
    public function singlePost($id)
    {

        $posts = Post::with('category')->find($id);
        $relatedPosts = Post::where('category_id', $posts->category_id)->limit(3)->get();
        // $posts = Post::find($id);
        $categories = Category::all();
        return view('layouts.view', compact('posts', 'categories', 'relatedPosts'));
    }

    // ------------------------------------------- category post ----------------------------------
    public function categoryPost($id)
    {
        $categories = Category::with('posts')->find($id);
        return view('layouts.category_post', compact('categories'));
    }

    // ------------------------------ search post -------------------------------

    public function search(Request $request)
    {
        $search = $request->search;
        $posts = Post::where('title', 'LIKE', "%$search%")->get();
        return view('layouts.search', compact('posts'));
    }
}