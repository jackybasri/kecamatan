@extends('layouts.utama')


@section('container')

<section class="project-detail section-padding-half">
    <div class="container">
         <div class="row">

              <div class="col-lg-9 mx-auto col-md-10 col-12 mt-lg-5 text-center" data-aos="fade-up">
                <h4 class="blog-category text-info">{{ $post->category->judul }}</h4>
                
                <h1>{{ $post->judul }}</h1>

                <div class="client-info">
                    <div class="d-flex justify-content-center align-items-center mt-3">
                      

                      <p>Penulis : {{ $post->user->username }}</p>
                    </div>
                </div>
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

          <h3 class="my-3" data-aos="fade-up">Leave a comment</h3>

          <form action="/berita" method="get"  class="contact-form" data-aos="fade-up" data-aos-delay="300" role="form">
            <div class="row">
              <div class="col-lg-6 col-12">
                <input type="text" class="form-control" name="name" placeholder="Name">
              </div>

              <div class="col-lg-6 col-12">
                <input type="email" class="form-control" name="email" placeholder="Email">
              </div>

              <div class="col-lg-12 col-12">
                <textarea class="form-control" rows="6" name="message" placeholder="Message"></textarea>
              </div>

              <div class="col-lg-5 mx-auto col-7">
                <button type="submit" class="form-control" id="submit-button" name="submit">Kembali</button>
              </div>
             
              
            </div>
          </form>
          
          <div class="col-lg-5 mx-auto col-7">
            
        </div>
        
    </div>
</section>


                       
        


    

@endsection