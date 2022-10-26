<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;

class DestinasiiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('destinasi.destinasi',[
            'title'=> 'Destinasi',
            'post'=> Destinasi::where('daerah_id','1')->get()
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function show(Destinasi $destinasi)
    {
        return view('destinasi.destinasi1',[
            "title"=> "Single Post",
            "post"=> $destinasi,
            
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Destinasi $destinasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destinasi $destinasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destinasi $destinasi)
    {
        //
    }
}
