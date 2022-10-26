@extends('layouts.utama')

@section('container')
<div class="container">
  <div class="row">

       <div class="col-lg-9 mx-auto col-md-10 col-12 mt-lg-5 text-center" data-aos="fade-up">
        <h1 class="text-center">{{ $title }}</h1>
        <h5 class="text-center"><a href="/categories" class="text-decoration-none">Kategori Berita</a></h5>
       </div>
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-md-6">
    <form action="/berita">
      @csrf
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari Berita" name="search" value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Cari</button>
      </div>
    </form>
  </div>
</div>

{{-- CEK APAKAH ADA POSTINGAN BERITA --}}
@if ($post->count())

{{-- JIKA ADA POSTINGAN BERITA, TAMPILKAN BERITA TERAKHIR SEBAGAI HERO POST --}}
<div class="card mb-3">
  <div class="full-image text-center" data-aos="zoom-in">
  <img src="{{ asset('storage/' . $post[0]->image) }}" alt="" class="img-fluid mt-3">
  </div>
    <div class="card-body text-center">
      <h5 class="card-title">{{ $post[0]->judul }}</h5>
      
      <small class="text-muted">
        {{-- <p>By : <a href="/penulis/{{ $post[0]->user->username }}" class="text-decoration-none">
          {{ $post[0]->user->name }}</a> in <a href="categories/{{ $post[0]->category->slug }}">
            {{ $post[0]->category->judul }}</a> </p> --}}
            <p>{{ $post[0]->updated_at->isoformat('dddd, D MMMM Y') }}</p>
            
          
      </small>
        <p class="card-text">{{ $post[0]->excerpt }}</p>
        <a href="/berita/{{ $post[0]->slug }}" class="text-decoration-none btn btn-primary">Selengkapnya..</a>

      
    </div>
  </div>



{{-- TAMPILKAN BERITA LAINNYA DENGAN MENGGUNAKAN BOOTSTRAP CARD --}}
<div class="container">
  <div class="row">
    @foreach ($post->skip(1) as $p )
        <div class="col-md-4">
        <div class="card">
          <div class="position-absolute text-white" style="background-color: rgba(0,0,0,0.6)" data-aos="zoom-in"><a href="/categories/{{ $p->category->slug }}" class="text-white text-decoration-none">{{ $p->category->judul }}</a></div>
          
          <img src="{{ asset('storage/'.$p->image) }}" alt="">
          {{-- @if ($p->category->judul === 'Ekonomi')
          <img src="/img/rupiah.jpg" class="card-img-top" alt="...">
          @elseif ($p->category->judul === 'Politik')
          <img src="/img/politik.jpg" alt="https://source.unsplash.com/1200x300?crime">
          @elseif($p->category->judul === 'Kriminal')
          <img src="img/kriminal.jpg" alt="">
          @endif --}}
          
          <div class="card-body">
            <h5 class="card-title">{{ $p->judul }}</h5>
            <small class="text-muted">
              {{-- <p>By : <a href="/penulis/{{ $p->user->username }}" class="text-decoration-none">
                {{ $p->user->name }}</a>  --}}
                {{ $p->updated_at->isoformat('dddd, D MMMM Y') }}
              </small>
            <p class="card-text">{{ $p->excerpt }}</p>
            <a href="/berita/{{ $p->slug }}" class="btn btn-primary">Baca Selengkapnya</a>
          </div>
        </div>
        </div>
    @endforeach
  </div>
</div>
@else
<p class="text-center fs-4">Tidak ada berita ditemukan</p>
@endif
{{-- 
<div class="d-flex justify-content-center">
  {{ $post->links() }}
</div> --}}
@endsection
