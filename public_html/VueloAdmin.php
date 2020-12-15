<?php
$templateTitle = 'Mantenimiento de Vuelos';
$templateScripts = '<script type="text/javascript" src="js/VueloFunctions.js"></script>';
$templatePageHeader = '<h1><Nombre Sistema><small> Mantenimiento de Vuelos</small><img src="img/logo_1.png" align="right"/></h1>';

include_once("template/templateHead.php");
?>

<!-- ********************************************************** -->
<!-- ********************************************************** -->
<!-- ********************************************************** -->
<div class="row">
    <div class="col-md-12">
        <form role="form" onsubmit="return false;" id="formVuelo">
            <div class="row">
                <!-- ******************************************************** -->
                <!-- Campos de formulario      -->
                <!-- ******************************************************** -->
                <div class="col-md-12">

                    <div class="form-group" id="groupid_Vuelo">
                        <label for="txtid_Vuelo">id_Vuelo</label>
                        <input type="text" class="form-control" id="txtid_Vuelo"  placeholder="id_Vuelo">
                    </div>
                    <div class="form-group" id="groupFecha_Hora">
                        <label for="txtFecha_Hora">Fecha_Hora</label>
                        <input type="text" class="form-control" id="txtFecha_Hora"  placeholder="Fecha_Hora">
                    </div>
                    <div class="form-group" id="groupRuta_idRuta">
                        <label for="txtRuta_idRuta">Ruta_idRuta</label>
                        <input type="text" class="form-control" id="txtRuta_idRuta"  placeholder="Ruta_idRuta">
                    </div>
                    <div class="form-group" id="groupTipo_Avion_idAviones">
                        <label for="txtTipo_Avion_idAviones">Tipo_Avion_idAviones</label>
                        <input type="text" class="form-control" id="txtTipo_Avion_idTipo_Aviones"  placeholder="Tipo_Avion_idTipo_Aviones">
                    </div>       
                    <div class="form-group">
                        <input type="hidden" id="typeAction" value="add_Vuelo" />
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
<h3>Tabla con informacion de los </h3>
<br><br>
<div class="row">
    <div class="col-md-12">
        <table id="dt_reservacion"  class="table  table-hover dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID VUELO</th>
                    <th>FECHA Y HORA</th>
                    <th>NUMERO DE ASIENTO</th>
                    <th>ID RUTA</th>
                    <th>TIPO DE AVION</th>
                    <th>ACCION</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<?php
include_once("template/templateFooter.php");
?>
