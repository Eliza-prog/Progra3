<?php
$templateTitle = 'Mantenimiento de las Rutas';
$templateScripts = '<script type="text/javascript" src="js/RutaFunctions.js"></script>';
$templatePageHeader = '<h1><Nombre Sistema><small> Mantenimiento de las Rutas</small><img src="img/logo_1.png" align="right"/></h1>';

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
                        <input type="text" class="form-control" id="txtRecorrido"  placeholder="Trayecto">
                    </div>
                    <div class="form-group" id="groupDuracion">
                        <label for="txtDuracion">Duracion</label>
                        <input type="text" class="form-control" id="txtTiempo"  placeholder="Duracion">
                    </div>
                    <div class="form-group" id="groupPrecio">
                        <label for="txtPrecio">Precio</label>
                        <input type="text" class="form-control" id="txtValor"  placeholder="Precio">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="typeAction" value="add_Ruta" />
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
<h3>Tabla con informacion de rutas</h3>
<br><br>
<div class="row">
    <div class="col-md-12">
         <table id="dt_Ruta"  class="table  table-hover dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>IDRUTA</th>
                    <th>TRAYECTO</th>
                    <th>DURACION</th>
                    <th>PRECIO</th> 
                    <th>ACCION</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<?php
include_once("template/templateFooter.php");
?>

