<?php

namespace App\Http\Controllers;

use App\Models\user_role;
use App\Http\Requests\Storeuser_roleRequest;
use App\Http\Requests\Updateuser_roleRequest;

class UserRoleController extends Controller
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
     * @param  \App\Http\Requests\Storeuser_roleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeuser_roleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_role  $user_role
     * @return \Illuminate\Http\Response
     */
    public function show(user_role $user_role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_role  $user_role
     * @return \Illuminate\Http\Response
     */
    public function edit(user_role $user_role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateuser_roleRequest  $request
     * @param  \App\Models\user_role  $user_role
     * @return \Illuminate\Http\Response
     */
    public function update(Updateuser_roleRequest $request, user_role $user_role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_role  $user_role
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_role $user_role)
    {
        //
    }
}
