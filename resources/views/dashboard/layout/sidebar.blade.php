 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      @if(auth()->user()->daerah_id =='15')
      <div class="sidebar-brand-text mx-3">{{ auth()->user()->daerah->kecamatan }} <sup></sup></div>
      @else
      <div class="sidebar-brand-text mx-3">Kecamatan {{ auth()->user()->daerah->kecamatan }} <sup></sup></div>
      @endif
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
      <a class="nav-link" href="/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  @can('admin')
  <div class="sidebar-heading">
      Admin
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Components:</h6>
              <a class="collapse-item" href="buttons.html">Buttons</a>
              <a class="collapse-item" href="cards.html">Cards</a>
          </div>
      </div>
  </li> --}}

  <!-- Nav Item - Utilities Collapse Menu -->
  
  <li class="nav-item">
    <a class="nav-link" href="/dashboard/users">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Kelola User</span></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="/dashboard/categories">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Kategori</span></a>
  </li>
  @endcan

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Post
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
          aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Login Screens:</h6>
              <a class="collapse-item" href="login.html">Login</a>
              <a class="collapse-item" href="register.html">Register</a>
              <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
              <div class="collapse-divider"></div>
              <h6 class="collapse-header">Other Pages:</h6>
              <a class="collapse-item" href="404.html">404 Page</a>
              <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
      </div>
  </li> --}}

  <!-- Nav Item - Charts -->
  @can('admin')
  <li class="nav-item">
    <a class="nav-link" href="/dashboard/profil">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Profil Kecamatan</span></a>
  </li>
  @endcan
  
  @can('admin')
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Destinasi</span>
    </a>
    
    <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            
           
            <a class="collapse-item" href="/dashboard/destinasi/create">Tambah Destinasi</a>            
            <a class="collapse-item" href="{{ route('destinasi.index') }}">Daftar Destinasi</a>
            
           
        </div>
    </div>
</li>
@endcan

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Berita</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            
            @can('reporter')
            <a class="collapse-item" href="/dashboard/beritas/create">Tambah Berita</a>
            @endcan
            <a class="collapse-item" href="/dashboard/berita">Daftar Berita</a>
            @can('reporter')
            <a class="collapse-item" href="/dashboard/mypost">Berita Saya</a>
            @endcan
        </div>
    </div>
</li>
  <!-- Nav Item - Tables -->
  {{-- <li class="nav-item">
      <a class="nav-link" href="/dashboard/berita">
          <i class="fas fa-fw fa-table"></i>
          <span>Berita</span></a>
  </li> --}}

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

  

</ul>
<!-- End of Sidebar -->

