<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        <title>TRAVELING EARTH</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="CSS/main.css" />
        <noscript><link rel="stylesheet" href="CSS/noscript.css" /></noscript>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="img/LogoPeque.png">
        <link rel="stylesheet"  href="CSS/Estilos.css"/>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="js/RegistroFunctions.js"></script>
    </head>

    <body class="is-preload wrapper style2 aln-center row" >
        <form class="form inner">
            <h2>Registro</h2> 
            <br>
            <section class="col-md-12">
                <h5>Datos personales</h5>
                <table> 
                    <tr>
                        <td>
                            <H5>Datos de registro</H5>
                            <input type="text" id="NombreUsuario" placeholder="Nombre de usuario"> 
                            <input type="password" id="Contraseña" placeholder="Contraseña"> 
                            <input type="email" id="Email" placeholder="Email"> 
                        </td>
                    </tr>
                </table>
            </section>
            <section class="col-md-12">
                <input type="hidden" id="typeAction" value="add_personas" />
                <button type="submit" id="Registrar">Registrar</button>
                <button type="reset" id="cancelar">cancelar</button>
                <br>
                <br>
                <br>
                <br>
                <div>
                    <h3>Email</h3>
                    <a>traveling.earth2020@gmail.com</a>
                    <h3 >Telefono</h3>
                    <span>(506) 0000-0000</span>
                </div>
            </section>
            <section>
                <ul class="icons">
                    <li><a href="https://twitter.com/TravelingEarth2" class="icon brands "><img src="img/twiter.png"> <span class="label">Twitter</span></a></li>
                    <li><a href="https://www.facebook.com/Traveling-Earth-110924384140006" class="icon brands "><img src="img/Face.png"><span class="label">Facebook</span></a></li>                               
                    <li><a href="https://www.instagram.com/traveling.earth2020/" class="icon brands "><img src="img/Insta.png"><span class="label">Instagram</span></a></li>                         
                </ul>
            </section>
        </form>
    </body>
</html>


