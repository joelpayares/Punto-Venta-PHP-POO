<?php
require_once("../Cabezera/Cabezera.php");

?>    

        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">

                        <form name="formulario" id="formulario" method="POST" action="../../Controlador/Cliente/IngresarCliente.php">
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Rut(*):</label>
                            <!--<input type="hidden" name="idarticulo" id="idarticulo">-->
                            <input type="text" class="form-control" name="rut" autocomplete="off" id="rut" maxlength="100" placeholder="Ingresa Rut Cliente " onkeypress="return permite(event, 'num') " >
                          </div>
                         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre(*):</label>
                            <input type="text" class="form-control" name="Nombre" autocomplete="off" id="Nombre" maxlength="100" placeholder="Ingresa Nombre Cliente"  onkeypress="return permite(event, 'car') ">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Apellido:</label>
                            <input type="text" class="form-control" autocomplete="off" name="apellido" id="apellido" maxlength="256" placeholder="Ingrese Apellido " onkeypress="return permite(event, 'car') ">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Direccion(*):</label>
                            <input type="text" class="form-control" autocomplete="off" name="direccion" id="direccion" onkeypress="return permite(event, 'car') "  placeholder="Ingrese Direccion " >
                          </div>
                          
                          
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Número Telefono:</label>
                            <input type="number" class="form-control" name="telefono" id="telefono" maxlength="25" placeholder="Ingrese Telefono Contacto" onkeypress="return permite(event, 'num') ">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" id="email" maxlength="50" placeholder="Email">
                          </div>



                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Estado(*):</label>
                            <select id="Estado" name="Estado" class="form-control selectpicker" data-live-search="true" >
                              <option>Seleccione</option>
                              <option  value="1" >Activo</option>
                              <option value="0"  >Inactivo</option>
                            </select>
                          </div>



                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" name="Ejecuta" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-edit" type="button"><a href="categoria.php" class="fa fa-arrow-circle-left">Atras</button></a>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
   <!--Fin-Contenido-->

<?php
require_once("../Footer/Pie.php");

?>  