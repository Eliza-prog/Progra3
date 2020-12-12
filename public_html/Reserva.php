<!DOCTYPE html>



<html >
    <head>
        <meta charset="UTF-8">
        <title>Avión</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

        <link rel="stylesheet" type="text/css" href="CSS/Estilo.css" />

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="js/JavaScript.js" type="text/JavaScript"></script>
        <!--<script src="js/pruebaTabla.js" type="text/JavaScript"></script>-->


    </head>
    <body >
        <div class="container">
            <div class="row">


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
