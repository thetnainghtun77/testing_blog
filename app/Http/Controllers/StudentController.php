<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Student;
use Illuminate\Support\Facades\URL;

class StudentController extends Controller
{
    public function __construct($value='')
    {
        $this->middleware('auth')->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('backend.students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('backend.students.create',compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([

            "fname" => "required",
            "sname" => "required",
            "education" => "required",
            "city" => "required",
            "acceptedyear" => "required",
            "address" => "required",
            "email" => "required",
            "phone" => "required",
            "dob" => "required",
            "gender" => "required",
            "subjects"=>"required",
            "p1" => "required",
            "r1" => "required",
            "ph1" => "required",
            "p2" => "required",
            "r2" => "required",
            "ph2" => "required",
            "because" => "required",
            "bid" => "required"

        ]);

        $student = new Student;
        $student -> namee = request('fname');
        $student -> namem = request('sname');
        $student -> email = request('email');
        $student -> phone = request('phone');
        $student -> address = request('address');
        $student -> education = request('education');
        $student -> city = request('city');
        $student -> accepted_year = request('acceptedyear');
        $student -> dob = request('dob');
        $student -> gender = request('gender');
        $student -> p1 = request('p1');
        $student -> p1_phone = request('ph1');
        $student -> p1_relationship = request('r1');
        $student -> p2 = request('p2');
        $student -> p2_phone = request('ph2');
        $student -> p2_relationship = request('r2');
        $student -> because = request('because');
        $student -> batch_id = request('bid');

        $student->save();

        // Add student_subject
        $student->subjects()->attach(request('subjects'));

        // return redirect()->route('students.index');
        if (app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'students.create'){
            return redirect()->route('students.index');
        }else {
                // return back with noti msg
            return back()->with('status','Register successfully!');

               }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        
        return response()->json($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.students.edit');
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
