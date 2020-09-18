<?php

namespace App\Http\Controllers\Session;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Session;
use App\Category;
use Gate;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class SessionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::orderBy('id' , 'desc')->paginate(9);
        $categories = Category::all();
        $count = count(Session::all());

        return view('Session.index' ,compact('sessions' , 'categories', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sessions = Session::all();
        $categories = Category::all();

        return view('Session.upload' ,compact('sessions' , 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Gate::denies('create-session')) {
            return redirect()->route('session.index');
        }
        if (! is_dir(public_path('/Images/' . $request->Sname))) {
            mkdir(public_path('/Images/' . $request->Sname ) , 0777);
        }

        $this->validate($request, [
            'Sname' => 'required|max:200|unique:sessions',
            'Simage' => 'required|image',
        ]);
        if ($request->hasFile('Simage')) {
            $image = $request->file('Simage');
            $imageName ='Cover'. time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1500, 2000)->save(public_path('/Images/' .$request->Sname . '/'. $imageName));

        }

        $session = new Session();

        $session->Sname = $request->input('Sname');
        $session->category_id = $request->input('category');
        $session->Simage = $imageName;

        $session->save();

        return redirect(route('session.index'))->with('success' , 'The Session Has Created Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        $categories = Category::all();
        $images = $session->galleries()->get();

        return view('Session.Gallery' ,compact('session'  , 'categories' ,'images'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        $categories = Category::all();

        return view('Session.edit' , compact('session' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Session $session)
    {

        if (! is_dir(public_path('/Images/' . $request->Sname))) {
            mkdir(public_path('/Images/' . $request->Sname ) , 0777);
        }
        $this->validate($request, [
            'Sname'=>'sometimes|max:200|unique:sessions,Sname,' . $session->id,
            'Simage' => 'sometimes',
        ]);
        if ($request->hasFile('Simage')) {
            $image = $request->file('Simage');
            $imageName ='Cover'. time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1500, 2000)->save(public_path('/Images/' .$request->Sname . '/'. $imageName));

        }else {
            $imageName = $session->Simage;
        }

        $session->Sname = $request->input('Sname');
        $session->category_id = $request->input('category');
        $session->Simage = $imageName;
        $session->update();

        return redirect(route('session.index'))->with('success' , 'The Session Has Updated Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , Session $session)
    {
        if (Gate::denies('delete-session')) {
            return redirect()->route('session.index');
        }
//        File::delete( [
//            public_path('/Images/' . $session->s_name . '/' . $session->s_image)
//        ]);

//        $session = Session::findorfail($request->session);
        File::deleteDirectory(public_path('/Images/' . $session->Sname));
        Session::destroy($session->id);
        return redirect(route('session.index'))->with('success' , 'The Session Has Deleted Successfully !!');
    }

    public function delete(Request $request ,Session $session) {


        $image = Gallery::findOrFail($request->image);

        File::delete(public_path('Images/' . $session->Sname . '/' . $image->image));
        $image->delete();

        return back()->with('success' , 'The Image Has Deleted Successfully !!');
    }
}
