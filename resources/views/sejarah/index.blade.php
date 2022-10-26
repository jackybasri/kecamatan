@extends('layouts.main')

@section('container')


{{-- CEK APAKAH ADA POSTINGAN BERITA --}}
{{-- @if ($post->count()) --}}
@foreach ($sejarah as $s )
<h4>{!! $s->judul !!}</h4>
<h5>Penulis : {!! $s->user->name !!}</h5>
<p>{!! $s->isi !!}</p>
    
@endforeach

{{-- @else
<p class="text-center fs-4">Tidak ada berita ditemukan</p>
@endif --}}
{{-- 
<div class="d-flex justify-content-center">
  {{ $post->links() }}
</div> --}}
@endsection
