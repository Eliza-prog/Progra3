<?php
$templateTitle = 'Mantenimiento de Personas';
$templateScripts = '<script type="text/javascript" src="js/PersonaFunctions.js"></script>';
$templatePageHeader = '<h1><Nombre Sistema><small> Mantenimiento de Personas</small><img src="img/logo_1.png" align="right"/></h1>';

include_once("template/templateHead.php");
?>

<!-- ********************************************************** -->
<!-- ********************************************************** -->
<!-- ********************************************************** -->
<div class="row">
    <div class="col-md-12">
        <form role="form" onsubmit="return false;" id="formPersona">
            <div class="row">
                <!-- ******************************************************** -->
                <!-- Campos de formulario      -->
                <!-- ******************************************************** -->
                <div class="col-md-12">

                    <div class="form-group" id="groupcliente">
                        <label for="txtcliente">Cliente</label>
                        <input type="text" class="form-control" id="txtcliente"  placeholder="Cliente">
                    </div>
                    <div class="form-group" id="groupcontrasena">
                        <label for="txtcliente">Contrasena</label>
                        <input type="text" class="form-control" id="txtcontrasena"  placeholder="contrasena">
                    </div>
                    <div class="form-group" id="groupnombre">
                        <label for="txtnombre">Nombre</label>
                        <input type="text" class="form-control" id="txtnombre"  placeholder="Nombre">
                    </div>
                    <div class="form-group" id="groupapellido1">
                        <label for="txtapellido1">apellido1</label>
                        <input type="text" class="form-control" id="txtapellido1"  placeholder="apellido1">
                    </div>
                    <div class="form-group" id="groupapellido2">
                        <label for="txtapellido2">apellido2</label>
                        <input type="text" class="form-control" id="txtapellido2"  placeholder="apellido2">
                    </div>
                     <div class="form-group" id="groupcorreo">
                        <label for="txtcorreo">Correo</label>
                        <input type="text" class="form-control" id="txtcorreo"  placeholder="Correo">
                    </div>
                    <div class="form-group" id="groupfecha_nacimiento">
                        <label for="txtfecha_nacimiento">Fecha Nacimiento</label>
                        <input type="text" class="form-control" id="txtfecha_nacimiento"  placeholder="Fecha Nacimiento">
                    </div>
                    <div class="form-group" id="groupdireccion">
                        <label for="txtdireccion">Direccion</label>
                        <input type="text" class="form-control" id="txtdireccion"  placeholder="Direccion">
                    </div>
                     <div class="form-group" id="grouptelefono1">
                        <label for="txttelefono1">telefono1</label>
                        <input type="text" class="form-control" id="txttelefono1"  placeholder="telefono1">
                     </div>
                    <div class="form-group" id="groupsexo">
                        <label for="txtsexo">sexo</label>
                        <input type="text" class="form-control" id="txtsexo"  placeholder="sexo">
                    </div>
                   
                    <div class="form-group">
                        <input type="hidden" id="typeAction" value="add_Persona"/>
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
         <table id="dt_personas"  class="table  table-hover dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>CLIENTE</th>
                    <th>CONTRASENA</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO1</th>
                    <th>APELLIDO2</th>
                    <th>CORREO</th>
                    <th>FEC. NACIMIENTO</th>
                    <th>DIRECCION</th>
                    <th>TELEFONO1</th>
                    <th>SEXO</th>
                    <th>ACCION</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<?php
include_once("template/templateFooter.php");
?>
