@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Postingan Saya</h1>        
    </div>
    

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
        
    @endif

    <div class="table-responsive col-lg-8">
      <a href="/dashboard/berita/create" class="btn btn-primary mb-3">Tambah Berita</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Judul</th>
              <th scope="col">Kategori</th>              
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            {{-- TAMPILKAN BERITA YANG DIPOSTING USER --}}
            @foreach ($berita as $p )
            <tr>

              {{-- UNTUK MELAKUKAN LOOPING ANGKA --}}
              <td>{{ $loop->iteration }}</td>
              <td>{{ $p->judul }}</td>
              <td>{{ $p->category->judul }}</td>              
              <td>

                {{-- MENAMPILKAN DETAIL BERITA --}}
                {{-- MENGGUNAKAN CONTROLLER DASHBOARDBERITACONTROLLER, METHOD SHOW --}}
                <a href="/dashboard/berita/{{ $p->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>


                <a href="" class="badge bg-warning"><span data-feather="edit"></span></a>

                {{-- UNTUK DELETE --}}
                <form action="/dashboard/berita/{{ $p->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Anda yakin menghapus data?')"><span data-feather="x-circle"></span></button>
                </form>
                
                
              </td>
            </tr>
            
            @endforeach
            
          </tbody>
        </table>
      </div>
@endsection

