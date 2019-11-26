<?php 
  include("../includes/validaSesion.php")
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>HYR - Informes F29</title>
<!--Quitar al pasar a prod, no guarda cache-->
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">

<?php
  include("../includes/recursosExternos.php");
  $emp = $_GET['emp'];
?>




<!--recursos para graficos-->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script id="idemp" src="../js/funcionesF29graficos.js?emp=<?php echo $emp; ?>"></script>
</head>

<body>


<?php
  include("../includes/infoLog.php");
  include("../includes/menu.php");
?>


<div id="loading" style="display: none;">
        <center><img src="../recursos/img/load.gif"></center>
</div>
<div class="container" id="main">
    <div class="row">
        <div class="col-12">

     <?php
      $re = $fun ->cargar_datos_emp2($emp,2);
      foreach($re as $row)
        {
          echo '<h3>Informe Fomularios 29: '.$row['razon_social_emp'].' RUT:  '.$row['rut_emp'].' <i class="fa fa-list-alt" aria-hidden="true"></i></h3>';
        }
      ?>

        
        </div>
    </div>
    <hr>
<div class="row">

<div class="col-sm-4">
<h5>Relacion Débito/Crédito</h5>
<div id="relgraf" class="graf"></div>
</div>

<div class="col-sm-4">
<h5>Débito y Crédito</h5>
<div id="debcredgraf" class="graf"></div>
</div>

<div class="col-sm-4">
<h5>Ventas</h5>
<div id="vengraf" class="graf"></div>
</div>

</div>






</div>






</body>
</html>
