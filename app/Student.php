<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['namee','namem','email','phone','address','education','city','accepted_year','dob','gender','p1','p1_phone','p1_relationship','p2','p2_phone','p2_relationship','because','batch_id'];

    public function subjects($value='')
    {
    	return $this ->belongsToMany('App\Subject')
    				 ->withTimestamps();
    }
}
