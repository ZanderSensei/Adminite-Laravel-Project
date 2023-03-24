<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clas;
use App\Models\student;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clases=Clas::all();
        return view('home',compact(['clases']));
    }

    public function viewStudent()
    {    
        $students=student::all();
        return view('Student', compact(['students']));

    }


    public function viewProfile(){
        return view('profile');
    }

        }
