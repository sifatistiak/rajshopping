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
        $sliderImages = SliderImage::orderBy('type', 'desc')->get();
        return view('admin.slider_images', compact('sliderImages'));
    }

    public function addSliderImageView()
    {
        return view('admin.add_slider_image');
    }

    //both slider image and collection image
    public function addSliderImage(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|string',
            'image' => 'required|image'
        ]);

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imageName = uniqid() . '.' . $img->getClientOriginalExtension();
        }

        $sliderImage = new SliderImage();
        $sliderImage->image = $imageName;

        if ($request->type == "Slider") {
            $sliderImage->type = "Slider";
            Image::make($request->file('image'))->save('slider_images/' . $imageName,30);
        } elseif ($request->type == "Right") {
            $sliderImage->type = "Right";
            Image::make($request->file('image'))->save('slider_images/' . $imageName,30);
        } elseif ($request->type == "Pop_Up") {
            $sliderImage->type = "Pop_Up";
            Image::make($request->file('image'))->save('slider_images/' . $imageName,30);
        } else {
            $sliderImage->type = "Left";
            Image::make($request->file('image'))->save('slider_images/' . $imageName,30);
        }
        $sliderImage->save();
        return back()->with('success', 'Image created successful.');
    }

    public function deleteSliderImage($id)
    {
        $sliderImage = SliderImage::findOrFail($id);
        if (File::exists('slider_images/' . $sliderImage->image)) {
            File::delete('slider_images/' . $sliderImage->image);
        }
        $sliderImage->delete();
        return back()->with('success', ' Image deleted successful.');
    }
}
