@extends('layouts.utama')

@section('container')

<section class="project-detail section-padding-half">
  <div class="container">
       <div class="row">

            <div class="col-lg-9 mx-auto col-md-10 col-12 mt-lg-5 text-center" data-aos="fade-up">
              {{-- <h4 class="blog-category text-info">Creative Work</h4> --}}
              
              <h1>DESTINASI</h1>
              <h4><a href="/"> Kategori Destinasi</a></h4>

              <div class="client-info">
                  <div class="justify-content-center align-items-center mt-3">
                    <form action="/destinasi">
                      @csrf
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari destinasi" name="search" value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">Cari</button>
                      </div>
                    </form>
                  </div>
              </div>
            </div>

       </div>
  </div>
</section>




{{-- CEK APAKAH ADA POSTINGAN destinasi --}}
@if ($post->count())

{{-- JIKA ADA POSTINGAN destinasi, TAMPILKAN destinasi TERAKHIR SEBAGAI HERO POST --}}
<div class="card mb-3">
  <img src="{{ asset('storage/' . $post[0]->image) }}" alt="" class="img-fluid mt-3">
    <div class="card-body text-center">
      <h5 class="card-title">{{ $post[0]->judul }}</h5>
      
      <small class="text-muted">
        <p>By : <a href="/penulis/{{ $post[0]->user->username }}" class="text-decoration-none">
          {{ $post[0]->user->name }}</a> in <a href="categories/{{ $post[0]->destinasi_kategori->slug }}">
            {{ $post[0]->destinasi_kategori->judul }}</a> 
            {{-- {{ $post[0]->published_at->diffForHumans() }} --}}
          </p>
      </small>
        <p class="card-text">{{ $post[0]->excerpt }}</p>
        <a href="/destinasi/{{ $post[0]->slug }}" class="text-decoration-none btn btn-primary">Selengkapnya..</a>

      
    </div>
  </div>



{{-- TAMPILKAN destinasi LAINNYA DENGAN MENGGUNAKAN BOOTSTRAP CARD --}}
<div class="container">
  <div class="row">
    @foreach ($post->skip(1) as $p )
        <div class="col-md-4">
        <div class="card">
          <div class="position-absolute text-white" style="background-color: rgba(0,0,0,0.6)"><a href="/categories/{{ $p->destinasi_kategori->slug }}" class="text-white text-decoration-none">{{ $p->destinasi_kategori->judul }}</a></div>
          
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
              <p>By : <a href="/penulis/{{ $p->user->username }}" class="text-decoration-none">
                {{ $p->user->name }}</a> 
                {{-- {{ $p->published_at->diffForHumans() }} --}}
              </small>
            <p class="card-text">{!! $p->excerpt !!}</p>
            <a href="/destinasi/{{ $p->slug }}" class="btn btn-primary">Baca Selengkapnya</a>
          </div>
        </div>
        </div>
    @endforeach
  </div>
</div>
@else
<p class="text-center fs-4">Tidak ada destinasi ditemukan</p>
@endif
{{-- 
<div class="d-flex justify-content-center">
  {{ $post->links() }}
</div> --}}
@endsection
