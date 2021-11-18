<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryContorller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::latest()->paginate(4);
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        // form validate
        $request->validate([
            'category_name' => 'required'
        ]);
        Category::create([
            'category_name' => $request->category_name,
        ]);
        return redirect()->route('categories.index')->with('success', 'Category Data Added success');
    }
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }
    public function update(Request $request, $id)
    {
        // form validate
        $request->validate([
            'category_name' => 'required'
        ]);
        Category::find($id)->update([
            'category_name' => $request->category_name,
        ]);
        return redirect()->route('categories.index')->with('success', 'Category Data Update success');
    }
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('categories.index')->with('success', 'Category Data Delete success');
    }
}