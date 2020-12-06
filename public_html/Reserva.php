

<html >
    <head>
        <meta charset="UTF-8">
        <title>Avión</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

        <link rel="stylesheet" type="text/css" href="CSS/Estilos.css" />
        <link rel="stylesheet" href="CSS/main.css" />
        <noscript><link rel="stylesheet" href="CSS/noscript.css" /></noscript>
        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


        <script src="js/AsientosReserva.js" type="text/JavaScript"></script>       
        
        
    </head>
    <body class="">
        <div class="container inner">
            <div class="row">
                <div class="col sm 3">
                    <h2>Datos del avión</h2>
                </div>
                <div class="col sm 3">
                    <h2>*******</h2>
                </div>
            </div>
            <div><h2>Escoger asientos</h2></div>
            <div class="row">
                <div class="col sm 12">
                    <div id="avion-container" class="asientos wrapper style3 fullscreen fade-up">
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

