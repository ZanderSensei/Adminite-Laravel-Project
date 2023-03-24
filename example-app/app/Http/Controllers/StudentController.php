<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    // 
    public function store(Request $request){
        
        Student::create([
            'stud_fname'=>$request->stud_fname,
            'stud_lname'=>$request->stud_lname,
            'stud_id'=>$request->stud_id,
            'birth_no'=>$request->birth_no,
            'address'=>$request->address,

        ]);
        alert()->success('SuccessAlert','Data has been submitted successfuly.');
        return redirect()->back();

    }

    public function delete(Request $request)
    {
        Student::where(['id'=>$request->id])->delete();
        alert()->success('SuccessAlert','Data has been deleted successfuly.');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        Student::where(['id'=>$request->id])->update([
            'stud_fname'=>$request->stud_fname,
            'stud_lname'=>$request->stud_lname,
            'stud_id'=>$request->stud_id,
            'birth_no'=>$request->birth_no,
            'address'=>$request->address,
        ]);
        alert()->success('SuccessAlert','Data has been Updated successfuly.');
        return redirect()->back();
    }
}
