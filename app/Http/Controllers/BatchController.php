<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Batch;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $courses= Course::all();
        $batches= Batch::all(); 
        return view('backend.batches.index', compact('batches', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('backend.batches.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd = output and die
        // dd($request); // (1) blackscreen

        //Validation // (2)
        $request->validate([
            "title" => 'required|min:5|max:191' ,
            "startdate" => 'required',
            "enddate" =>'required' ,
            "time" => 'required|min:5|max:191',
            "course_id" => 'required',
        ]);

        // Upload  if exist // (3)


        // Store Data // (4)
        $batch = new Batch;
        $batch->title= request('title');
        $batch->startdate= request('startdate');
        $batch->enddate= request('enddate');
        $batch->time= request('time');
        $batch->course_id= request('course_id');
        $batch->save();

        // Return redirect // (5)
        return redirect()->route('batches.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $batch = Batch::findOrFail($id);
        return view('backend.batches.show',compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $batch= Batch::find($id);
        $courses = Course::all();
        return view('backend.batches.edit', compact('batch', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //dd = output and die
        // dd($request); // (1) blackscreen

        //Validation // (2)
        $request->validate([
            "title" => 'required|min:5|max:191' ,
            "startdate" => 'required',
            "enddate" =>'required' ,
            "time" => 'required|min:5|max:191',
            "course_id" => 'required',
        ]);

        // Upload  if exist // (3)


        // Store Data // (4)
        $batch = Batch::find($id);
        $batch->title= request('title');
        $batch->startdate= request('startdate');
        $batch->enddate= request('enddate');
        $batch->time= request('time');
        $batch->course_id= request('course_id');
        $batch->save();

        // Return redirect // (5)
        return redirect()->route('batches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batch = Batch::find($id);
        $batch->delete();

        // Return redirect // 5
        return redirect()-> route('batches.index')->with('success', 'Data Deleted');
    }
}
