<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Untels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <nav class="navbar navbar-light bg-main">
        <div class="container p-4">
            <a class="navbar-brand m-auto" href="#">
                <img src="{{asset('images/untels.png')}}" width="120" alt="" loading="lazy">
            </a>
        </div>
    </nav>
<!-- Oscar --->
        <div class="row justify-content-center">
        <div class="col-10">
        <div class="row">

            <nav class="text-center my-5">
                <h4>Universidad Nacional Tecnológica de Lima Sur</h4>
            </nav>
            <div class="col-sm-12 my-2  text-center">
                                <a href="{{route('login')}}" class="btn btn-block btn-success">Iniciar Sesion</a>
                            </div>
                            <div class="col-sm-12 my-2  text-center">
                                <a   href="{{route('register')}}" class="btn btn-block btn-success">Registrarse</a>
                            </div>
                <div class="col-md-6 col-6 justify-content-center mb-5">
                    <div class="card m-auto" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('images/egresados.jpg')}}" alt="Post Linkedin">
                        <div class="card-body">
                            <h5 class="card-title my-2 text-center"></h5>


                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-6 justify-content-center mb-5">
                        <div class="card m-auto" style="width: 18rem;">
                            <img class="card-img-top" src="{{asset('images/administradores.jpg')}}" alt="Post Linkedin">
                            <div class="card-body">
                                <h5 class="card-title my-2 text-center"></h5>


                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>

<!--oscar -->
 <!-- Contenido -->
 <section class="container-fluid content">
    <!-- Categorías -->
    <div class="row justify-content-center">
        <div class="col-10 col-md-12">
            <nav class="text-center my-5">
                <a href="#" class="mx-3 pb-3 link-category d-block d-md-inline selected-category" >Noticias</a>

            </nav>
        </div>
    </div>

    <!-- Posts -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="row">
                <!-- Post 1 -->
                <div class="col-md-4 col-12 justify-content-center mb-5">
                    <div class="card m-auto" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('images/linkedin.jpg')}}" alt="Post Linkedin">
                        <div class="card-body">
                            <small class="card-txt-category">Categoría: Programación</small>
                            <h5 class="card-title my-2">Aprende Python en un dos tres</h5>
                            <div class="d-card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Sed voluptatum ab cumque quisquam quod nesciunt fugiat,
                                eius corrupti nulla veniam, molestias nemo repudiandae?
                            </div>
                            <a href="https://pe.linkedin.com/" class="post-link"><b>Ir a</b></a>
                            <hr>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <span class="card-txt-author">Untels</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Post 2 -->
                <div class="col-md-4 col-12 justify-content-center mb-5">
                    <div class="card m-auto" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('images/cti_vitae.jpg')}}" alt="Post cti_vitae">
                        <div class="card-body">
                            <small class="card-txt-category">Categoría: Programación</small>
                            <h5 class="card-title my-2">Aprende Python en un dos tres</h5>
                            <div class="d-card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Sed voluptatum ab cumque quisquam quod nesciunt fugiat,
                                eius corrupti nulla veniam, molestias nemo repudiandae?
                            </div>
                            <a href="https://portal.concytec.gob.pe/index.php/informacion-cti/cti-vitae" class="post-link"><b>Ir a</b></a>
                            <hr>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <span class="card-txt-author">Untels</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Post 3 -->
                <div class="col-md-4 col-12 justify-content-center mb-5">
                    <div class="card m-auto" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('images/elempleo.png')}}" alt="Post Python">
                        <div class="card-body">
                            <small class="card-txt-category">Categoría: Programación</small>
                            <h5 class="card-title my-2">Aprende Python en un dos tres</h5>
                            <div class="d-card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Sed voluptatum ab cumque quisquam quod nesciunt fugiat,
                                eius corrupti nulla veniam, molestias nemo repudiandae?
                            </div>
                            <a href="https://www.elempleo.com/" class="post-link"><b>Ir a</b></a>
                            <hr>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <span class="card-txt-author">Untels</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <!-- Paginador -->

        </div>
    </div>
</section>

<!-- Footer -->
<footer class="container-fluid bg-main">
    <div class="row text-center p-4">
        <div class="mb-3">
            <img src="{{asset('images/footer.png')}}" alt="untels logo" width="180" id="logofooter">
        </div>
        <div id="col-md-10">
            <a target="_blank" href="https://www.facebook.com/untelsperu">
                <img src="{{asset('images/facebook.png')}}" class="img-fluid" width="40px" alt="facebook untelss">
            </a>
            <a target="_blank" href="https://www.instagram.com/untelsoficial">
                <img src="{{asset('images/instagram.png')}}" class="img-fluid" width="40px" alt="instagram untels">
            </a>
            <a target="_blank" href="https://www.youtube.com/c/UniversidadNacionalTecnológicadeLimaSur">
                <img src="{{asset('images/youtube.png')}}" class="img-fluid" width="40px" alt="youtube untels">
            </a>
            <p class="mt-3">Copyright © 2021 Untels <br> Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
<!--opcion 1 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!--opcion 2 -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->

</body>
</html>
