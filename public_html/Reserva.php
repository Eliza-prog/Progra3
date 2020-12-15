<!DOCTYPE html>



<html >
    <head>
        <meta charset="UTF-8">
        <title>Avión</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

        <link rel="stylesheet" type="text/css" href="CSS/Estilo.css" />
        <script src="lib/jquery/dist/jquery.min.js" type="text/javascript"></script>

        <!-- common css. required for every page-->
        <script src="lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="js/ReservacionFunctions.js" type="text/JavaScript"></script>
        <script src="js/JavaScript.js" type="text/JavaScript"></script>
        <!--<script src="js/pruebaTabla.js" type="text/JavaScript"></script>-->


    </head>
    <body >
        <div class="container">
            <div class="row">

                <div class="Vuelo">
                    <a>Escoger Vuelo</a>
                    <select>
                        <option id="txtVuelo_id_Vuelo" value="1">Costa Rica - Panama</option>
                        <option id="txtVuelo_id_Vuelo" value="2">Costa Rica - Estados unidos</option>
                        <option id="txtVuelo_id_Vuelo" value="3">Costa Rica - Argentina</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-group-tm2">
                        <input  type="text" placeholder="Dijite su cedula" id="txtPersona_Usuario1">
                    </div>
                    <button type="submit" class="btn btn-primary" id="Reservar">Registrar</button>
                    <button type="reset" class="btn btn-danger" id="cancelar">Cancelar</button>
                </div>
                <div class="row">
                    <div class="col sm 12">


                        <div id="avion-container" class="asientos table-responsive-sm ">
                            <a>Escoger asientos</a>



                            <script>
                                function cambiarBack(elemento) {
                                    if (elemento.getAttribute("class") == "escoger asiento") {
                                        elemento.setAttribute("class", "desocupado asiento");
                                    } else {
                                        elemento.setAttribute("class", "escoger asiento");
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>

    </body>
</html>
