<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use App\Models\Photo;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image as Image;

class PhotoController extends Controller
{
    //All the functions will be written here for saving the images

    //First one to show the images index page

    public function index(){
        return view('Crud.index');
    }

    //Second One to Store the Images as File Format

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|max:50',
            'file'=>'required|mimes:jpeg,jpg,png'
        ]);
        $image = $request->file('file')->hashName();
        $size = $request->file('file')->getSize();
        $format = $request->file('file')->getClientOriginalExtension();

        //Saving Image to the Location in Different Locations
            $path = 'uploads/316x255/'.$image;
            $path1 = 'uploads/1280x1024/'.$image;
//        $path2 = 'uploads/316x255/'.$image;
//        $path3 = 'uploads/118x95/'.$image;

        Image::make($request->file('file')->getRealPath())->resize(1280,1024)->save($path);
        Image::make($request->file('file')->getRealPath())->resize(316,255)->save($path1);
        Photo::create([
           'name'=>$request->get('name'),
            'file'=>$request->file('file'),
        ]);
        return redirect()->back();
    }

}
