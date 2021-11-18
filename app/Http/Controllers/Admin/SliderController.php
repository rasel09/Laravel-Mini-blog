<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }
    public function create()
    {
        return view('admin.slider.create');
    }
    public function store(Request $request)
    {
        //form validate
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif',

        ]);

        // image file
        $images = $request->file('image');
        $name_gne = hexdec(uniqid());
        $image_ext = strtolower($images->getClientOriginalExtension());
        $image_name = $name_gne . '.' . $image_ext;
        $up_location = 'dashbord/img/uplode/slider/';
        $last_img = $up_location . $image_name;
        $images->move($up_location, $image_name);

        Slider::create([
            'image' => $last_img,
        ]);
        return redirect()->route('slider.index')->with('success', 'Slider Image uplode Success');
    }
    public function edit($id)
    {
        $sliders = Slider::find($id);
        return view('admin.slider.edit', compact('sliders'));
    }
    public function update(Request $request, $id)
    {
        //form validate
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif',

        ]);

        // image file
        $images = $request->file('image');
        $name_gne = hexdec(uniqid());
        $image_ext = strtolower($images->getClientOriginalExtension());
        $image_name = $name_gne . '.' . $image_ext;
        $up_location = 'dashbord/img/uplode/slider/';
        $last_img = $up_location . $image_name;
        $images->move($up_location, $image_name);

        $img = Slider::find($id);
        $old_img = $img->image;
        unlink($old_img);

        Slider::find($id)->update([
            'image' => $last_img,
        ]);
        return redirect()->route('slider.index')->with('success', 'Slider Image update Success');
    }
    public function destroy($id)
    {
        $img = Slider::find($id);
        $old_img = $img->image;
        unlink($old_img);
        Slider::destroy($id);
        return redirect()->route('slider.index')->with('success', 'Slider Image Delete Success');
    }
}