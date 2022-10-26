@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-4">

      {{-- TAMPILKAN PESAN BERHASIL REGISTRASI --}}

      {{-- @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Sukses
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif --}}

    
    <main class="form-signin w-100 m-auto">
        <form action="/register" method="post">
          @csrf
          <h1 class="h3 mb-3 fw-normal">Daftar Akun</h1>
            
          <div class="form-floating">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama" required value="{{ old('name') }}">
            <label for="name">Nama</label>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-floating">
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name ="username" placeholder="username" required value="{{ old('username') }}">
            <label for="username">Username</label>
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="alamat email" name="email" required value="{{ old('email') }}">
            <label for="email">Alamat Email</label>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="password" name="password" required>
            <label for="floatingPassword">Password</label>
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>   
          <button class="w-100 btn btn-lg btn-primary" type="submit">Daftar</button>
          
        </form>
        <small class="d-block text-center mt-3">Sudah punya akun? <a href="/login">Login di sini</a></small>
      </main>
    </div>
</div>

@endsection