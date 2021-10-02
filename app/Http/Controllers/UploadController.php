<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;
use Illuminate\Support\Facades\Validator;
class UploadController extends Controller
{
    public function index(){
       return view('welcome');
    }

    public function store(Request $request){
        Log::info($request);
        $this->validate($request,[
            'name'=>'required|min:3|max:50',
            'file'=>'required|mimes:jpeg,jpg,png,gif'
        ]);
        Storage::putFile('public/images',$request->get('file'));
        return redirect()->back();
    }
}
