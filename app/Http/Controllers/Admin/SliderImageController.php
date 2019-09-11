<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Http\Controllers\Controller;
use App\Models\SliderImage;
use Illuminate\Http\Request;
use Image;
use File;

class SliderImageController extends Controller
{
    public function __construct()
    {
        AdminHelper::middleware($this);
    }

    public function sliderImages()
    {
        $sliderImages = SliderImage::orderBy('created_at','desc')->get();
        return view('admin.slider_images', compact('sliderImages'));
    }

    public function addSliderImageView()
    {
        return view('admin.add_slider_image');
    }

    public function addSliderImage(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image'
        ]);

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imageName = rand() . '.' . $img->getClientOriginalExtension();
            Image::make($request->file('image'))->resize(1200, 675)->save('slider_images/' . $imageName);
        }
        $sliderImage = new SliderImage();
        $sliderImage->image = $imageName;
        $sliderImage->save();
        return back()->with('success', 'Slider Image created successful.');
    }

    public function deleteSliderImage($id)
    {
        $sliderImage = SliderImage::findOrFail($id);
        if (File::exists('slider_images/' . $sliderImage->image)) {
            File::delete('slider_images/' . $sliderImage->image);
        }
        $sliderImage->delete();
        return back()->with('success', 'Slider Image deleted successful.');
    }
}
