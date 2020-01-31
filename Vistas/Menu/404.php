<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="diseño/css/bootstrap.min.css">
<link rel="stylesheet" href="diseño/css/bootstrap-responsive.css">
<link rel="stylesheet" href="diseño/css/bootstrap-responsive.min.css">
<link rel="stylesheet" href="diseño/css/bootstrap-theme.css">
<link rel="stylesheet" href="diseño/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="diseño/css/404.css">
</head>
<body>
<div id="clouds">
            <div class="cloud x1"></div>
            <div class="cloud x1_5"></div>
            <div class="cloud x2"></div>
            <div class="cloud x3"></div>
            <div class="cloud x4"></div>
            <div class="cloud x5"></div>
        </div>
        <div class='c'>
            <div class='_404'>404</div>
            <hr>
            <div class='_1'>Base De Datos</div>
            <div class='_2'>No Encontrada</div>
            <br>
            <a class='btn' href='#'>
            <?php
			$conn=null;
			$host='localhost';
			$user='root';
			$pwd='';
			$db='farmacia';
			
            echo"Nombre BD--> ".$db;?>
            </a>
        </div>
<script src="diseño/js/bootstrap.js"></script>
<script src="diseño/js/bootstrap.min.js"></script>
</body>
</html>