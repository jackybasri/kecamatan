@extends('dashboard.layout.utama')

@section('container')
<div class="container-fluid" style="color: black">
    
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2" style="color: black">Daftar Destinasi</h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @can('admin')
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <a href="/dashboard/destinasi/create" class="btn btn-primary mb-3">Tambah Destinasi</a>
        
            </div>
            @endcan

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
                        <th>Kategori</th>
                        <th>Kecamatan</th>
                        
                        <th>Aksi</th>
                        
                    </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Kecamatan</th>
                        
                        <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    
                    {{-- SUPER ADMIN DAPAT MELIHAT DAFTAR DESTINASI DARI SELURUH KECAMATAN --}}
                    @if(auth()->user()->user_role_id =='1')
                    @foreach ($post as $p )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->judul }}</td>
                        <td>{{ $p->user->name }}</td>
                        <td>{{ $p->destinasi_kategori->judul }}</td>
                        <td>{{ $p->user->daerah->kecamatan}}</td>
                        <td>
                            <a href="{{ route('destinasi.show',$p->id) }}" class="button btn-circle btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            </td>                    
                    </tr> 
                    @endforeach

                    {{-- SELAIN SUPER ADMIN --}}
                    {{-- HANYA DAPAT MELIHAT DESTINASI DI KECAMATANNYA --}}
                    @else
                    @foreach ($profil as $p )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->judul }}</td>
                        <td>{{ $p->user->name }}</td>
                        <td>{{ $p->destinasi_kategori->judul }}</td>
                        <td>{{ $p->user->daerah->kecamatan}}</td>
                        <td>
                            <a href="{{ route('destinasi.show',$p->id) }}" class="button btn-circle btn-info btn-sm"><i class="fas fa-eye"></i></a>                           
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
</div>    
@endsection

