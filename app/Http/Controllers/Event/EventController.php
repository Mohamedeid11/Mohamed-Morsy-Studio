<?php

namespace App\Http\Controllers\Event;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events =Event::all();

        return view('Event.index' ,compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        return view('Event.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! is_dir(public_path('/Images/Event'))) {
            mkdir(public_path('/Images/Event') , 0777);
        }
        $this->validate($request,[
            'name'=>'required|max:200',
            'price'=>'required|numeric',
            'info'=>'required',
            'image'=>'required|image',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $random = mt_rand(1,1000);
            $imageName = $random . $image->getClientOriginalName();
            Image::make($image)->resize(1500, 2000)->save(public_path('/Images/Event/'. $imageName));
        }

        $event = new Event();

        $event->name = $request->input('name');
        $event->price = $request->input('price');
        $event->info = $request->input('info');
        $event->image =$imageName;

        $event->save();

        return redirect(route('event.index'))->with('success' , 'The Event Has Created Successfully !!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('Event.edit' , compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $this->validate($request,[
            'name'=>'required|max:200',
            'price'=>'required|numeric',
            'info'=>'required',
            'image'=>'image',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $random = mt_rand(1,1000);
            $imageName = $random . $image->getClientOriginalName();
            Image::make($image)->resize(1500, 2000)->save(public_path('/Images/Event/'. $imageName));
        }

        $event->name = $request->input('name');
        $event->price = $request->input('price');
        $event->info = $request->input('info');
        $event->image =$imageName;

        $event->update();

        return redirect(route('event.index'))->with('success' , 'The Event Has Updated Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {

        File::delete(public_path('Images/Event/'  . $event->image));
        $event->delete();

        return redirect(route('event.index'))->with('success' , 'The Event Has Deleted Successfully !!');;
    }
}
