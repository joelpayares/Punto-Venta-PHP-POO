<?php
require_once("../Cabezera/Cabezera.php");
?>  
 <!-- ESTO SON LOS ESTILOS DE DATATABLES DE BOOTSTRAP CSS -->
        <link rel="stylesheet" href="../../diseño/public/bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../diseño/public/bower_components/morris.js/morris.css">
        <link rel="stylesheet" href="../../diseño/public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">


<div class="panel-body table-responsive" id="listadoregistros">
<table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th style="font-width:20px; background-color:grey;">N°</th>
                        <th style="font-width:20px; background-color:grey;">CODIGO</th>
                        <th style="font-width:70px; text-align: center; background-color:grey;">Productos</th>

                        <th style="font-width:20px; background-color:grey;">STOCK</th>
                        <th style="font-width:20px; background-color:grey;">PRECIO VENTA</th>
                        <th style="font-width:20px; background-color:grey;">CATEGORIA</th>
                        <th style="font-width:60px; background-color:grey;">ESTADO</th>
                        <th style="font-width:60px; background-color:grey;">MENSAJE</th>
                        <th style="font-width:60px; background-color:grey;">Actualizar</th>
                        <th style="font-width:60px; background-color:grey;">Eliminar</th>
                        <th style="font-width:60px; background-color:grey;">Activar</th>
                        <th style="font-width:60px; background-color:grey;">Ver</th>
                        

                    </thead>
          <tbody>
         
          </tbody>


          <thead>
                        <th style="width:20px; background-color:grey;">N°</th>
                        <th style="font-width:20px; background-color:grey;">CODIGO</th>
                        <th style="font-width:70px; background-color:grey; text-align: center;">Productos</th>
                        <th style="font-width:20px; background-color:grey;">STOCK</th>
                        <th style="font-width:20px; background-color:grey;">PRECIO VENTA</th>
                        <th style="font-width:20px; background-color:grey;">CATEGORIA</th>
                        <th style="font-width:60px; background-color:grey;">ESTADO</th>
                        <th style="font-width:60px; background-color:grey;">MENSAJE</th>
                        <th style="font-width:60px; background-color:grey;">Actualizar</th>
                        <th style="font-width:60px; background-color:grey;">Eliminar</th>
                        <th style="font-width:60px; background-color:grey;">Activar</th>
                        <th style="font-width:60px; background-color:grey;">Ver</th>
                        
          </thead>

        </table>
<!--LIBRERIAS LA CUAL CONFORMA LA TABLAS -->
    <script language="javascript" src="../../diseño/public/datatables/buttons.colVis.min.js"></script>
    <script language="javascript" src="../../diseño/public/datatables/buttons.html5.min.js"></script>
    <script language="javascript" src="../../diseño/public/datatables/dataTables.buttons.min.js"></script>
    <script language="javascript" src="../../diseño/public/datatables/jszip.min.js"></script>
    <script language="javascript" src="../../diseño/js/pdfmake.min.js"></script>
    <script language="javascript" src="../../diseño/public/datatables/vfs_fonts.js"></script>
<?php
require_once("../Footer/Pie.php");

?> 
<script language="javascript">
       $(document).ready(function(){
    
    $('#tbllistado').DataTable({
            "lengthMenu": [ 5, 200, 1000, 10000, 1000000],//mostramos el menú de registros a revisar
            "aProcessing": true,//Activamos el procesamiento del datatables
            "aServerSide": true,//Paginación y filtrado realizados por el servidor
            "dom": '<Bl<f>rtip>',//Definimos los elementos del control de tabla
            "ajax" : "../../Controlador/Articulo/Mostrar_Articulos_Controller.php",
			"columns": [
				{"data" : "id"},
				{"data" : "codigo"},
				{"data" : "Nombre"},
				{"data" : "Stock"},
				{"data" : "PrecioVenta"},
				{"data" : "Categoria"},
				{"data" : "Estado"},
				{"data" : "Mensaje"},
				{"data": "Actualizar"},
				{"data": "Eliminar"},
				{"data": "Activar"},
				{"data": "Ver"}
				
			],

                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });



    //hide alert
    $(document).on('click', '.close', function(){
        $('.alert').hide();
    })
});

</script>


