
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
        <link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
        <link rel="stylesheet" href="css/tooplate-style.css"> 

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
        <div class="tm-main-content" id="top">
            <div class="tm-section tm-bg-img" id="tm-section-1">
                <div class="tm-bg-white ie-container-width-fix-2">
                    <div class="container ie-h-align-center-fix">
                        <div class="row">
                            <div class="col-xs-12 ml-auto mr-auto ie-container-width-fix">
                                <form role="form" onsubmit="return false;" id="formPersona">
                                    <div class="row">

                                        <div class="col-md-8">

                                            <div class="form-group" id="groupusuario">
                                                <br>
                                                <br>
                                                <label for="txtusuario">Usuario</label>
                                                <input type="text" class="form-control" id="txtusuario"  placeholder="Cedula">
                                            </div>
                                            <div class="form-group" id="groupusuario">
                                                <label for="txtusuario">Contrasena</label>
                                                <input type="text" class="form-control" id="txtcontrasena"  placeholder="Cedula">
                                            </div>
                                            <div class="form-group" id="groupnombre">
                                                <label for="txtnombre">Nombre</label>
                                                <input type="text" class="form-control" id="txtnombre"  placeholder="Nombre">
                                            </div>
                                            <div class="form-group" id="groupapellido1">
                                                <label for="txtapellido1">apellido1</label>
                                                <input type="text" class="form-control" id="txtapellido1"  placeholder="apellido1">
                                            </div>
                                            <div class="form-group" id="groupapellido2">
                                                <label for="txtapellido2">apellido2</label>
                                                <input type="text" class="form-control" id="txtapellido2"  placeholder="apellido2">
                                            </div>
                                            <div class="form-group" id="groupapellido2">
                                                <label for="txtcorreo">Correo</label>
                                                <input type="text" class="form-control" id="txtcorreo"  placeholder="Correo">
                                            </div>
                                            <div class="form-group" id="groupfecha_nacimiento">
                                                <label for="txtfecha_nacimiento">Fecha Nacimiento</label>
                                                <input type="text" class="form-control" id="txtfecha_nacimiento"  placeholder="Fecha Nacimiento">
                                            </div>
                                            <div class="form-group" id="groupfecha_nacimiento">
                                                <label for="txtfecha_nacimiento">Direccion</label>
                                                <input type="text" class="form-control" id="txtdireccion"  placeholder="Fecha Nacimiento">
                                            </div>
                                            <div class="form-group" id="grouptelefono1">
                                                <label for="txttelefono1">telefono1</label>
                                                <input type="text" class="form-control" id="txttelefono1"  placeholder="telefono1">
                                            </div>
                                            <div class="form-group" id="groupfecha_nacimiento">
                                                <label for="txttelefono2">telefono2</label>
                                                <input type="text" class="form-control" id="txttelefono2"  placeholder="telefono2">
                                            </div>
                                            <div class="form-group" id="grouptipo_usuario">
                                                <label for="txttipo_usuario">tipo_usuario</label>
                                                <input type="text" class="form-control" id="txttipo_usuario"  placeholder="tipo_usuario">
                                            </div>
                                            <div class="form-group" id="groupsexo">
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>