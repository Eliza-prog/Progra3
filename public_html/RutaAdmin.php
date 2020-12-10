<?php
$templateTitle = 'Mantenimiento de las Rutas';
$templateScripts = '<script type="text/javascript" src="js/RutaFunctions.js"></script>';
$templatePageHeader = '<h1><Nombre Sistema><small> Mantenimiento de las Rutas</small><img src="img/logo/logo.png" align="right"/></h1>';

include_once("template/templateHead.php");
?>

<!-- ********************************************************** -->
<!-- ********************************************************** -->
<!-- ********************************************************** -->
<div class="row">
    <div class="col-md-12">
        <form role="form" onsubmit="return false;" id="formRuta">
            <div class="row">
                <!-- ******************************************************** -->
                <!-- Campos de formulario      -->
                <!-- ******************************************************** -->
                <div class="col-md-12">

                    <div class="form-group" id="groupidRuta">
                        <label for="txtidRuta">idRuta</label>
                        <input type="text" class="form-control" id="txtidRuta"  placeholder="idRuta">
                    </div>
                    <div class="form-group" id="groupTrayecto">
                        <label for="txtTrayecto">Trayecto</label>
                        <input type="text" class="form-control" id="txtTrayecto"  placeholder="Trayecto">
                    </div>
                    <div class="form-group" id="groupDuracion">
                        <label for="txtDuracion">Duracion</label>
                        <input type="text" class="form-control" id="txtDuracion"  placeholder="Duracion">
                    </div>
                    <div class="form-group" id="groupPrecio">
                        <label for="txtPrecio">Precio</label>
                        <input type="text" class="form-control" id="txtPrecio"  placeholder="Precio">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="typeAction" value="add_personas" />
                        <input type="hidden" value="" id="idTarea"/>
                        <button type="submit" class="btn btn-primary" id="enviar">Guardar</button>
                        <button type="reset" class="btn btn-danger" id="cancelar">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<br>
<h3>Tabla con informacion de personas</h3>
<br><br>
<div class="row">
    <div class="col-md-12">
        <div id="divResult" style="text-align:center;">Resultado de la consulta</div>
    </div>
</div>
<?php
include_once("template/templateFooter.php");
?>

