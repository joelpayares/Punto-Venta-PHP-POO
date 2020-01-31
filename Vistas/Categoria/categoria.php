
<?php
require_once("../Cabezera/Cabezera.php");
?>  
<!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Categoría <a href="#formularioregistros"><button class="btn btn-success"><i class="fa fa-plus-circle"></i> Añadir </button></a></h1>
                          <h1 class="box-title">Reportes <a href="../reportes/rptcategorias.php" target="_blank"><button class="btn btn-info"><i class="fa fa-clipboard"></i> Reporte</button></a></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    
                    <div class="panel-body table-responsive" id="listadoregistros">
                      <div class="row">
				
					             </div>
                    </div>

                    <div class="panel-body" style="height: 400px;" id="formularioregistros">

                       <form name="formulario" action="../../Controlador/Categoria/ingresoCategoria.php" id="formulario" method="POST">



                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label style="font-size:19px;">Nombre:</label>
                            <!--<input type="hidden" name="idcategoria" id="idcategoria">-->
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" placeholder="Ingrese Nombre Categoria" >
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label style="font-size:19px;">Descripción:</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Estado(*):</label>
                            <select id="Estado" name="Estado" class="form-control selectpicker" data-live-search="true" required>
                              <option>Seleccione</option>
                              <option  value="1">Activo</option>
                              <option value="0">Inactivo</option>
                            </select>
                          </div>
                          <br>
                          <br>

                          <!--<input type="hidden" name="buscar_dato" id="buscar_dato" >-->

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

<script type="text/javascript">

function buscar_datos(consulta)
        {
            $.ajax({
                url: '../../Controlador/Categoria/Buscar_Categoria.php',
                type: 'POST' ,
                dataType: 'html',
                data: {consulta: consulta},
            })
            .done(function(respuesta){
                $("#nombre").html(respuesta);
            })
            .fail(function(){
                console.log("error");
            });
        }
        




</script>
<style type="text/css">
#buscar_dato
{
    min-width:100px;/*esta accion hace aumentar o disminuir el ancho de la caja de texto*/
    background-color:#3CC; 
    margin:0px; 
    padding:5px;/*esta accion hace aumentar el alto de la caja de texto*/
}
.buscar_dato
{
    font-size:24px;/*ocupa el ancho de la letra dentro de la caja de texto*/
    text-align:center;
    color:#000000;
}
.buscar_dato
{
    margin-bottom:10px;
}
</style>
  
<?php
require_once("../Footer/Pie.php");

?> 
      
