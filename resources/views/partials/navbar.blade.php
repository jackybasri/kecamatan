<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(9, 16, 160)">
    <div class="container">
      <a class="navbar-brand" href="home"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ $title === 'Sejarah' || $title === 'Geografis' || $title ==='Visi dan Misi' || $title ==='Prestasi dan Penghargaan'? 'active':'' }}" role="button" data-bs-toggle="dropdown" >
             Profil
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/sejarah">Sejarah</a></li>
              <li><a class="dropdown-item" href="/geografis">Letak Geografis</a></li>
              <li><a class="dropdown-item" href="/visi">Visi dan Misi</a></li>
              <li><a class="dropdown-item" href="/prestasi">Prestasi dan Penghargaan</a></li>
              <li><a class="dropdown-item" href="/potensi">Potensi</a></li>
              <li><a class="dropdown-item" href="/umum">Data Umum</a></li>
              <li><a class="dropdown-item" href="/desa">Desa dan Kelurahan</a></li>
              
            </ul>
          </li>
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" >
            Kepegawaian
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="struktur">Struktur Organisasi</a></li>
              <li><a class="dropdown-item" href="tupoksi">Tupoksi</a></li>
            </ul>
          </li> --}}

          <li class="nav-item">
            <a class="nav-link {{ $title === 'Berita' ? 'active':'' }}  "  href="/berita">Berita</a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" >
           Galeri
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/galeri">Galeri Foto</a></li>
              <li><a class="dropdown-item" href="/galeri">Galeri Video</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link "  href="agenda">Agenda</a>
          </li>

          <li class="nav-item">
            <a class="nav-link "  href="statistik">Data Statistik</a>
          </li>

          

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" >
           Unduhan
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="pengumuman">Pengumuman</a></li>
              <li><a class="dropdown-item" href="dokumen">File Dokumen</a></li>
              <li><a class="dropdown-item" href="laporan">Laporan</a></li>
              <li><a class="dropdown-item" href="regulasi">Regulasi</a></li>
              <li><a class="dropdown-item" href="sambutan">Sambutan</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ $title==='Destinasi Kota Rengat'?'active':'' }}"  href="/destinasi">Destinasi</a>
          </li>
          

          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" >
           Kelembagaan
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="pkk">PKK</a></li>
                <li><a class="dropdown-item" href="wanita">Dharma Wanita</a></li>
                <li><a class="dropdown-item" href="taruna">Karang Taruna</a></li>
                <li><a class="dropdown-item" href="fkk">FKK</a></li>
                <li><a class="dropdown-item" href="lpmk">LPMK</a></li>
                <li><a class="dropdown-item" href="mahasiswa">Ikatan Mahasiswa</a></li>
            </ul>
          </li> --}}

          <li class="nav-item">
            <a class="nav-link "  href="umkm">UMKM</a>
          </li>

          <li class="nav-item">
            <a class="nav-link "  href="kontak">Hubungi Kami</a>
          </li>

          <li class="nav-item">
            <a class="nav-link "  href="administrasi">Administrasi</a>
          </li>

          
        </ul>

        {{-- CEK APAKAH USER SUDAH LOGIN ATAU BELUM --}}
        {{-- JIKA SUDAH (AUTH), TAMPILKAN MENU DROPDOWN USER --}}        
        <ul class="navbar-nav ms-auto">
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->username }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a></li>
              
              <li><hr class="dropdown-divider"></li>
              <form action="/logout" method="post">
                {{-- SETIAP ADA FORM MASUKKAN CSRF --}}
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right">Logout</i></button>
              </form>
              
            </ul>
          </li>
        
        
        {{-- JIKA BELUM (ELSE), TAMPILKAN MENU LOGIN --}}
        @else
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>

              </li>

            </ul>
            
        @endauth
        </ul>
      </div>
    </div>
  </nav>