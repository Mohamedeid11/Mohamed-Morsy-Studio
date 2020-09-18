<?php

namespace App\Http\Controllers\Gallery;

use App\Gallery;
use App\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! is_dir(public_path('/Images/' . $request->Sname))) {
            mkdir(public_path('/Images/' . $request->Sname ) , 0777);
        }

        $image = $request->file('file');

        $random = mt_rand(1,100);

        $imageName = time() . 'A' . $random . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(1500, 2000)->save(public_path('/Images/' . $request->Sname . '/' . $imageName));

        $Gallery = new Gallery();

        $Gallery->session_id = $request->Sid;

        $Gallery->image = $imageName;

        $Gallery->save();




//        if (! is_dir(public_path('/Images/' . $request->Sname))) {
//            mkdir(public_path('/Images/' . $request->Sname ) , 0777);
//        }
//
//        $image = $request->file('file');
//
//        $random = mt_rand(1,100);
//
//        $imageName = time() . 'A' . $random . '.' . $image->getClientOriginalExtension();
//
//        Image::make($image)->resize(1500, 2000)->save(public_path('/Images/' . $request->Sname . '/' . $imageName));
//
//        $Gallery = new Gallery();
//
//        $Gallery->image = $imageName;
//
//        $Gallery->session_id = $request->input('Sid');
//
//        $Gallery->save();


        return back()->with('success' , 'The Gallery Has Uploaded Successfully !!');
    }


}
