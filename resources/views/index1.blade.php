@extends('layouts.utama')

@section('container')


     <!-- MENU BAR -->
    {{-- <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
              
              Kecamatan Rengat
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#about" class="nav-link smoothScroll">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a href="#project" class="nav-link smoothScroll">Berita</a>
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
                        <a href="contact.html" class="nav-link contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}


     <!-- HERO -->
     <section class="hero hero-bg d-flex justify-content-center align-items-center">
               <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-md-10 col-12 d-flex flex-column justify-content-center align-items-center">
                              <div class="hero-text">

                                   <h1 class="text-white" data-aos="fade-up">Selamat Datang di Website Resmi Kecamatan Rengat</h1>

                                   <a href="contact.html" class="custom-btn btn-bg btn mt-3" data-aos="fade-up" data-aos-delay="100">Hubungi Kami</a>

                                   <strong class="d-block py-3 pl-5 text-white" data-aos="fade-up" data-aos-delay="200"><i class="fa fa-phone mr-2"></i> +99 080 070 4224</strong>
                              </div>
                        </div>

                        <div class="col-lg-6 col-12">
                          <div class="hero-image" data-aos="fade-up" data-aos-delay="300">

                            <img src="images/working-girl.png" class="img-fluid" alt="working girl">
                          </div>
                        </div>

                    </div>
               </div>
     </section>


     <!-- ABOUT -->
     <section class="about section-padding pb-0" id="about">
          <div class="container">
               <div class="row">

                    <div class="col-lg-7 mx-auto col-md-10 col-12">
                         <div class="about-info">

                              <h2 class="mb-4" data-aos="fade-up">{{ $profil[0]->judul }}</h2>

                              <p class="mb-0" data-aos="fade-up">{!! $profil[0]->isi !!}</p>
                         </div>

                         <div class="about-image" data-aos="fade-up" data-aos-delay="200">

                          <img src="{{ asset('storage/' .$profil[0]->image) }}" class="img-fluid" alt="office">
                        </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- PROJECT -->
     <section class="project section-padding" id="project">
          <div class="container-fluid">
               <div class="row">

                    <div class="col-lg-12 col-12">

                        <h2 class="mb-5 text-center" data-aos="fade-up">
                            Berita Terkini
                        </h2>

                         <div class="owl-carousel owl-theme" id="project-slide">
                              <div class="item project-wrapper" data-aos="fade-up" data-aos-delay="100">
                                   <img src="{{ asset('storage/' . $post[1]->image) }}" class="img-fluid" alt="project image">

                                   <div class="project-info">
                                        <small>{{ $post[1]->category->judul }}</small>

                                        <h3>
                                             <a href="project-detail.html">
                                                  <span>{{ $post[1]->judul }}</span>
                                                  <i class="fa fa-angle-right project-icon"></i>
                                             </a>
                                        </h3>
                                   </div>
                              </div>

                              <div class="item project-wrapper" data-aos="fade-up">
                                   <img src="{{ asset('storage/' . $post[2]->image) }}" class="img-fluid" alt="project image">

                                   <div class="project-info">
                                        <small>{{ $post[2]->category->judul }}</small>

                                        <h3>
                                             <a href="project-detail.html">
                                                  <span>{{ $post[2]->judul }}</span>
                                                  <i class="fa fa-angle-right project-icon"></i>
                                             </a>
                                        </h3>
                                   </div>
                              </div>

                              <div class="item project-wrapper" data-aos="fade-up">
                                   <img src="{{ asset('storage/' . $post[3]->image) }}" class="img-fluid" alt="project image">

                                   <div class="project-info">
                                        <small>{{ $post[3]->category->judul }}</small>

                                        <h3>
                                             <a href="project-detail.html">
                                                  <span>{{ $post[3]->judul }}</span>
                                                  <i class="fa fa-angle-right project-icon"></i>
                                             </a>
                                        </h3>
                                   </div>
                              </div>

                              <div class="item project-wrapper" data-aos="fade-up">
                                   <img src="{{ asset('storage/' . $post[4]->image) }}" class="img-fluid" alt="project image">

                                   <div class="project-info">
                                        <small>{{ $post[4]->category->judul }}</small>

                                        <h3>
                                             <a href="project-detail.html">
                                                  <span>{{ $post[4]->judul }}</span>
                                                  <i class="fa fa-angle-right project-icon"></i>
                                             </a>
                                        </h3>
                                   </div>
                              </div>

                              <div class="item project-wrapper" data-aos="fade-up">
                                   <img src="{{ asset('storage/' . $post[5]->image) }}" class="img-fluid" alt="project image">

                                   <div class="project-info">
                                        <small>{{ $post[5]->category->judul }}</small>

                                        <h3>
                                             <a href="project-detail.html">
                                                  <span>{{ $post[5]->judul }}</span>
                                                  <i class="fa fa-angle-right project-icon"></i>
                                             </a>
                                        </h3>
                                   </div>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- TESTIMONIAL -->
     <section class="testimonial section-padding">
          <div class="container">
               <div class="row">

                    <div class="col-lg-6 col-md-5 col-12">
                        <div class="contact-image" data-aos="fade-up">

                          <img src="images/female-avatar.png" class="img-fluid" alt="website">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-7 col-12">
                      <h4 class="my-5 pt-3" data-aos="fade-up" data-aos-delay="100">{{ $post[0]->judul }}</h4>

                      <div class="quote" data-aos="fade-up" data-aos-delay="200"></div>

                      <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">{{ $post[0]->excerpt }}</h2>

                      <p data-aos="fade-up" data-aos-delay="400">
                        <strong>Penulis : {{ $post[0]->user->username }}</strong>

                        <span class="mx-1"></span>

                        
                      </p>
                    </div>

               </div>
          </div>
     </section>
@endsection

  

     


