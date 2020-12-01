
<html>
    <head>
        <title>TRAVELING EARTH</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="img/LogoPeque.png">
   

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="js/PersonaFunctions.js"></script>

        <script src="lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
        <link href="lib/sweetAlert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>

        <script src="js/utils.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/PersonaFunctions.js"></script>
    </head>

    <body >
        <form >
            <h2>Registro</h2> 
            <br>
            <section class="col-md-12">
                <h5>Datos personales</h5>
                <table> 
                    <tr>                    
                        <td>
                            <input type="text" id="PK_cedula" placeholder="Cedula"> 
                            <input type="text" id="nombre" placeholder="Nombre"> 
                            <input type="text" id="apellido1" placeholder="Primer apellido"> 
                            <input type="text" id="apellido2" placeholder="Segundo apellido">
                            <H5>Fecha de nacimiento</H5>
                            <input type="date" id=""><H5>Genero</H5>
                            <select id="sexo">
                                <option>Masculino</option>
                                <option>Femenino</option>
                                <option>prefiero no especificar</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </section>
            <section class="col-md-12">
                <input type="hidden" id="typeAction" value="add_personas" />
                <button type="submit" id="enviar" href="Registro.php" >Registrar</button>
                <button type="reset" id="cancelar">cancelar</button>
                <br>
                <br>
                <br>
                <br>
            </section>
        </form>
    </body>
</html>

