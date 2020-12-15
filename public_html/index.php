<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="img/LogoPeque.png">
        <title>Traveling Earth</title>
        <!--
        
        Template 2095 Level
        
        http://www.tooplate.com/view/2095-level
        
        -->
        <!-- load stylesheets -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">  <!-- Google web font "Open Sans" -->
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">                <!-- Font Awesome -->
        <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
        <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
        <link rel="stylesheet" href="css/tooplate-style.css"> 
        <link rel="stylesheet" href="css/popup.css"> 

        <link href="lib/bootstrap/dist/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css"/>
        <link href="lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="lib/bootstrap/dist/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css"/>
        <link href="lib/animate.css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="lib/sweetAlert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">



        <!-- Templatemo style -->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
    </head>

    <body>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalTitle">Modal Header</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="myModalMessage">
                        <p>This is a small modal.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="tm-main-content" id="top">
            <div class="tm-top-bar-bg"></div>
            <div class="tm-top-bar" id="tm-top-bar">
                <!-- Top Navbar -->
                <div class="container">
                    <div class="row">

                        <nav class="navbar navbar-expand-lg narbar-light">
                            <a class="navbar-brand mr-auto" href="#">
                                <img src="img/LogoPeque.png" alt="Site logo">
                                Traveling Earth
                            </a>
                            <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#top">Inicio <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tm-section-4">Portfolio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tm-section-5">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tm-section-6">Contactenos</a>
                                    </li>

                                    <li class="nav-item" id="admin">
                                        <a class="nav-link" href="Mantenimientos.php">Administrar</a>
                                    </li>



                                </ul>
                            </div>                            
                        </nav>            
                    </div>
                </div>
            </div>
            <div class="tm-section tm-bg-img" id="tm-section-1">
                <div class="tm-bg-white ie-container-width-fix-2">
                    <div class="container ie-h-align-center-fix">
                        <div class="row">
                            <div class="col-xs-12 ml-auto mr-auto ie-container-width-fix">


                                <div id="shadow" ></div>
                                <div class="row">
                                    <!-- ******************************************************** -->
                                    <!-- Campos de formulario      -->
                                    <!-- ******************************************************** -->

                                    <div>
                                        <div>
                                            <div id="profile">

                                                <p><button id="Login" class="btn btn-primary">Login</button></p>
                                                <p><button id="Registro" class="btn btn-primary">Registro</button></p>


                                                <div id="ContenidoLogin">
                                                    <div >
                                                        <h2>Login</h2>
                                                        <a id="cerrar" href="#">&times;</a>
                                                        <div >
                                                            <div class="err" id="add_err"></div>
                                                            <form >
                                                                <label>Dijite la cedula:</label>
                                                                <input type="text" id="user_name"/>
                                                                <label>Contraseña:</label>
                                                                <input type="password" id="password"/>
                                                                <label></label><br/>
                                                                <input type="submit" id="login" class="btn btn-primary" value="Login" />
                                                                <input type="reset" id="cancel_hide"  class="cerrar btn btn-primary" value="Cancel" />
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form role="form" onsubmit="return false;" id="formPersona">
                                        <div class="col-md-12">

                                            <div id="ContenidoRegistro">


                                                <div class="form-group-tm1" id="groupcliente">
                                                    <br>
                                                    <br>
                                                    <label for="txtcliente">cliente/Cedula</label>
                                                    <input type="text" class="form-control" id="txtcliente"  placeholder="Cedula">
                                                </div>
                                                <div class="form-group-tm2" id="groupcliente">
                                                    <label for="txtcliente">Contrasena</label>
                                                    <input type="text" class="form-control" id="txtcontrasena"  placeholder="Cedula">
                                                </div>
                                                <div class="form-group-tm1" id="groupnombre">
                                                    <label for="txtnombre">Nombre</label>
                                                    <input type="text" class="form-control" id="txtnombre"  placeholder="Nombre">
                                                </div>
                                                <div class="form-group-tm2" id="groupapellido1">
                                                    <label for="txtapellido1">apellido1</label>
                                                    <input type="text" class="form-control" id="txtapellido1"  placeholder="apellido1">
                                                </div>
                                                <div class="form-group-tm1" id="groupapellido2">
                                                    <label for="txtapellido2">apellido2</label>
                                                    <input type="text" class="form-control" id="txtapellido2"  placeholder="apellido2">
                                                </div>
                                                <div class="form-group-tm2" id="groupapellido2">
                                                    <label for="txtcorreo">Correo</label>
                                                    <input type="text" class="form-control" id="txtcorreo"  placeholder="Correo">
                                                </div>
                                                <div class="form-group-tm1" id="groupfecha_nacimiento">
                                                    <label for="txtfecha_nacimiento">Fecha Nacimiento</label>
                                                    <input type="text" class="form-control" id="txtfecha_nacimiento"  placeholder="Fecha Nacimiento">
                                                </div>
                                                <div class="form-group-tm2" id="groupfecha_nacimiento">
                                                    <label for="txtfecha_nacimiento">Direccion</label>
                                                    <input type="text" class="form-control" id="txtdireccion"  placeholder="Fecha Nacimiento">
                                                </div>
                                                <div class="form-group-tm1" id="grouptelefono1">
                                                    <label for="txttelefono1">telefono1</label>
                                                    <input type="text" class="form-control" id="txttelefono1"  placeholder="telefono1">
                                                </div>
                                                <div class="form-group-tm1" id="grouptipo_cliente">
                                                    <label for="txttipo_cliente">tipo_cliente</label>
                                                    <input type="text" class="form-control" id="txttipo_cliente"  placeholder="tipo_cliente">
                                                </div>
                                                <div class="form-group-tm2" id="groupsexo">
                                                    <label for="txtsexo">sexo</label>
                                                    <input type="text" class="form-control" id="txtsexo"  placeholder="sexo">
                                                </div>

                                                <div class="form-group">
                                                    <input type="hidden" id="typeAction" value="add_Persona"/>
                                                    <input type="hidden" value="" id="idTarea"/>
                                                    <button type="submit" class="btn btn-primary" id="enviar">Registrar</button>
                                                    <button type="reset" class="btn btn-danger" id="cancelar">Cancelar</button>
                                                </div>


                                            </div>
                                        </div>
                                </div>

                            </div>
                            </form>
                        </div>

                    </div>                        
                </div>      
            </div>
        </div>                 
    </div>

    <div class="tm-section-2">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2 class="tm-section-title">Estamos aquí para ayudarle</h2>
                    <p class="tm-color-white tm-section-subtitle">Suscribase a nuesto noticiero</p>

                </div>                
            </div>
        </div>        
    </div>

    <div class="tm-section tm-position-relative">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" class="tm-section-down-arrow">
        <polygon fill="#ee5057" points="0,0  100,0  50,60"></polygon>                   
        </svg> 
        <div class="container tm-pt-5 tm-pb-4">
            <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">                           
                <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Login/Registrar</a>                                   
            </article> 
            <div class="row text-center">
                <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">                            
                    <i class="fa tm-fa-6x fa-legal tm-color-primary tm-margin-b-20"></i>
                    <h3 class="tm-color-primary tm-article-title-1">justicia para todos</h3>
                    <p>Sabemos que a veces los precios pueden ser excesivos por eso velamos que los precios de nuestros servisios sean justos para todas las personas.</p>
                </article>
                <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">                            
                    <i class="fa tm-fa-6x fa-plane tm-color-primary tm-margin-b-20"></i>
                    <h3 class="tm-color-primary tm-article-title-1">Vuelos modernos y de la mejor calidad</h3>
                    <p>Contamos con una flotilla de aviones de los mas modernos por eso la comodidad es algo que siempre va a estar presente en cada vuelo.</p>
                </article>
                <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">                           
                    <i class="fa tm-fa-6x fa-life-saver tm-color-primary tm-margin-b-20"></i>
                    <h3 class="tm-color-primary tm-article-title-1">Viaja de forma segura con nosotros</h3>
                    <p>En Traveling Earth nos preocupamos por el bienestar de nuestros clientes, por eso contamos con lo nesesario para cualquier emergencia.</p>                                         
                </article>    
            </div>
            <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">
                <a href="Reserva.php"><h1 class="tm-color-primary tm-article-title-1">Reservar un vuelo</h1></a> 
            </article>
        </div>

    </div>

    <div class="tm-section tm-section-pad tm-bg-gray" id="tm-section-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <div class="tm-article-carousel">                            
                        <article class="tm-bg-white mr-2 tm-carousel-item">
                            <img src="img/img-01.jpg" alt="Image" class="img-fluid">
                            <div class="tm-article-pad">
                                <header><h3 class="text-uppercase tm-article-title-2">PARIS</h3></header>
                                <p>Paris es la capital de Francia y su ciudad más poblada. Capital de la región de Isla de Francia (o "Región Parisina"), constituye el único departamento unicomunal del país.</p>
                                <a href="#" class="text-uppercase btn-primary tm-btn-primary">Get More Info.</a>
                            </div>                                
                        </article>                    
                        <article class="tm-bg-white mr-2 tm-carousel-item">
                            <img src="img/img-02.jpg" alt="Image" class="img-fluid">
                            <div class="tm-article-pad">
                                <header><h3 class="text-uppercase tm-article-title-2">BRASIL</h3></header>
                                <p>Brasil es un vasto país de Sudamérica que se extiende desde la Cuenca del Amazonas en el norte hasta los viñedos y las enormes cataratas del Iguazú en el sur. Río de Janeiro, simbolizado por su estatua de 38 m del Cristo Redentor sobre el cerro del Corcovado, es famoso por sus ajetreadas playas Copacabana e Ipanema, junto con su enorme y estridente festival del Carnaval, que cuenta con carros alegóricos, exuberantes disfraces y danza y música samba..</p>
                                <a href="#" class="text-uppercase btn-primary tm-btn-primary">View Detail</a>
                            </div>                                
                        </article>
                        <article class="tm-bg-white mr-2 tm-carousel-item">
                            <img src="img/tailandia.jpg" alt="Image" class="img-fluid">
                            <div class="tm-article-pad">
                                <header><h3 class="text-uppercase tm-article-title-2">TAILANDIA</h3></header>
                                <p>Tailandia es un país del Sudeste Asiático. Es famoso por sus playas tropicales, los opulentos palacios reales, las ruinas antiguas y los templos adornados con figuras de Buda. En Bangkok, la capital, un paisaje urbano ultramoderno se alza junto a las tranquilas comunidades a orillas de los canales y a los icónicos templos de Wat Arun, Wat Pho y el Templo del Buda de Esmeralda (Wat Phra Kaew). Entre los centros turísticos en las playas cercanas, se encuentran el desbordante Pattaya y el moderno Hua Hin</p>
                                <a href="#" class="text-uppercase btn-primary tm-btn-primary">More Info.</a>
                            </div>                                
                        </article>
                        <article class="tm-bg-white mr-2 tm-carousel-item">
                            <img src="img/Noruega.jpg" alt="Image" class="img-fluid">
                            <div class="tm-article-pad">
                                <header><h3 class="text-uppercase tm-article-title-2">NORUEGA</h3></header>
                                <p>Noruega es un país escandinavo que incluye montañas, glaciares y profundos fiordos costeros. Oslo, su capital, es una ciudad de áreas verdes y museos. En el Museo de barcos vikingos de Oslo, se muestran navíos vikingos preservados del siglo IX. Bergen, con coloridas casas de madera, es el punto de partida de los cruceros hacia el sorprendente fiordo de Sogn. Noruega también es famosa por la pesca, el excursionismo y el esquí, especialmente en el centro olímpico Lillehammer</p>
                                <a href="#" class="text-uppercase btn-primary tm-btn-primary">Detail Info.</a>
                            </div>                                
                        </article>                    
                        <article class="tm-bg-white mr-2 tm-carousel-item">
                            <img src="img/Escocia.jpg" alt="Image" class="img-fluid">
                            <div class="tm-article-pad">
                                <header><h3 class="text-uppercase tm-article-title-2">Escocia</h3></header>
                                <p>Escocia, el país más septentrional del Reino Unido, es una tierra de áreas naturales en montañas, como los Cairngorms y las Tierras Altas del Noroeste, intercaladas con valles glaciales y lagos. Sus ciudades principales son Edimburgo, la capital, con su incónico castillo sobre un cerro, y Glasgow, famosa por su animado ambiente cultural. Escocia también es famosa por el golf, cuyo primer partido se disputó en el campo Old Course de St Andrews en el siglo XV.</p>
                                <a href="#" class="text-uppercase btn-primary tm-btn-primary">Read More</a>
                            </div>                                
                        </article>
                    </div>    
                </div>

                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-recommended-container">
                    <div class="tm-bg-white">
                        <div class="tm-bg-primary tm-sidebar-pad">
                            <h3 class="tm-color-white tm-sidebar-title">Lugares Recomendados para ti</h3>
                            <p class="tm-color-white tm-margin-b-0 tm-font-light">Lugares del mundo a los que puedes visitar</p>
                        </div>
                        <div class="tm-sidebar-pad-2">
                            <a href="#" class="media tm-media tm-recommended-item">
                                <img src="img/tn-img-01.jpg" alt="Image">
                                <div class="media-body tm-media-body tm-bg-gray">
                                    <h4 class="text-uppercase tm-font-semibold tm-sidebar-item-title">Europa</h4>
                                </div>                                        
                            </a>
                            <a href="#" class="media tm-media tm-recommended-item">
                                <img src="img/tn-img-02.jpg" alt="Image">
                                <div class="media-body tm-media-body tm-bg-gray">
                                    <h4 class="text-uppercase tm-font-semibold tm-sidebar-item-title">Asia</h4>
                                </div>
                            </a>
                            <a href="#" class="media tm-media tm-recommended-item">
                                <img src="img/tn-img-03.jpg" alt="Image">
                                <div class="media-body tm-media-body tm-bg-gray">
                                    <h4 class="text-uppercase tm-font-semibold tm-sidebar-item-title">Africa</h4>
                                </div>
                            </a>
                            <a href="#" class="media tm-media tm-recommended-item">
                                <img src="img/tn-img-04.jpg" alt="Image">
                                <div class="media-body tm-media-body tm-bg-gray">
                                    <h4 class="text-uppercase tm-font-semibold tm-sidebar-item-title">Sur America</h4>
                                </div>
                            </a>
                        </div>
                    </div>                            
                </div>
            </div>
        </div>
    </div>

    <div class="tm-section tm-section-pad tm-bg-gray" id="tm-section-5">
        <div class="container">
            <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="img/tra1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/tra2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/tra1.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="tm-section tm-section-pad tm-bg-img tm-position-relative" id="tm-section-6">
    <div class="container ie-h-align-center-fix">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-7">
                <div id="google-map"></div>        
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mt-md-0">
                <div class="tm-bg-white tm-p-4">
                    <form action="index.html" method="post" class="contact-form">
                        <div class="form-group">
                            <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Nombre"  required/>
                        </div>
                        <div class="form-group">
                            <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Correo Electronico"  required/>
                        </div>
                        <div class="form-group">
                            <input type="text" id="contact_subject" name="contact_subject" class="form-control" placeholder="Asunto"  required/>
                        </div>
                        <div class="form-group">
                            <textarea id="contact_message" name="contact_message" class="form-control" rows="9" placeholder="Mensaje" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary tm-btn-primary">Enviar mensaje</button>
                    </form>
                </div>                            
            </div>
        </div>        
    </div>
