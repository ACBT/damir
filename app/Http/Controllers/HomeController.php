<?php

namespace App\Http\Controllers;

use App\Stars;
use App\Tovar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('app',['tovars' => Tovar::all(), 'stars' => Stars::all()]);
    }
}
