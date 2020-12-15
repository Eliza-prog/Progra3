<?php
$templateTitle = 'Mantenimiento de la Reservacion';
$templateScripts = '<script type="text/javascript" src="js/ReservacionFunctions.js"></script>';
$templatePageHeader = '<h1><Nombre Sistema><small> Mantenimiento de la Reservacion</small><img src="img/logo_1.png" align="right"/></h1>';

include_once("template/templateHead.php");
?>

<!-- ********************************************************** -->
<!-- ********************************************************** -->
<!-- ********************************************************** -->
<div class="row">
    <div class="col-md-12">
        <form role="form" onsubmit="return false;" id="formReservacion">
            <div class="row">
                <!-- ******************************************************** -->
                <!-- Campos de formulario      -->
                <!-- ******************************************************** -->
                <div class="col-md-12">

                    <div class="form-group" id="groupidReservacion">
                        <label for="txtidReservacion">idReservacion</label>
                        <input type="text" class="form-control" id="txtidReservacion"  placeholder="idReservacion">
                    </div>
                    <div class="form-group" id="groupNumero_Fila">
                        <label for="txtNumero_Fila">Numero de Fila</label>
                        <input type="text" class="form-control" id="txtNumero_Fila"  placeholder="Numero de Fila">
                    </div>
                    <div class="form-group" id="groupNumero_Asiento">
                        <label for="txtNumero_Asiento">Numero de Asiento</label>
                        <input type="text" class="form-control" id="txtNumero_Asiento"  placeholder="Numero de Asiento">
                    </div>
                    <div class="form-group" id="groupVuelo_id_Vuelo">
                        <label for="txtVuelo_id_Vuelo">Vuelo_id_Vuelo</label>
                        <input type="text" class="form-control" id="txtVuelo_id_Vuelo"  placeholder="idVuelo">
                    </div>
                    <div class="form-group" id="groupFecha_Reserva">
                        <label for="txtFecha_Reserva">Fecha_Reserva</label>
                        <input type="text" class="form-control" id="txtFecha_Reserva"  placeholder="Fecha_Reserva">
                    </div>
                    <div class="form-group" id="groupPersona_Cliente1">
                        <label for="txtPersona_Cliente1">Persona Cliente1</label>
                        <input type="text" class="form-control" id="txtPersona_Cliente1"  placeholder="Persona Cliente1">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="typeAction" value="add_Reservacion" />
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
<h3>Tabla con informacion de la Reservacion</h3>
<br><br>
<div class="row">
    <div class="col-md-12">
        <table id="dt_reservacion"  class="table  table-hover dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID RESERVACION</th>
                    <th>NUMERO DE FILA</th>
                    <th>NUMERO DE ASIENTO</th>
                    <th>ID VUELO</th>
                    <th>FECHA RESERVA</th>
                    <th>PERSONA CLIENTE1</th>
                    <th>ACCION</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<?php
include_once("template/templateFooter.php");
?>

