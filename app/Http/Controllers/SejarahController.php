<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use App\Http\Requests\StoreSejarahRequest;
use App\Http\Requests\UpdateSejarahRequest;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sejarah.index',[
            "title"=> "Sejarah",
            "sejarah"=> Sejarah::all()
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
     * @param  \App\Http\Requests\StoreSejarahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSejarahRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function show(Sejarah $sejarah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sejarah $sejarah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSejarahRequest  $request
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSejarahRequest $request, Sejarah $sejarah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sejarah $sejarah)
    {
        //
    }
}
