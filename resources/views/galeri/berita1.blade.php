@extends('layouts.main')


@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="mb-3">{{ $post['judul'] }}</h4>
            <h5>Penulis : {{ $post->user->name }}</h5>
            <h5>Kategori : <a href="/categories/{{ $post->category->slug }}"> {{ $post->category->judul }}</a></h5>
            
            <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid mt-3">
            {{-- @if ($post->category->judul === 'Ekonomi')
            <img src="/img/rupiah.jpg" class="card-img-top" alt="...">
            @elseif ($post->category->judul === 'Politik')
            <img src="/img/politik.jpg" alt="https://source.unsplash.com/1200x300?crime">
            @elseif($post->category->judul === 'Kriminal')
            <img src="img/kriminal.jpg" alt="">
            @endif --}}

            <p>{!! $post->isi !!}</p>
            <a href="/berita">Kembali</a>            
        </div>
    </div>
</div>


    

@endsection