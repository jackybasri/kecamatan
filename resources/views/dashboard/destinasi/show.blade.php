@extends('dashboard.layout.utama')

@section('container')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-my-3">
            <h4 class="mb-3">{{ $post['judul'] }}</h4>
            
            <a href="/dashboard/destinasi" class="btn btn-success"><span data-feather="arrow-left">></span> Kembali</a>            
            <h5 class="mt-3">Kategori : <a href="/categories/{{ $post->destinasi_kategori->slug }}"> {{ $post->destinasi_kategori->judul }}</a></h5>

            @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid mt-3">

            @endif
            {{-- @if ($berita->category->judul === 'Ekonomi')
            <img src="/img/rupiah.jpg" class="card-img-top" alt="...">
            @elseif ($berita->category->judul === 'Politik')
            <img src="/img/politik.jpg" alt="https://source.unsplash.com/1200x300?crime">
            @elseif($berita->category->judul === 'Kriminal')
            <img src="img/kriminal.jpg" alt="">
            @endif --}}

            <p>{!! $post->isi !!}</p>
            
            <a href="/dashboard/destinasi">Kembali</a>  
            
        </div>
    </div>
</div>

    
@endsection
