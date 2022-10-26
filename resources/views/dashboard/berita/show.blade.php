@extends('dashboard.layout.utama')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-my-3">
            <h4 class="mb-3">{{ $berita['judul'] }}</h4>
            
            <a href="/dashboard/berita" class="btn btn-success"><span data-feather="arrow-left">></span> Kembali</a>
            {{-- <a href="/dashboard/beritas/{{ $berita->slug }}/edit" class="btn btn-warning"><span data-feather="edit">>Edit</span></a>            
            <form action="/dashboard/beritas/{{ $berita->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Yakin menghapus data?')"><span data-feather="x-circle"></span> Hapus</button>                
            </form> --}}
            <h5 class="mt-3">Kategori : <a href="/categories/{{ $berita->category->slug }}"> {{ $berita->category->judul }}</a></h5>

            @if($berita->image)
            <img src="{{ asset('storage/' . $berita->image) }}" alt="" class="img-fluid mt-3">

            @endif
            {{-- @if ($berita->category->judul === 'Ekonomi')
            <img src="/img/rupiah.jpg" class="card-img-top" alt="...">
            @elseif ($berita->category->judul === 'Politik')
            <img src="/img/politik.jpg" alt="https://source.unsplash.com/1200x300?crime">
            @elseif($berita->category->judul === 'Kriminal')
            <img src="img/kriminal.jpg" alt="">
            @endif --}}

            <p>{!! $berita->isi !!}</p>
            
            <a href="/dashboard/berita">Kembali</a>  
            
        </div>
    </div>
</div>

    
@endsection
