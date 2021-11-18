<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = Post::latest()->paginate(3);
        return view('admin.post.index', compact('posts'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }
    public function store(Request $request)
    {

        //form validate
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|max:150',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',

        ]);

        // image file
        $images = $request->file('image');
        $name_gne = hexdec(uniqid());
        $image_ext = strtolower($images->getClientOriginalExtension());
        $image_name = $name_gne . '.' . $image_ext;
        $up_location = 'dashbord/img/uplode/';
        $last_img = $up_location . $image_name;
        $images->move($up_location, $image_name);


        // data inserted 

        Post::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'user_id' => 1,
            'description' => $request->description,
            'created_at' => Carbon::now(),
            'image' => $last_img,
        ]);
        return redirect()->route('posts.index')->with('success', 'Post Data Added success');
    }

    public function edit($id)
    {
        $posts = Post::find($id);
        $categories = Category::all();
        return view('admin.post.edit', compact('posts', 'categories'));
    }

    public function update(Request $request, $id)
    {

        //form validate
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|max:150',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',

        ]);

        // image file
        $images = $request->file('image');
        $name_gne = hexdec(uniqid());
        $image_ext = strtolower($images->getClientOriginalExtension());
        $image_name = $name_gne . '.' . $image_ext;
        $up_location = 'dashbord/img/uplode/';
        $last_img = $up_location . $image_name;
        $images->move($up_location, $image_name);


        // data inserted 
        $img = Post::find($id);
        $old_img = $img->image;
        unlink($old_img);

        Post::find($id)->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'user_id' => 1,
            'description' => $request->description,
            'image' => $last_img,
        ]);
        return redirect()->route('posts.index')->with('success', 'Post Data Update success');
    }
    public function destroy($id)
    {
        $img = Post::find($id);
        $old_img = $img->image;
        unlink($old_img);
        Post::destroy($id);
        return redirect()->route('posts.index')->with('success', 'Post Data Delete success');
    }
}