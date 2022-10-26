@extends('dashboard.layout.utama')

@section('container')
<div class="container-fluid" style="color: black">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Berita</h1>        
    </div>
<div class="col-lg-8">

    {{-- SUPAYA FORM BISA MENANGANI FILE, TAMBAHKAN enctype ="multipart/form-data" --}}
    <form action="/dashboard/beritas" method="post" enctype="multipart/form-data">
      @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" autofocus value="{{ old('judul') }}">

          <div class="invalid-feedback">
            Judul Harus Diisi
          </div>
        </div>
        
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" >

          <div class="invalid-feedback">
            Slug Harus Diisi
          </div>
        </div>
        
        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select class="form-select" name="category_id" required>

            <option selected>Pilih Kategori</option>
            @foreach ($categories as $c )
            @if (old('category_id') == $c->judul)
            <option value="{{ $c->id }}" selected>{{ $c->judul }}</option>
            @else    
            <option value="{{ $c->id }}">{{ $c->judul }}</option>
            @endif
                
            @endforeach
            
          </select>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Pilih Gambar</label>
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
          <label for="isi" class="form-label">Berita</label>
          <input id="isi" type="hidden" name="isi" value="{{ old('isi') }}">
          <trix-editor input="isi"></trix-editor>

         @error('isi')
         <p class="text-danger">Berita Harus Diisi</p>
         @enderror

        </div>

        <button type="submit" class="btn btn-primary">Ok</button>
      </form>
</div>

<script>
    //  
  const judul = document.querySelector('#judul');
  const slug = document.querySelector('#slug');

  judul.addEventListener('change', function(){
    fetch('/dashboard/news/checkSlug?title=' +judul.value)
    .then(response => response.json())
      .then(data => slug.value = data.slug);

// $('#judul').change(function(e){
//   $.get('{{ route('slug') }}', {'judul' : $(this).val},
//   function(data){
//     $('#slug').val(data.slug);
//   }
  
  
//   );
// });



  // });

  // document.addEventListener('trix-file-accept', function(e){
  //   e.preventDefault();
  // })

  // UNTUK PREVIEW IMAGE
// function previewImage(){
//   const image = document.querySelector('#image');
//   const imgPreview = document.querySelector('.img-preview');

//   imgPreview.style.display = 'block';

//   const oFReader = new FileReader();
//   oFReader.readAsDataURL(image.files.[0]);

//   oFReader.onload =function(oFREvent){
//     imgPreview.src = oFREvent.target.result;
//   }
// }
</script> 
</div>


@endsection