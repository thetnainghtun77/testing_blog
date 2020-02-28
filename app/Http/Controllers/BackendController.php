<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function dashboard($value='')
    {
    	return view('backend.dashboard');
    }

    public function addquizzes($value='')
    {
    	return view('backend.quizzes');
    }

    public function grades($value='')
    {
    	return view('backend.grades');
    }
}
