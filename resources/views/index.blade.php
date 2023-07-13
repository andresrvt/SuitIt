@extends('template')

<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <div class="main" id="top">
       
        <div class="pb-11 bg-light-gradient border-bottom border-white border-5">
            <div class="bg-holder overlay overlay-light"
                style="background-image:url(assets/img/gallery/header-bg.png);background-size:cover;">
            </div>
            <!--/.bg-holder-->
        

            <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

            <div class="container-fluid !direction !spacing  ">
                <h3 class="fs-3 fs-lg-5 lh-sm mt-5 centrado">Busca tus prendas</h3>
                <div class="hero-section">
                    <div class="carta-grid">
                        @foreach (\App\Models\Category::all() as $category)
                        
                            <a class="carta" href="armario/{{$category->name}}">
                                <div class="carta__background"
                                    style="background-image:url(assets/img/gallery/{{$category->image}})"></div>
                                <div class="carta__content">
                                    <p class="carta__category">Categoría</p>
                                    <h3 class="carta__heading">Encuentra tus {{ $category->name}}</h3>
                                </div>
                            </a>

                        @endforeach

                        {{-- <a class="carta" href="#">
                            <div class="carta__background"
                                style="background-image:url(assets/img/gallery/fondopantalones.png)"></div>
                            <div class="carta__content">
                                <p class="carta__category">Categoría</p>
                                <h3 class="carta__heading">Encuentra tus camisetas/camisas</h3>
                            </div>
                        </a>
                        <a class="carta" href="#">
                            <div class="carta__background"
                                style="background-image:url(assets/img/gallery/fondocamisas.png)"></div>
                            <div class="carta__content">
                                <p class="carta__category">Categoría</p>
                                <h3 class="carta__heading">Encuentra tus pantalones</h3>
                            </div>
                        </a>
                        <a class="carta" href="#">
                            <div class="carta__background"
                                style="background-image:url(assets/img/gallery/fondozapatos.png)"></div>
                            <div class="carta__content">
                                <p class="carta__category">Categoría</p>
                                <h3 class="carta__heading">Encuentra tus zapatos</h3>
                            </div> --}}
                        </a>
                        <div>
                    </div>
            </div>
        </div>
        <h3 class="fs-3 fs-lg-5 lh-sm mt-5 centrado">Añadir prendas generales</h3>
        <div class="d-flex justify-content-center align-items-center">
            <div id="carouselExampleControls" class="carousel slide w-50" data-bs-ride="carousel">
              <div class="carousel-inner">
                @php $count = 0; @endphp
                @foreach ($clothes->chunk(4) as $chunk)
                  @php $active = ($count == 0) ? 'active' : ''; @endphp
                  <div class="carousel-item {{ $active }}">
                    <div class="row justify-content-center">
                      @foreach ($chunk as $clo)
                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0">
                          <div class="card rounded text-white">
                            <img class="card-img-top" src="assets/img/gallery/{{$clo->image}}" alt="...">
                            <div class="card-body text-center">
                              <h5 class="card-title fw-bold text-truncate text-center">{{$clo->name}}</h5>
                              <a href="{{ route('wardrobe.addArticle', [$clo->id, 1]) }}" class="btn-sm button mt-2 text-center justify-center text-decoration-none">
                                Añadir al armario

                              </a>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                  @php $count++; @endphp
                @endforeach
              </div>
          
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa-solid fa-chevron-right"></i></span>
                <span class="visually-hidden">Next</span>
              </button>
              <a href="{{ route('importGeneral') }}" class="btn-sm button mt-2 text-center justify-center text-decoration-none botonImportar">Importar todas las prendas</a>
            </div>
          </div>
          
        
        <section>

            <div class="container">
              <h3 class="fs-3 fs-lg-5 lh-sm mt-5 centrado">Crea tu estilo</h3>
                <div class="row h-100 g-0">
                    <div class="col-md-6">
                        <div class="bg-300 p-4 h-100 d-flex flex-column justify-content-center">
                            <h1 class="fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6">Entra al creador de outfits </h1>
                            <p class="mb-5 fs-1">En el creador de outfits podras encontrar un estilo ideal a corde a tus gustos personales</p>
                            <div class="d-grid gap-2 d-md-block"><a class="btn btn-lg btn-dark" href="#!"
                                    role="button">Entrar ya</a></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-span h-100 text-white"><img class="card-img h-100"
                                src="assets/img/gallery/sharp-dress.png" alt="..." /><a class="stretched-link"
                                href="#!"></a></div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->
        <h3 class="fs-3 fs-lg-5 lh-sm mt-5 centrado">Blog de modas</h3> 
        <article class="col-md-12 e">
          <!-- Modern - Bootstrap Cards -->
          <header>
            </header>
          <div class="cards-2 section-gray">
              <div class="container">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="card card-blog">
                              <div class="card-image">
                                  <a href="#"> <img class="img img-raised" src="https://images.pexels.com/photos/936722/pexels-photo-936722.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"> </a>
                                  <div class="ripple-cont"></div>
                              </div>
                              <div class="table">
                                  <h6 class="category text-info">Masculinea</h6>
                                  <h4 class="card-caption">
                      <a href="https://masculinea.com/">Ha sido considerado uno de los mejores blogs de moda masculina este año.</a>
                    </h4>
                                  <p class="card-description"> ¿Te has cansado de que tu estilo de vestir siempre sea el mismo? ¿Tienes mucha ropa en tu armario, pero no sabes que ponerte? ¿Quieres aprender a vestir de manera más minimalista, pero darle un toque más personalizado a tu estilo? Pues bien, todas las respuestas las puedes encontrar en Masculinea.com. </p>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="card card-blog">
                              <div class="card-image">
                                  <a href="#"> <img class="img img-raised" src="https://images.pexels.com/photos/2422461/pexels-photo-2422461.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"> </a>
                              </div>
                              <div class="table">
                                  <h6 class="category text-danger">Mr.Boy</h6>
                                  <h4 class="card-caption">
                      <a href="#">Karlmond Tang ha sido conocido como uno de los ego-blogs más sofisticados de Reino Unido.</a>
                    </h4>
                                  <p class="card-description">No nos parece extraño que en cada semana de la moda masculina en Londres sea uno de los influencers más cotizados.

                                    Lo que encontraremos en su blog es un portafolio completo de Street Style con las últimas tendencias en moda masculina.</p><br>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="card card-blog">
                              <div class="card-image">
                                  <a href="#"> <img class="img img-raised" src="https://images.pexels.com/photos/169647/pexels-photo-169647.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"> </a>
                              </div>
                              <div class="table">
                                  <h6 class="category text-success">Mariano Di Vaio</h6>
                                  <h4 class="card-caption">
                      <a href="#">Mariano Di Vaio es el referente del público masculino.</a>
                    </h4>
                                  <p class="card-description">¡Cuenta con más de cinco millones de seguidores en sus redes sociales!
                                    En su blog podremos encontrar las siguientes temáticas:
                                    Últimas tendencias en la moda masculina, con especial mención a la moda italiana y sobre todo pasarelas de Milán y Roma.</p><br><br>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- PROFILE CARDS 1 -->
          <h3>Creadores</h3>
          <div class="cards-5 section-gray">
              <div class="container">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="card card-profile">
                              <div class="card-avatar">
                                  <a href="#"> <img class="img" src="https://images.pexels.com/photos/3190334/pexels-photo-3190334.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"> </a>
                              </div>
                              <div class="table">
                                  <h4 class="card-caption">Pedro Martín</h4>
                                  <h6 class="category text-muted">CEO / Co-Founder</h6>
                                  <p class="card-description"> Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is... </p>
                                  <div class="ftr">  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="card card-profile">
                              <div class="card-avatar">
                                  <a href="#"> <img class="img" src="https://images.pexels.com/photos/3370021/pexels-photo-3370021.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"> </a>
                              </div>
                              <div class="table">
                                  <h4 class="card-caption">Andrés Repiso</h4>
                                  <h6 class="category text-muted">Front End Developer</h6>
                                  <p class="card-description"> Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is... </p>
                                  <div class="ftr"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="card card-profile">
                              <div class="card-avatar">
                                  <a href="#"> <img class="img" src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"> </a>
                              </div>
                              <div class="table">
                                  <h4 class="card-caption">Óscar Povea</h4>
                                  <h6 class="category text-muted">Web Designer</h6>
                                  <p class="card-description"> Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is... </p>
                                  <div class="ftr"></div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

        </div>
    @extends('layout/footer')