@extends('dashboard.layout.utama')

@section('container')
<div class="container-fluid" style="color: black">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kategori</h1>        
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-6">
        <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Tambah Kategori</a>
        
        <table class="table table-striped table-sm" style="color: black">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategori</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category )                   
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->judul }}</td>
                    
                    <td>                        
                        <a href="/dashboard/categories/{{ $category->slug }}/edit" class="button btn-circle btn-warning btn-sm"><i class="fas fa-pen"></i></a>

                        <form action="/dashboard/categories/{{ $category->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-circle btn-danger btn-sm" onclick="return confirm('Yakin menghapus data?')"><i class="fas fa-trash"></i></button>
                            
                        </form>
                    </td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    
@endsection


