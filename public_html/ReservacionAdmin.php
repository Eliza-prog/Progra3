<?php
$templateTitle = 'Mantenimiento de Personas';
$templateScripts = '<script type="text/javascript" src="js/personasFunctions.js"></script>';
$templatePageHeader = '<h1><Nombre Sistema><small> Mantenimiento de Personas</small><img src="img/logo/logo.png" align="right"/></h1>';

include_once("template/templateHead.php");
?>

<!-- ********************************************************** -->
<!-- ********************************************************** -->
<!-- ********************************************************** -->
<div class="row">
    <div class="col-md-12">
        <form role="form" onsubmit="return false;" id="formPersonas">
            <div class="row">
                <!-- ******************************************************** -->
                <!-- Campos de formulario      -->
                <!-- ******************************************************** -->
                <div class="col-md-12">

                    <div class="form-group" id="groupPK_cedula">
                        <label for="txtPK_cedula">PK_cedula</label>
                        <input type="text" class="form-control" id="txtPK_cedula"  placeholder="PK_cedula">
                    </div>
                    <div class="form-group" id="groupnombre">
                        <label for="txtnombre">nombre</label>
                        <input type="text" class="form-control" id="txtnombre"  placeholder="nombre">
                    </div>
                    <div class="form-group" id="groupapellido1">
                        <label for="txtapellido1">apellido1</label>
                        <input type="text" class="form-control" id="txtapellido1"  placeholder="apellido1">
                    </div>
                    <div class="form-group" id="groupapellido2">
                        <label for="txtapellido2">apellido2</label>
                        <input type="text" class="form-control" id="txtapellido2"  placeholder="apellido2">
                    </div>
                    <div class="form-group" id="groupfecNacimiento">
                        <label for="txtfecNacimiento">fecNacimiento</label>
                        <input type="text" class="form-control" id="txtfecNacimiento"  placeholder="fecNacimiento">
                    </div>
                    <div class="form-group" id="groupsexo">
                        <label for="txtsexo">sexo</label>
                        <input type="text" class="form-control" id="txtsexo"  placeholder="sexo">
                    </div>
                    <div class="form-group" id="groupobservaciones">
                        <label for="txtobservaciones">observaciones</label>
                        <input type="text" class="form-control" id="txtobservaciones"  placeholder="observaciones">
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

