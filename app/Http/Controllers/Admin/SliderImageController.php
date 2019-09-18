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
        $sliderImages = SliderImage::orderBy('created_at', 'desc')->get();
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
            $imageName = rand() . '.' . $img->getClientOriginalExtension();
        }
        
        $sliderImage = new SliderImage();
        $sliderImage->image = $imageName;

        if ($request->type == "slider") {
            $sliderImage->type = "slider";
            Image::make($request->file('image'))->resize(1200, 675)->save('slider_images/' . $imageName);
        } elseif ($request->type == "big_collection") {
            $sliderImage->type = "big_collection";
            Image::make($request->file('image'))->resize(1440, 1080)->save('slider_images/' . $imageName);
        } else {
            $sliderImage->type = "collection";
            Image::make($request->file('image'))->resize(720, 540)->save('slider_images/' . $imageName);
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
