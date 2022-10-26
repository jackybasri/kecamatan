@extends('dashboard.layout.utama')

@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" style="color: black">
    <h1 class="h2">Alasan Revisi</h1>        
    </div>
<div class="col-lg-8" style="color: black">
    <form action="/dashboard/revisi/{{ $berita->slug }}" method="post" enctype="multipart/form-data">
        {{-- @method('patch') --}}
      @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" disabled autofocus value="{{ old('judul', $berita->judul) }}">

          <div class="invalid-feedback">
            Judul Harus Diisi
          </div>
        </div>
        
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" disabled value="{{ old('slug', $berita->slug) }}" >

          <div class="invalid-feedback">
            Slug Harus Diisi
          </div>
        </div>
        
        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select class="form-select" name="category_id" required disabled>

            {{-- <option selected>Pilih Kategori</option> --}}
            @foreach ($categories as $c )
            @if (old('category_id', $berita->category_id) == $c->id)
            <option value="{{ $c->id }}" selected>{{ $c->judul }}</option>
            @else    
            <option value="{{ $c->id }}">{{ $c->judul }}</option>
            @endif
                
            @endforeach
            
          </select>
        </div>
        
        {{-- @can('admin')
        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select name="status_id" class="form-select">
            @foreach ($status as $s )
            @if (old('status_id', $berita->status_id) == $s->id)
            <option value="{{ $s->id }}" selected>{{ $s->nama }}</option>
            @else    
            <option value="{{ $s->id }}">{{ $s->nama }}</option>
            @endif
                
            @endforeach
          </select>
        </div>
        @endcan --}}
        {{-- <div class="mb-3">
          <label for="status_id" class="form-label">Status</label>
          <input type="text" class="form-control @error('status_id') is-invalid @enderror" id="status_id" name="status_id" value="{{ old('status_id', $berita->status_id) }}" >

          <div class="invalid-feedback">
            Slug Harus Diisi
          </div>
        </div>
         --}}

        <div class="mb-3">
          <label for="image" class="form-label">Pilih Gambar</label>
          <input type="hidden" name="oldImage" value="{{ $berita->image }}">
          @if ($berita->image)
          <img src="{{ asset('storage/'. $berita->image) }}" class="img-preview img-fluid">
          @else
              
          @endif
          <img class="img-preview img-fluid">
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" disabled onchange="previewImage()">
          @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        {{-- TAMPILKAN TEXT EDITOR MENGGUNAKAN TRIX EDITOR --}}
        {{-- <div class="mb-3">
          <label for="isi" class="form-label">Berita</label>
          <input id="isi" type="hidden" name="isi" value="{{ old('isi', $berita->isi) }}" disabled>
          <trix-editor input="isi" disabled></trix-editor>

         @error('isi')
         <p class="text-danger">Berita Harus Diisi</p>
         @enderror

        </div> --}}

        <div class="mb-3">
          <label for="revisi" class="form-label">Alasan Revisi</label>
          <input id="revisi" type="hidden" name="revisi">
          <trix-editor input="revisi"></trix-editor>

         @error('isi')
         <p class="text-danger">Berita Harus Diisi</p>
         @enderror

        </div>

        <button type="submit" class="btn btn-primary">Ok</button>
      </form>
</div>
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


@endsection
