
<?php
require_once("../Cabezera/Cabezera.php");
?>  

  <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Articulo <a href="#formularioregistros"><button class="btn btn-success" onclick="mostrarform(true)" ><i class="fa fa-plus-circle"></i> Añadir </button></a></h1>
                          <h1 class="box-title">Reportes <a href="../../reportes/rptarticulos.php" target="_blank"><button class="btn btn-info"><i class="fa fa-clipboard"></i> Reporte Medicamentos </button></a></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
 
<!-- finn de la Tabla--->
<div class="panel-body" id="formularioregistros">

          <form name="formulario" action="../../Controlador/Articulo/IngresarArticulos_Controller.php" id="formulario" method="POST">

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Codigo(*):</label>
                            <input type="hidden" name="id_producto" id="id_producto">
                            <input type="text" class="form-control" name="codigo" autocomplete="off" id="codigo" maxlength="100" placeholder="Ingresa Nombre Articulos " onkeypress="return permite(event, 'num') " >
                          </div>
                         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre(*):</label>
                            <input type="text" class="form-control" name="Nombre" autocomplete="off" id="Nombre" maxlength="100" placeholder="Ingresa Nombre Articulos " >
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripción:</label>
                            <input type="text" class="form-control" autocomplete="off" name="Descripcion" id="Descripcion" maxlength="256" placeholder="Descripción" onkeypress="return permite(event, 'car') ">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Stock(*):</label>
                            <input type="text" class="form-control" autocomplete="off" name="Stock" id="Stock" onkeypress="return permite(event, 'num') " >
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Stock Minimo(*):</label>
                            <input type="text" class="form-control" autocomplete="off" name="StockMin" id="StockMin" onkeypress="return permite(event, 'num') " >
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Precio Costo (*):</label>
                            <input type="text" class="form-control" autocomplete="off" name="PrecioCosto" id="PrecioCosto" onkeypress="return permite(event, 'num') "  >
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Precio Venta (*):</label>
                            <input type="text" class="form-control" autocomplete="off" name="PrecioVenta" id="PrecioVenta" onkeypress="return permite(event, 'num') " onkeyup="resta()">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Utilidad (*):</label>
                              <input type="text" class="form-control" 
                              onchange="resta()" style="font-size:15px;" 
                              autocomplete="off" name="Utilidad" id="Utilidad" value="0.00"  readonly="readonly" >
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Impuestos (*):</label>
                              <input type="text" class="form-control" 
                              onchange="resta()" style="font-size:15px;" 
                              autocomplete="off" name="impuesto" id="impuesto" value="0.00"  readonly="readonly" >
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Categoría(*):</label>
                            <select id="Id_Categoria" name="Id_Categoria" class="form-control selectpicker " data-live-search="true" >
                                    <option>Seleccione</option>
                                    <!--esto le Pertenece a la opcion que se trae de la base de datos -->
                                    <?php 

                                    $result = $conn->query("SELECT * FROM categoria");    
                                    while($row = $result->fetch(PDO::FETCH_ASSOC)) 
                                      {         
                                             
                                            echo "<option value='".$row['Id_Categoria']."' >";
                                                        echo $row['Descripcion'];
                                            echo "</option>";
                                      }

                                    ?>
                                    <!--Fin de las opciones que trae la base de datos -->
                            </select>
                          </div>
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Estado(*):</label>
                            <select id="Estado" name="Estado" class="form-control selectpicker" data-live-search="true" >
                              <option>Seleccione</option>
                              <option  value="1" >Activo</option>
                              <option value="0"  >Inactivo</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Código Barra:</label>
                            <input type="text" class="form-control" name="CodigoBarra"  autocomplete="off" id="CodigoBarra" placeholder="Código Barras" 
                             onkeypress="return permite(event, 'num_car') ">
                            <br><br>
                            <button class="btn btn-success" type="button" onclick="generarbarcode()">Generar</button>
                            <button class="btn btn-info" type="button" onclick="imprimir()">Imprimir</button>
									<div id="print">
									  <svg id="barcode"></svg>
									</div>
                          </div>
						  <br>
						  <br><br>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit"  id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->

<?php
require_once("../Footer/Pie.php");

?> 
      
