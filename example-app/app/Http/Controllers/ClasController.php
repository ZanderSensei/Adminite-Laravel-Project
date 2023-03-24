<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clas;
class ClasController extends Controller
{
    //

    public function store(Request $request){
        
        Clas::create([
            'clas_name'=>$request->clas_name,
            'clas_stream'=>$request->clas_stream,
            'clas_capacity'=>$request->clas_capacity,
            'clas_rep'=>$request->clas_rep,
            'clas_teacher'=>$request->clas_teacher,

        ]);
        alert()->success('SuccessAlert','Data has been submitted successfuly.');
        return redirect()->back();

    }


    public function update(Request $request)
    {
        Clas::where(['id'=>$request->id])->update([
            'clas_name'=>$request->clas_name,
            'clas_stream'=>$request->clas_stream,
            'clas_capacity'=>$request->clas_capacity,
            'clas_rep'=>$request->clas_rep,
            'clas_teacher'=>$request->clas_teacher,
        ]);
        alert()->success('SuccessAlert','Data has been Updated successfuly.');
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        Clas::where(['id'=>$request->id])->delete();
        alert()->success('SuccessAlert','Data has been deleted successfuly.');
        return redirect()->back();
    }

}
