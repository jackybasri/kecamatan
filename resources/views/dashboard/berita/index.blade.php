@extends('dashboard.layout.utama')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2" style="color: black">Daftar Berita</h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @can('reporter')
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <a href="/dashboard/beritas/create" class="btn btn-primary mb-3">Tambah Berita</a>
        
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
                        <th>Status</th>
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
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    
                    {{-- SUPER ADMIN DAPAT MELIHAT DAFTAR BERITA DARI SELURUH KECAMATAN --}}
                    @if(auth()->user()->user_role_id =='1')
                    @foreach ($posts as $p )                   
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->judul }}</td>
                        <td>{{ $p->user->name }}</td>
                        <td>{{ $p->category->judul }}</td>
                        <td>{{ $p->user->daerah->kecamatan}}</td>
                        <td>
                            @if($p->status->id =='4')
                            <a href="/dashboard/revisi/{{ $p->slug }}/alasan">{{ $p->status->nama }}</a>
                            
                            @elseif($p->status->id =='5')
                            <a href="/dashboard/reject/{{ $p->slug }}/alasan">{{ $p->status->nama }}</a>
                            @else                        
                            {{ $p->status->nama }}
                            @endif
                        </td>
                        <td>

                            {{-- VIEW --}}
                            <a href="/dashboard/berita/{{ $p->slug }}" class="button btn-circle btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        
                            {{-- PUBLISH --}}
                            @can('admin')
                            @if ($p->status_id =='3')
                                
                            <form action="/dashboard/publish/{{ $p->slug }}" method="post" class="d-inline" enctype="multipart/form-data">
                                {{-- @method('patch') --}}
                                @csrf
                                <button class="btn btn-success btn-circle btn-sm" onclick="return confirm('Yakin publish berita?')"><i class="fas fa-check"></i></button>
                                
                            </form>                            
                            
                            {{-- REVISI --}}
                            <a href="/dashboard/revisi/{{ $p->slug }}/edit" class="btn btn-warning btn-circle btn-sm d-inline"><i class="fas fa-exclamation-triangle"></i></a>
                            
                            {{-- REJECT --}}
                            <a href="/dashboard/reject/{{ $p->slug }}/edit" class="btn btn-danger btn-circle btn-sm">
                                <i class="fas fa-trash"></i>
                            </a>                               
                          
                            @endif
                            @endcan
                            
                            
                        </td>                    
                    </tr>
                    @endforeach

                    {{-- SELAIN SUPER ADMIN --}}
                    {{-- HANYA DAPAT MELIHAT BERITA DI KECAMATANNYA --}}
                    @else
                    @foreach ($post as $p )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->judul }}</td>
                        <td>{{ $p->user->name }}</td>
                        <td>{{ $p->category->judul }}</td>
                        <td>{{ $p->user->daerah->kecamatan}}</td>
                        <td>
                            @if($p->status->id =='4')
                            <a href="/dashboard/revisi/{{ $p->slug }}/alasan">{{ $p->status->nama }}</a>
                            
                            @elseif($p->status->id =='5')
                            <a href="/dashboard/reject/{{ $p->slug }}/alasan">{{ $p->status->nama }}</a>
                            @else                        
                            {{ $p->status->nama }}
                            @endif
                        </td>
                        <td>
                            <a href="/dashboard/berita/{{ $p->slug }}" class="button btn-circle btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                                
                        @can('verifikator')
                            @if ($p->status_id =='3')
                                
                            <form action="/dashboard/publish/{{ $p->slug }}" method="post" class="d-inline" enctype="multipart/form-data">
                                {{-- @method('patch') --}}
                                @csrf
                                <button class="btn btn-success btn-circle btn-sm" onclick="return confirm('Yakin publish berita?')"><i class="fas fa-check"></i></button>
                                
                            </form>
                            
                            
                            <a href="/dashboard/revisi/{{ $p->slug }}/edit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-exclamation-triangle"></i></a>
                            @endif

                            @if ($p->status_id == '3')

                            <a href="/dashboard/reject/{{ $p->slug }}/edit" class="btn btn-danger btn-circle btn-sm">
                                <i class="fas fa-trash"></i>
                            </a>
                           
                            @endif
                            @endcan
                            
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
