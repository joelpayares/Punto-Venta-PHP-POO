
<?php
error_reporting(0);
require_once("../Modelo/Conexion.php");
$Ejecuta=new Conexion();

$Ejecuta_Conexion=$Ejecuta->EjecutaEscalar();


//Activamos el almacenamiento en el buffer
ob_start();

//Inlcuímos a la clase PDF_MC_Table
require('PDF_MC_Table.php');
 
//Instanciamos la clase para generar el documento pdf
$pdf=new PDF_MC_Table();
 
//Agregamos la primera página al documento pdf
$pdf->AddPage();
 
//Seteamos el inicio del margen superior en 25 pixeles 
$y_axis_initial = 24;
$time = time();//TOMO LA FECHA DEL EQUIPO PARA GENERAR LA FECHA EN EL REPORTE DE MEDICAMENTOS
//Seteamos el tipo de letra y creamos el título de la página. No es un encabezado no se repetirá
$pdf->SetFont('Arial','B',9);

//$pdf->Cell(0,10,'FECHA REPORTE GENERADO '.date("d-m-Y", $time),0,1,'L');
$pdf->Cell(0,7,'STOCK MEDICAMENTOS FARMACIA SANA SANA ',0,0,'C');
$pdf->Ln(7);
$pdf->SetFillColor(235,235,235); 
//$pdf->SetFont('Arial','B',10);

			$pdf->Cell(13,5,'Codigo ',1,0,'C',1);
			//$pdf->Cell(29,5,'Codigo Barra ',1,0,'C',1);
			$pdf->Cell(110,5,utf8_decode('Descripcion'),1,0,'C',1);
			$pdf->Cell(11,5,utf8_decode('Stock'),1,0,'C',1);
			$pdf->Cell(16,5,utf8_decode('Precio'),1,0,'C',1);
			$pdf->Cell(19,5,utf8_decode('Existencia'),1,1,'C',1); 


	//$pdf->Ln(9);

		$sql=$Ejecuta_Conexion->prepare("

		            SELECT p.id_producto,p.codigo,p.CodigoBarra,p.Nombre,
		                  p.Descripcion as Laboratorio ,p.Stock,p.PrecioVenta,p.Estado,c.Descripcion AS Categorias
		                  FROM producto as p 
		                  INNER JOIN categoria as c ON c.Id_Categoria =p.Id_Categoria
		                   WHERE p.Estado=1 OR p.Estado=0 order by p.codigo asc

		            ");

					$sql->execute();
					$contador=15;
					while($resultados=$sql->fetch(PDO::FETCH_ASSOC))
						{
							
							$pdf->Cell(13,5,$resultados['codigo'],1,0,'C',1); 
							//$pdf->Cell(29,5,$resultados['CodigoBarra'],1,0,'C',1);
							$pdf->Cell(110,5,$i=$resultados['Nombre'],1,0,'C',1);
							$pdf->Cell(11,5,round($i=$resultados['Stock']),1,0,'C',1);

							$pdf->Cell(16,5,"$".number_format($i=$resultados['PrecioVenta']),1,0,'C',1);
											
							$pdf->Cell(19,5,'  ',1,1,'C',1);
							$pdf->SetWidths(array(58,50,30,0));
							
						}

			$pdf->Cell(13,5,'Codigo ',1,0,'C',1);
			//$pdf->Cell(29,5,'Codigo Barra ',1,0,'C',1);
			$pdf->Cell(110,5,utf8_decode('Descripcion'),1,0,'C',1);
			$pdf->Cell(11,5,utf8_decode('Stock'),1,0,'C',1);
			$pdf->Cell(16,5,utf8_decode('Precio'),1,0,'C',1);
			$pdf->Cell(19,5,utf8_decode('Existencia'),1,1,'C',1); 

$pdf->Output(); //Mostramos el documento pdf



ob_end_flush();
?>
