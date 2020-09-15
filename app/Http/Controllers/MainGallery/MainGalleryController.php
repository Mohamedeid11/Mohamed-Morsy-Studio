<?php

namespace App\Http\Controllers\MainGallery;


use App\Http\Controllers\Controller;
use App\MainGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class MainGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = MainGallery::all();

        return view('MainGallery.index' , compact('images'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! is_dir(public_path('/Images/Main_Gallery'))) {
            mkdir(public_path('/Images/Main_Gallery') , 0777);
        }

        $image = $request->file('file');

        $random = mt_rand(1,100);

        $imageName = time() . 'A' . $random . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(1500, 2000)->save(public_path('/Images/Main_Gallery/' . $imageName));

        $MainGallery = new MainGallery();

        $MainGallery->image = $imageName;

        $MainGallery->save();


        return back()->with('success' , 'The Gallery Has Uploaded Successfully !!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MainGallery  $mainGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainGallery $mainGallery)
    {

        File::delete(public_path('Images/Main_Gallery/'  . $mainGallery->image));

        $mainGallery->delete();

        return back()->with('success' , 'The Image Has Deleted Successfully !!');
    }
}
