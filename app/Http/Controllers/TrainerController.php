<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trainer;
use App\Course;
use App\Degree;
use App\User;
use Illuminate\Support\Facades\Hash;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('backend.trainers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $degrees = Degree::all();
        return view('backend.trainers.create',compact('courses','degrees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasfile('avatar')) {
            $avatar = $request->file('avatar');
            $upload_dir = public_path().'/storage/trainer/';
            $name = time().'.'.$avatar->getClientOriginalExtension();
            $avatar ->move($upload_dir,$name);
            $path = 'storage/trainer/'.$name;
        }

        // Validation
        // Store

        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make('123456789');
        $user->save();

        $user->assignRole('Trainer');

        $trainer = new Trainer;
        $trainer->user_id = $user->id;
        $trainer->avatar = $path;    
        $trainer->phone = request('phone');    
        $trainer->degree_id = request('degree');    
        $trainer->course_id = request('course');    
        $trainer->address = request('address'); 
        $trainer->save();

        // return redirect()->route('trainers.index');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
