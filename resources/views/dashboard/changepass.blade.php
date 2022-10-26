@extends('dashboard.layout.utama')

@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2" style="color: black">Ubah Password</h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="container-fluid">
        <div class="row justify-content-left">
            <div class="col-md-4">
        
              {{-- TAMPILKAN PESAN BERHASIL REGISTRASI --}}
        
              {{-- @if(session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Sukses
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif --}}
        
            
            <main class="form-signin w-100 m-auto mb-20">
                <form action="{{ route('password.update') }}" method="post">
                  @csrf
                  <br>
                    
                  {{-- <div class="form-floating col-lg-20">                    
                    <input type="password" class="form-control @error('currentpassword') is-invalid @enderror" id="current" name="current" placeholder="Password Lama" required>
                    @error('currentpassword')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div> --}}
        
                  <div class="form-floating">                    
                    <input type="password" class="form-control @error('newpassword') is-invalid @enderror" id="password" name ="password" placeholder="Password Baru" required>
                    @error('newpassword')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
        
                  
                  {{-- <div class="form-floating">
                    <input type="password" class="form-control @error('confirm') is-invalid @enderror" id="confirmed" placeholder="Konfirmasi Baru" name="confirmed" required>
                    @error('confirmed')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>    --}}
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Ganti Password</button>
                  
                </form>
                
              </main>
            </div>
        </div>
    </div>
    </div>

</div>
    

  

    
@endsection
