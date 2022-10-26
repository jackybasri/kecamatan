<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Kecamatan {{ auth()->user()->daerah['kecamatan'] }}</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">

    <nav class="navbar navbar-expand-lg bg-dark">
      <div class="container">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white">
                {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/">Halaman Depan</a></li>                
                <li>
                  <form action="/logout" method="post">
                    {{-- SETIAP ADA FORM MASUKKAN CSRF --}}
                    
                    @csrf
                    <button type="submit" class="nav-link px-3 border-0">Logout <span data-feather="log-out" class="align-text-bottom"></span></button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
  </header>