@extends('layouts.utama')


@section('container')

<section class="project-detail section-padding-half">
    <div class="container">
         <div class="row">

              <div class="col-lg-9 mx-auto col-md-10 col-12 mt-lg-5 text-center" data-aos="fade-up">              
                
                <h1>{{ $post->judul }}</h1>                
              </div>

         </div>
    </div>
</section>

<div class="full-image text-center" data-aos="zoom-in">
    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="blog header">
  </div>

  <section class="project-detail">
    <div class="container">
         <div class="row">

            <div class="col-lg-9 mx-auto col-md-11 col-12 my-5 pt-3" data-aos="fade-up">

              <p>{!! $post->isi !!}</p>
              </div>
         </div>

        <div class="col-lg-8 mx-auto mb-5 pb-5 col-12" data-aos="fade-up">        
         
            <div class="row">
                <div class="col-lg-9 mx-auto col-md-10 col-12 text-center" data-aos="fade-up">          
                    <a href="/destinasi" class="btn btn-info">Kembali</a>               
                  </div>

             
            </div>
          
        </div>
        
    </div>
    
</section>



@endsection
