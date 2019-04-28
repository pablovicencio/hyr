<?php 
  include("../includes/validaSesion.php")
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>HYR - Resumen</title>

<?php
  include("../includes/recursosExternos.php");
  include("../includes/infoLog.php");
  include("../includes/menu.php");
?>
<script>
$(document).ready(function () {
  $('#dtBasicExample').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
  $('.dataTables_length').addClass('bs-select');
});

$(document).ready(function () {
  $('#dtBasicExample1').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
$(document).ready(function () {
  $('#dtBasicExample3').DataTable();
  $('.dataTables_length').addClass('bs-select');
});

</script>

</head>
<body>

<div class="container" id="main">
    <div class="row">
        <div class="col-12 text-center">
        
        <h3><i class="fa fa-pie-chart" aria-hidden="true"></i>&nbsp;Resúmen General</h3>
        </div>
        <hr>
    </div>
    <hr>
    




</div>


</body>
</html>