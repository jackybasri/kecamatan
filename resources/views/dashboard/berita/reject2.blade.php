@extends('dashboard.layout.utama')

@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style="color: black">Alasan Penolakan</h1>        
    </div>
{!! $reject !!}

{{-- UNTUK MENANGANI SLUG --}} 
 {{-- <script>

  const judul = document.querySelector('#judul');
  const slug = document.querySelector('#slug');

  judul.addEventListener('change', function(){
    fetch('/dahsboard/berita/checkSlug?judul=' +judul.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug);
  });

  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })
</script> --}}
</div>

@endsection
