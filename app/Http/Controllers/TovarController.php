<?php

namespace App\Http\Controllers;

use App\Tovar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TovarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res = Tovar::find($request->id);

        $data = [
            'id' => $res->id,
            'Name' => $res->Name,
            'Amount' => $res->Amount,
            'Price' => $res->Price
        ];

        return $data;
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
        //dd(Storage::putFile('avatars', $request->file('Photo')));

        if (Tovar::find($request->id)){
            Tovar::find($request->id)->update([
                'Name' => $request->Name,
                'Photo' => 'asdasd',
                'Amount' => $request->Amount,
                'Price' => $request->Price
            ]);

            $data = 1;
        }
        else {
            Tovar::Create([
                'Name' => $request->Name,
                'Photo' => 'asdasd',
                'Amount' => $request->Amount,
                'Price' => $request->Price
            ]);
            $data = 1;
        }
//        $file = time().'.'.$request->Photo->extension();
//        $request->Photo->move(public_path('storage/images'), $file);


        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tovar  $tovar
     * @return \Illuminate\Http\Response
     */
    public function show(Tovar $tovar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tovar  $tovar
     * @return \Illuminate\Http\Response
     */
    public function edit(Tovar $tovar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tovar  $tovar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tovar $tovar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tovar  $tovar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Tovar::find($request->id)->delete();

        $data = 1;

        return $data;
    }
}
