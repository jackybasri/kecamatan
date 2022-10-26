@extends('dashboard.layout.utama')

@section('container')
<div class="container-fluid">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Kategori</h1>        
    </div>
<div class="col-lg-8">

    {{-- SUPAYA FORM BISA MENANGANI FILE, TAMBAHKAN enctype ="multipart/form-data" --}}
    <form action="/dashboard/categories" method="post" enctype="multipart/form-data">
      @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Judul Kategori</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" autofocus value="{{ old('judul') }}">

          
        <br>
        <button type="submit" class="btn btn-primary">Ok</button>
      </form>
</div>

<script>
  
  // {{-- UNTUK MENANGANI SLUG --}} 
  // const judul = document.querySelector('#judul');
  // const slug = document.querySelector('#slug');

  // judul.addEventListener('change', function(){
  //   fetch('/dahsboard/berita/checkSlug?judul=' +judul.value)
  //     .then(response => response.json())
  //     .then(data => slug.value = data.slug);
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