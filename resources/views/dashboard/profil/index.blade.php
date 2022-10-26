@extends('dashboard.layout.utama')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2" style="color: black">Profil Kecamatan {{ auth()->user()->daerah->kecamatan }}</h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">          

            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color: black">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>                        
                        <th>Kecamatan</th>                        
                        <th>Aksi</th>
                        
                    </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>                        
                        <th>Kecamatan</th>                        
                        <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    
                    {{-- SUPER ADMIN DAPAT MELIHAT DAFTAR BERITA DARI SELURUH KECAMATAN --}}
                    @if(auth()->user()->user_role_id =='1')
                    @foreach ($profils as $p )                   
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->judul }}</td>
                        <td>{{ $p->user->name }}</td>                        
                        <td>{{ $p->user->daerah->kecamatan}}</td>
                        
                        <td>

                            {{-- VIEW --}}
                            <a href="{{ route('profil.show', $p->id) }}" class="button btn-circle btn-info btn-sm"><i class="fas fa-eye"></i></a>

                            <a href="/dashboard/profil/{{ $p->id }}/edit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-pen"></i></a>                     
                                                      
                            
                        </td>                    
                    </tr>
                    @endforeach

                    {{-- SELAIN SUPER ADMIN --}}
                    {{-- HANYA DAPAT MELIHAT BERITA DI KECAMATANNYA --}}
                    @else
                    @foreach ($profil as $p )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->judul }}</td>
                        <td>{{ $p->user->name }}</td>                        
                        <td>{{ $p->user->daerah->kecamatan}}</td>
                        
                        <td>
                            <a href="/dashboard/profil/{{ $p->slug }}" class="button btn-circle btn-info btn-sm"><i class="fas fa-eye"></i></a>

                            <a href="/dashboard/profil/{{ $p->slug }}/edit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-pen"></i></a>
                                                
                       
                            
                        </td>                    
                    </tr> 
                    @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
    

  

    
@endsection
