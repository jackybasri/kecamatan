@extends('dashboard.layout.utama')

@section('container')
<div class="container-fluid">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah User</h1>        
    </div>
<div class="row">
  <div class="col-lg-8">

    {{-- JIKA SUPER ADMIN, DAPAT MENAMBAH USER DI SEMUA KECAMATAN --}}
    @if(auth()->user()->user_role_id == '1')    
    <form action="/dashboard/users" method="post" enctype="multipart/form-data">
      @csrf
        <div class="mb-3">
          <div class="form-group">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama" required value="{{ old('name') }}">
            {{-- <label for="name">Nama</label> --}}
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name ="username" placeholder="username" required value="{{ old('username') }}">
            {{-- <label for="username">Username</label> --}}
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="alamat email" name="email" required value="{{ old('email') }}">
            {{-- <label for="email">Alamat Email</label> --}}
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="password" name="password" required>
            {{-- <label for="floatingPassword">Password</label> --}}
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div> 

          <div class="mb-3">
            <label for="user_role_id" class="form-label">User Role</label>
            <select class="form-select" name="user_role_id" required>
              
              <option selected>Pilih Role</option>
              @foreach ($roles as $role )
              {{-- @if (old('category_id') == $c->judul)
              <option value="{{ $c->id }}" selected>{{ $c->judul }}</option> --}}
              {{-- @else     --}}
              <option value="{{ $role->id }}">{{ $role->name }}</option>
              {{-- @endif --}}
                  
              @endforeach
              
            </select>
          </div>
          <div class="mb-3">
            <label for="daerah_id" class="form-label">Kecamatan</label>
            <select class="form-select" name="daerah_id" required>
  
              <option selected>Pilih Kecamatan</option>
              @foreach ($daerah as $d )
              
              <option value="{{ $d->id }}">{{ $d->kecamatan }}</option>
              {{-- @endif --}}
                  
              @endforeach
              
            </select>
          </div>
          
        <br>
        <button type="submit" class="btn btn-primary">Ok</button>
      </form>

      @else
      <form action="/dashboard/user" method="post" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <div class="form-group">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama" required value="{{ old('name') }}">
              {{-- <label for="name">Nama</label> --}}
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
  
            <div class="form-group">
              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name ="username" placeholder="username" required value="{{ old('username') }}">
              {{-- <label for="username">Username</label> --}}
              @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
  
            <div class="form-group">
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="alamat email" name="email" required value="{{ old('email') }}">
              {{-- <label for="email">Alamat Email</label> --}}
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="password" name="password" required>
              {{-- <label for="floatingPassword">Password</label> --}}
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div> 
  
            <div class="mb-3">
              <label for="user_role_id" class="form-label">User Role</label>
              <select class="form-select" name="user_role_id" required>
                
                <option selected>Pilih Role</option>
                @foreach ($role as $r )
                <option value="{{ $r->id }}">{{ $r->name }}</option>
                @endforeach
                
              </select>
            </div>
            
          <br>
          <button type="submit" class="btn btn-primary">Ok</button>
        </form>

      @endif
</div>
</div>

<script>
  
 
</script> 


@endsection