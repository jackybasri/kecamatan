@extends('dashboard.layout.utama')

@section('container')
<div class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar User</h1>        
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="table-responsive col lg-8">
        <a href="/dashboard/users/create" class="btn btn-primary mb-3">Tambah User</a>
        
        <table class="table table-striped table-sm" style="color: black">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">User</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">Role</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                {{-- JIKA USER ADALAH SUPER ADMIN --}}
                {{-- DAPAT MELIHAT SEMUA USER --}}
                @if(auth()->user()->user_role_id =='1')
                @foreach ($users as $user )                   
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->daerah->kecamatan }}</td>
                    
                    <td>{{ $user->user_role->name }}</td>
                    <td>                        
                        <a href="/dashboard/users/{{ $user->username }}/edit" class="btn btn-warning btn-sm btn-circle"><i class="fas fa-pen"></i></a>
                        <form action="/dashboard/users/{{ $user->username }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm btn-circle" onclick="return confirm('Yakin menghapus user?')"><i class="fas fa-trash"></i></button>
                            
                        </form>
                    </td>   
                                     
                </tr>
                @endforeach

                {{-- JIKA USER BUKAN USER ADMIN, HANYA BISA MELIHAT USER DI KECAMATANNYA --}}
                @else
                @foreach ($user as $u )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->daerah->kecamatan }}</td>
                    
                    <td>{{ $u->user_role->name }}</td>
                    <td>                        
                        <a href="/dashboard/users/{{ $u->username }}/edit" class="btn btn-warning btn-sm btn-circle"><i class="fas fa-pen"></i></a>
                        <form action="/dashboard/users/{{ $u->username }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm btn-circle" onclick="return confirm('Yakin menghapus user?')"><i class="fas fa-trash"></i></button>
                            
                        </form>
                    </td>   
                                     
                </tr>
                @endforeach 
               
                @endif
            </tbody>
        </table>
    </div>
</div>

    
@endsection