</div>

<footer class="tm-bg-dark-blue">
    <div class="container">
        <div class="row">
            <p class="col-sm-12 text-center tm-font-light tm-color-white p-4 tm-margin-b-0">
                Copyright &copy; <span class="tm-current-year">2018</span> Your Company

                - Design: Tooplate</p>        
        </div>
    </div>                
</footer>
</div>

<!-- load JS files -->
<script src="js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
<script src="js/popper.min.js"></script>                    <!-- https://popper.js.org/ -->       
<script src="js/bootstrap.min.js"></script>                 <!-- https://getbootstrap.com/ -->
<script src="js/datepicker.min.js"></script>                <!-- https://github.com/qodesmith/datepicker -->
<script src="js/jquery.singlePageNav.min.js"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
<script src="slick/slick.min.js"></script>                  <!-- http://kenwheeler.github.io/slick/ -->
<script>

                                        /* Google map
                                         ------------------------------------------------*/
                                        var map = '';
                                        var center;

                                        function initialize() {
                                            var mapOptions = {
                                                zoom: 16,
                                                center: new google.maps.LatLng(13.7567928, 100.5653741),
                                                scrollwheel: false
                                            };

                                            map = new google.maps.Map(document.getElementById('google-map'), mapOptions);

                                            google.maps.event.addDomListener(map, 'idle', function () {
                                                calculateCenter();
                                            });

                                            google.maps.event.addDomListener(window, 'resize', function () {
                                                map.setCenter(center);
                                            });
                                        }

                                        function calculateCenter() {
                                            center = map.getCenter();
                                        }

                                        function loadGoogleMap() {
                                            var script = document.createElement('script');
                                            script.type = 'text/javascript';
                                            script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVWt4rJfibfsEDvcuaChUaZRS5NXey1Cs&v=3.exp&sensor=false&' + 'callback=initialize';
                                            document.body.appendChild(script);
                                        }

                                        function setCarousel() {

                                            if ($('.tm-article-carousel').hasClass('slick-initialized')) {
                                                $('.tm-article-carousel').slick('destroy');
                                            }

                                            if ($(window).width() < 438) {
                                                // Slick carousel
                                                $('.tm-article-carousel').slick({
                                                    infinite: false,
                                                    dots: true,
                                                    slidesToShow: 1,
                                                    slidesToScroll: 1
                                                });
                                            } else {
                                                $('.tm-article-carousel').slick({
                                                    infinite: false,
                                                    dots: true,
                                                    slidesToShow: 2,
                                                    slidesToScroll: 1
                                                });
                                            }
                                        }

                                        function setPageNav() {
                                            if ($(window).width() > 991) {
                                                $('#tm-top-bar').singlePageNav({
                                                    currentClass: 'active',
                                                    offset: 79
                                                });
                                            } else {
                                                $('#tm-top-bar').singlePageNav({
                                                    currentClass: 'active',
                                                    offset: 65
                                                });
                                            }
                                        }

                                        function togglePlayPause() {
                                            vid = $('.tmVideo').get(0);

                                            if (vid.paused) {
                                                vid.play();
                                                $('.tm-btn-play').hide();
                                                $('.tm-btn-pause').show();
                                            } else {
                                                vid.pause();
                                                $('.tm-btn-play').show();
                                                $('.tm-btn-pause').hide();
                                            }
                                        }

                                        $(document).ready(function () {

                                            $(window).on("scroll", function () {
                                                if ($(window).scrollTop() > 100) {
                                                    $(".tm-top-bar").addClass("active");
                                                } else {
                                                    //remove the background property so it comes transparent again (defined in your css)
                                                    $(".tm-top-bar").removeClass("active");
                                                }
                                            });

                                            // Google Map
                                            loadGoogleMap();

                                            // Date Picker
                                            const pickerCheckIn = datepicker('#inputCheckIn');
                                            const pickerCheckOut = datepicker('#inputCheckOut');

                                            // Slick carousel
                                            setCarousel();
                                            setPageNav();

                                            $(window).resize(function () {
                                                setCarousel();
                                                setPageNav();
                                            });

                                            // Close navbar after clicked
                                            $('.nav-link').click(function () {
                                                $('#mainNav').removeClass('show');
                                            });

                                            // Control video
                                            $('.tm-btn-play').click(function () {
                                                togglePlayPause();
                                            });

                                            $('.tm-btn-pause').click(function () {
                                                togglePlayPause();
                                            });

                                            // Update the current year in copyright
                                            $('.tm-current-year').text(new Date().getFullYear());
                                        });

</script> 

<script src="lib/jquery/dist/jquery.min.js" type="text/javascript"></script>

<!-- common css. required for every page-->
<script src="lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
<script src="js/PersonaFunctions.js" type="text/javascript"></script>
<script src="js/FuntionLogin.js" type="text/javascript"></script>
<script src="js/ReservacionFunctions.js" type="text/javascript"></script>
<script src="js/index.js" type="text/javascript"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/JavaScript.js" type="text/JavaScript"></script>

</body>
</html>

