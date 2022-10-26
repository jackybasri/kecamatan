@extends('dashboard.layout.utama')
@section('container')
<div class="container-fluid" style="color: black">
    <div class="row justify-content-center">
        <div class="col-my-3">
            <h4 class="mb-3">{{ $post['judul'] }}</h4>  
            @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid mt-3">
            @endif
            <br><br>
            <p>Terakhir Diperbarui : {{ $post->published_at }}</p>
            <p>{!! $post->isi !!}</p>
            
            <a href="/dashboard/profil">Kembali</a>  
            
        </div>
    </div>
</div>

@endsection