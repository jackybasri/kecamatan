@extends('dashboard.layout.utama')

@section('container')
<div class="container-fluid" style="color: black">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Profil</h1>        
    </div>
<div class="col-lg-8">
    <form action="{{ route('profil.update', $profil->id) }}}}" method="post" enctype="multipart/form-data">
      @method('put')
      @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" autofocus value="{{ old('judul', $profil->judul) }}">

          <div class="invalid-feedback">
            Judul Harus Diisi
          </div>
        </div>
        
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $profil->slug) }}" >

          <div class="invalid-feedback">
            Slug Harus Diisi
          </div>
        </div>  

        <div class="mb-3">
          <label for="image" class="form-label">Pilih Gambar</label>
          <input type="hidden" name="oldImage" value="{{ $profil->image }}">
          @if ($profil->image)
          <img src="{{ asset('storage/'. $profil->image) }}" class="img-preview img-fluid">
          @else
              
          @endif
          <img class="img-preview img-fluid">
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        {{-- TAMPILKAN TEXT EDITOR MENGGUNAKAN TRIX EDITOR --}}
        <div class="mb-3">
          <label for="isi" class="form-label">Profil</label>
          <input id="isi" type="hidden" name="isi" value="{{ old('isi', $profil->isi) }}">
          <trix-editor input="isi"></trix-editor>

         @error('isi')
         <p class="text-danger">profil Harus Diisi</p>
         @enderror

        </div>

        <button type="submit" class="btn btn-primary">Ok</button>
      </form>
</div>

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
