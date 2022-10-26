@extends('dashboard.layout.utama')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2" style="color: black">Berita Saya</h1>
    
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
        @if ($berita->count())
        <div class="table-responsive col lg-8">
            {{-- {{-- <a href="/dashboard/beritas/create" class="btn btn-primary mb-3">Tambah Berita</a> --}}
            
            <table class="table table-striped table-sm" id="dataTable" style="color: black">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($berita as $b )                   
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $b->judul }}</td>
                        <td>{{ $b->category->judul }}</td>
                        <td>
                            @if($b->status->id =='4')
                            <a href="/dashboard/revisi/{{ $b->slug }}/alasan">{{ $b->status->nama }}</a>
                            @elseif($b->status->id =='5')
                            <a href="/dashboard/reject/{{ $b->slug }}/alasan">{{ $b->status->nama }}</a>
                            @else
                            {{ $b->status->nama }}
                            @endif
                        
                        </td>
                        <td>
                            <a href="/dashboard/berita/{{ $b->slug }}" class="button btn-circle btn-info btn-sm"><i class="fas fa-eye"></i></a>
    
                            @if ($b->status_id == '2' || $b->status_id == '4')
                            <a href="/dashboard/beritas/{{ $b->slug }}/edit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-pen"></i></a>
                            @endif
                                
                            
                           @if ($b->status_id == '2')                           
                           <form action="/dashboard/beritas/{{ $b->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin menghapus data?')"><i class="fas fa-trash"></i></button>
                            
                            </form>
                            @endif
                            
                            @if ($b->status_id =='2' || $b->status_id == '4')                        
                            
                            <form action="/dashboard/kirim/{{ $b->slug }}" method="post" class="d-inline" enctype="multipart/form-data">
                                {{-- @method('patch') --}}
                                @csrf
                                <button class="btn btn-check btn-sm btn-circle btn-success" onclick="return confirm('Yakin mengirim berita?')"><i class="fas fa-check"></i></button>
    
                            </form>
                            @endif
                            
                            @can('admin')
                            <form action="/dashboard/publish/{{ $b->slug }}" method="post" class="d-inline" enctype="multipart/form-data">
                                {{-- @method('patch') --}}
                                @csrf
                                <button class="badge bg-dark border-0" onclick="return confirm('Yakin publish berita?')"><span data-feather="check-square"></span></button>
    
                            </form>
                            @endcan
                            
                        </td>                    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else 
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h6>Tidak Ada Berita yang Diposting</h6>
        </div>
        @endif 
       
        </div>
       
    </div>

</div>
    

  

    
@endsection
