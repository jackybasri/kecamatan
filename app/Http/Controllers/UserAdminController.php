<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use App\Models\User;
use App\Models\user_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daerah = auth()->user()->daerah->id;
        return view('dashboard.users.index',[
            'users'=> User::all(),
            'user' => User::where('daerah_id', $daerah)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create',[
            'roles'=> user_role::all(),
            'role'=> user_role::whereNot('id', 1)->get(),
            'daerah'=> Daerah::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =$request -> validate([
            'name'=> 'required|max:255',
            'username'=> 'required|min:3|max:255|unique:users',
            'email'=> 'required|email:dns|unique:users',
            'password'=>'required|min:7',
            'user_role_id'=> 'required',
            'daerah_id'=> 'required'
        ]);

        // SETELAH DATA DIVALIDASI, ENKRIPSI PASSWORD
        // $data['password'] = bcrypt($data['password']);
        $data['password']= Hash::make($data['password']);

        User::create($data);

        // $request->session()->flash('status', 'Pendaftaran Berhasil, silakan login');

        // APABILA BERHASIL, REDIRECT KE HALAMAN LOGIN
        return redirect('/dashboard/users')->with('success', 'Berhasil Menambahkan User');
    }

    public function store2(Request $request)
    {
        $data =$request -> validate([
            'name'=> 'required|max:255',
            'username'=> 'required|min:3|max:255|unique:users',
            'email'=> 'required|email:dns|unique:users',
            'password'=>'required|min:7',
            'user_role_id'=> 'required',
            
        ]);

        // SETELAH DATA DIVALIDASI, ENKRIPSI PASSWORD
        // $data['password'] = bcrypt($data['password']);
        $data['daerah_id']= auth()->user()->daerah_id;
        $data['password']= Hash::make($data['password']);

        User::create($data);

        // $request->session()->flash('status', 'Pendaftaran Berhasil, silakan login');

        // APABILA BERHASIL, REDIRECT KE HALAMAN LOGIN
        return redirect('/dashboard/users')->with('success', 'Berhasil Menambahkan User');
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
        return 'hahaha';
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
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success','User berhasil dihapus'); 
    }
}
