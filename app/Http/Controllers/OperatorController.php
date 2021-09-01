<?php

namespace App\Http\Controllers;

use App\Mesin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OperatorController extends Controller
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
        return view('operator.home');
    }
}
