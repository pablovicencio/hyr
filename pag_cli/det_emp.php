<?php 
  include("../includes/validaSesionCli.php")
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>HYR - Empresas</title>
<!--Quitar al pasar a prod, no guarda cache-->
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">

<?php
  include("../includes/recursosExternos.php");
  $id_emp = $_GET['id'];
  $emp = $_GET['emp'];
?>


<!--recursos para graficos-->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script id="idemp" src="../js/funcionesEmpCli.js?emp=<?php echo $id_emp; ?>"></script>

</head>

<body>


<?php
  include("../includes/infoLog.php");
  include("../includes/menuCli.php");
  

?>


<div class="container" id="main">

<div class="col-12 text-center">
  <h3><?php echo $emp; ?>&nbsp;&nbsp;<i class="fa fa-building" aria-hidden="true"></i></h3>
  <hr>
</div>

<ul class="nav nav-pills" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="ctacte-tab" data-toggle="tab" href="#ctacte" role="tab" aria-controls="ctacte"
      aria-selected="true"><i class="fa fa-list-ol" aria-hidden="true"></i>&nbsp;&nbsp;Cuenta Corriente</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="f29-tab" data-toggle="tab" href="#f29" role="tab" aria-controls="f29"
      aria-selected="true"><i class="fa fa-list-ol" aria-hidden="true"></i>&nbsp;&nbsp;Formularios 29</a>
  </li>
         
</ul>

<hr>
<div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="ctacte" role="tabpanel" aria-labelledby="ctacte-tab">
         <!-- CONTENIDO 1 -->
        <?php
          include("cta_cte.php");
        ?>               
    </div>
 

    <div class="tab-pane fade" id="f29" role="tabpanel" aria-labelledby="f29-tab">
       <!-- CONTENIDO 2 -->
        <?php
          include("graficos_cli.php");
        ?> 

    </div>

</div>
</div>

<?php
          include("modal_cta_cte.php");
?> 


</body>
</html>