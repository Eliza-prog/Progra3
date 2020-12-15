<?php
$templateTitle = 'Mantenimiento de  los Tipos de Avion';
$templateScripts = '<script type="text/javascript" src="js/AvionFunctions.js"></script>';
$templatePageHeader = '<h1><Nombre Sistema><small> Mantenimiento de los Tipos de Avion</small><img src="img/logo_1.png" align="right"/></h1>';

include_once("template/templateHead.php");
?>

<!-- ********************************************************** -->
<!-- ********************************************************** -->
<!-- ********************************************************** -->
<div class="row">
    <div class="col-md-12">
        <form role="form" onsubmit="return false;" id="formAvion">
            <div class="row">
                <!-- ******************************************************** -->
                <!-- Campos de formulario      -->
                <!-- ******************************************************** -->
                <div class="col-md-12">

                    <div class="form-group" id="groupidAvion">
                        <label for="txtidAvion">idAvion</label>
                        <input type="text" class="form-control" id="txtidAvion"  placeholder="idAvion">
                    </div>
                    <div class="form-group" id="groupFecha">
                        <label for="txtFecha">Fecha</label>
                        <input type="text" class="form-control" id="txtFecha"  placeholder="Fecha">
                    </div>
                    <div class="form-group" id="groupModelo">
                        <label for="txtModelo">Modelo</label>
                        <input type="text" class="form-control" id="txtModelo"  placeholder="Modelo">
                    </div>
                    <div class="form-group" id="groupMarca">
                        <label for="txtMarca">Marca</label>
                        <input type="text" class="form-control" id="txtMarca"  placeholder="Marca">
                    </div>
                    <div class="form-group" id="groupFila">
                        <label for="txtFila">Fila</label>
                        <input type="text" class="form-control" id="txtFila"  placeholder="Fila">
                    </div>
                    <div class="form-group" id="groupAsiento_Fila">
                        <label for="txtAsiento_Fila">Asiento_Fila</label>
                        <input type="text" class="form-control" id="txtAsiento_Fila"  placeholder="Asiento_Fila">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="typeAction" value="add_Avion" />
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
<h3>Tabla con informacion de los  Aviones </h3>
<br><br>
<div class="row">
    <div class="col-md-12">
         <table id="dt_Avion"  class="table  table-hover dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>IDAVION</th>
                    <th>FECHA</th>
                    <th>MODELO</th>
                    <th>MARCA</th>
                    <th>FILA</th>
                    <th>ASIENTO DE LA FILA</th>
                    <th>ACCION</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<?php
include_once("template/templateFooter.php");
?>
