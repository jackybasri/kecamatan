<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Controller
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

    public function Cpass(){
        return view('dashboard.changepass');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function ganti(Request $request){
        $validateddata = $request->validate([
            'currentpassword'=> 'required',
            'newpassword'=>'required'
            
        ]);

        // AMBIL PASSWORD DARI DATABASE
        $hashedPassword = Auth::user()->password;

        // CEK APAKAH CURRENTPASSWORD SAMA DENGAN PASSWORD DI DATABASE
        if(Hash::check($request->current_password, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->newpassword);
            $user->save;
            Auth::logout();
            return redirect()->route('login')->with('success', 'Password Berhasil Diubah');
        }
    }

    public function change(Request $request)
    {
        $data =$request -> validate([
            
            'password'=>'required'
        ]);       

       
       
            $data['password']= Hash::make($data['password']);
            User::where('id', auth()->user()->id)->update($data);
            return redirect('/dashboard/berita')->with('success', 'Berita Berhasil Diupdate');
        


             
        
        // MASUKKAN KE DATABASE
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
