
<html>
    <head>
        <title>TRAVELING EARTH</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="js/PruebaFuntions.js"></script>

        <script src="lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
        <link href="lib/sweetAlert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>

        <script src="js/utils.js" type="text/javascript"></script>
        
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
                        </td>
                    </tr>
                </table>
            </section>
            <section class="col-md-12">
                <input type="hidden" id="typeAction" value="add_personas" />
                <button type="submit" id="enviar"  >Registrar</button>
                <button type="reset" id="cancelar">cancelar</button>
                <br>
                <br>
                <br>
                <br>
            </section>
        </form>
    </body>
</html>

