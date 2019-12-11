<?php

namespace App\Http\Controllers;

use App\Stars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Stars::create([
            'Description' => $request->Description,
            'Stars' => $request->Stars,
            'user_id' => Auth::user()->id
        ]);

        $date = 1;

        return $date;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stars  $stars
     * @return \Illuminate\Http\Response
     */
    public function show(Stars $stars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stars  $stars
     * @return \Illuminate\Http\Response
     */
    public function edit(Stars $stars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stars  $stars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stars $stars)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stars  $stars
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stars $stars)
    {
        //
    }
}
