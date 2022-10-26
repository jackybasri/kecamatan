
    @can('reporter')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/dashboard/beritas/create" class="btn btn-primary mb-3">Tambah Berita</a>

    </div>
    @endcan

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @can('reporter')
    <h1 class="h2">Postingan Saya</h1>
    @if ($berita->count())
    <div class="table-responsive col lg-8">
        {{-- <a href="/dashboard/beritas/create" class="btn btn-primary mb-3">Tambah Berita</a> --}}
        
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($berita as $b )                   
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $b->judul }}</td>
                    <td>{{ $b->category->judul }}</td>
                    <td>
                        @if($b->status->id =='4')
                        <a href="/dashboard/revisi/{{ $b->slug }}/alasan">{{ $b->status->nama }}</a>
                        @elseif($b->status->id =='5')
                        <a href="/dashboard/reject/{{ $b->slug }}/alasan">{{ $b->status->nama }}</a>
                        @else
                        {{ $b->status->nama }}
                        @endif
                    
                    </td>
                    <td>
                        <a href="/dashboard/berita/{{ $b->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>

                        @if ($b->status_id == '2' || $b->status_id == '4')
                        <a href="/dashboard/beritas/{{ $b->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                        @endif
                            
                        
                       @if ($b->status_id == '2')                           
                       <form action="/dashboard/beritas/{{ $b->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Yakin menghapus data?')"><span data-feather="x-circle"></span></button>
                        
                        </form>
                        @endif
                        
                        @if ($b->status_id =='2' || $b->status_id == '4')                        
                        
                        <form action="/dashboard/kirim/{{ $b->slug }}" method="post" class="d-inline" enctype="multipart/form-data">
                            {{-- @method('patch') --}}
                            @csrf
                            <button class="badge bg-dark border-0" onclick="return confirm('Yakin mengirim berita?')"><span data-feather="check-square"></span></button>

                        </form>
                        @endif
                        
                        @can('admin')
                        <form action="/dashboard/publish/{{ $b->slug }}" method="post" class="d-inline" enctype="multipart/form-data">
                            {{-- @method('patch') --}}
                            @csrf
                            <button class="badge bg-dark border-0" onclick="return confirm('Yakin publish berita?')"><span data-feather="check-square"></span></button>

                        </form>
                        @endcan
                        
                    </td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Tidak Ada Berita yang Diposting</h6>
    </div>
    @endif
    @endcan
    <br>
   
    {{-- MENAMPILKAN SEMUA BERITA YANG DIPOSTING OLEH USER DARI SEMUA KECAMATAN --}}
    {{-- UNTUK SUPER ADMIN --}}
    @if(auth()->user()->user_role_id =='1')
    <div class="table-responsive col lg-8">
        <h1 class="h2">Daftar Berita</h1>
        
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post )                   
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->judul }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->category->judul }}</td>
                    <td>{{ $post->user->daerah->kecamatan}}</td>
                    <td>
                        @if($post->status->id =='4')
                        <a href="/dashboard/revisi/{{ $post->slug }}/alasan">{{ $post->status->nama }}</a>
                        
                        @elseif($post->status->id =='5')
                        <a href="/dashboard/reject/{{ $post->slug }}/alasan">{{ $post->status->nama }}</a>
                        @else                        
                        {{ $post->status->nama }}
                        @endif
                    </td>
                    <td>
                        <a href="/dashboard/berita/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                                              
                       @can('admin')
                        @if ($post->status_id =='3')
                            
                        <form action="/dashboard/publish/{{ $post->slug }}" method="post" class="d-inline" enctype="multipart/form-data">
                            {{-- @method('patch') --}}
                            @csrf
                            <button class="badge bg-dark border-0" onclick="return confirm('Yakin publish berita?')"><span data-feather="check-square"></span></button>
                            
                        </form>
                        

                        <a href="/dashboard/revisi/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="alert-circle"></span></a>
                        @endif

                        @if ($post->status_id == '3')
                            
                        <a href="/dashboard/reject/{{ $post->slug }}/edit" class="badge bg-danger"><span data-feather="x-circle"></span></a>
                        @endif
                        @endcan
                        {{-- <form action="/dashboard/reject/{{ $b->slug }}" method="post" class="d-inline">                            
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Yakin menolak berita?')"><span data-feather="x-circle"></span></button>
                            
                            </form> --}}
                        {{-- <form action="/dashboard/revisi/{{ $post->slug }}" method="post" class="d-inline" enctype="multipart/form-data"> --}}
                            {{-- @method('patch') --}}
                            {{-- @csrf
                            <button class="badge bg-warning border-0" onclick="return confirm('Yakin revisi berita?')"><span data-feather="alert-circle"></span></button>

                        </form> --}}
                    </td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- MENAMPILKAN SEMUA BERITA SESUAI DENGAN KECAMATAN USER YANG SEDANG LOGIN --}}
    {{-- UNTUK VERIFIKATOR, REPORTER, DAN ADMIN --}}
    @else
    <div class="table-responsive col lg-8">
        <h1 class="h2">Daftar Berita</h1>
        
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($post as $p )                   
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->judul }}</td>
                    <td>{{ $p->user->name }}</td>
                    <td>{{ $p->category->judul }}</td>
                    <td>{{ $p->user->daerah->kecamatan}}</td>
                    <td>
                        @if($p->status->id =='4')
                        <a href="/dashboard/revisi/{{ $p->slug }}/alasan">{{ $p->status->nama }}</a>
                        
                        @elseif($p->status->id =='5')
                        <a href="/dashboard/reject/{{ $p->slug }}/alasan">{{ $p->status->nama }}</a>
                        @else                        
                        {{ $p->status->nama }}
                        @endif
                    </td>
                    <td>
                        <a href="/dashboard/berita/{{ $p->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                                              
                       @can('admin')
                        @if ($p->status_id =='3')
                            
                        <form action="/dashboard/publish/{{ $p->slug }}" method="post" class="d-inline" enctype="multipart/form-data">
                            {{-- @method('patch') --}}
                            @csrf
                            <button class="badge bg-dark border-0" onclick="return confirm('Yakin publish berita?')"><span data-feather="check-square"></span></button>
                            
                        </form>
                        

                        <a href="/dashboard/revisi/{{ $p->slug }}/edit" class="badge bg-warning"><span data-feather="alert-circle"></span></a>
                        @endif

                        @if ($p->status_id == '3')
                            
                        <a href="/dashboard/reject/{{ $p->slug }}/edit" class="badge bg-danger"><span data-feather="x-circle"></span></a>
                        @endif
                        @endcan
                        
                        {{-- <form action="/dashboard/reject/{{ $b->slug }}" method="post" class="d-inline">                            
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Yakin menolak berita?')"><span data-feather="x-circle"></span></button>
                            
                            </form> --}}
                        {{-- <form action="/dashboard/revisi/{{ $post->slug }}" method="post" class="d-inline" enctype="multipart/form-data"> --}}
                            {{-- @method('patch') --}}
                            {{-- @csrf
                            <button class="badge bg-warning border-0" onclick="return confirm('Yakin revisi berita?')"><span data-feather="alert-circle"></span></button>

                        </form> --}}
                    </td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif