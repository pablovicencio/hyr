<?php 
  include("../includes/validaSesion.php")
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>HYR - Usuarios</title>

<?php
  include("../includes/recursosExternos.php");
?>

<script src="../js/funcionesUsu.js"></script>

</head>

<body>


<?php
  include("../includes/infoLog.php");
  include("../includes/menu.php");
?>

<div class="container" id="main">


<div class="col-12 text-center">
  <h3>Usuarios Actuales&nbsp;&nbsp;<i class="fa fa-users" aria-hidden="true"></i></h3>
  <hr>
</div>

  <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="">ID               <i class="" aria-hidden="true"></i></th>
        <th class="">Nombre           <i class="" aria-hidden="true"></i></th>
        <th class="">Apellidos        <i class="" aria-hidden="true"></i></th>
        <th class="">Rut              <i class="" aria-hidden="true"></i></th>
        <th class="">Mail             <i class="" aria-hidden="true"></i></th>
        <th class="">Perfil           <i class="" aria-hidden="true"></i></th>
        <th class="">Cargo            <i class="" aria-hidden="true"></i></th>
        <th class="">Vigencia         <i class="" aria-hidden="true"></i></th>
        <th class="">Fecha de Creación<i class="" aria-hidden="true"></i></th>
        <th class="">Nick             <i class="" aria-hidden="true"></i></th>
        <!--<th class="th-sm">Editar<i class="fa fa-sort float-right" aria-hidden="true"></i></th>-->
      </tr>
    </thead>
    <tbody>

    <?php
      $re = $fun ->cargar_usuarios(1,1);
      foreach($re as $row)
        {

        
      ?>
    
    <tr>
                  <td><?php echo $row['id_usu']?></td>  
                  <td><?php echo $row['nom_usu']?></td>
                  <td><?php echo $row['apepat_usu']." ". $row['apemat_usu']?></td>
                  <td><?php echo $row['rut_usu']?></td>
                  <td><?php echo $row['mail_usu']?></td>
                  <td><?php echo $row['id_perfil']?></td>
                  <td><?php echo $row['cargo_usu']?></td>
                  <td><?php echo $row['vig_usu']?></td>
                  <td><?php echo $row['fec_cre_usu']?></td>
                  <td><?php echo $row['nick_usu']?></td>
                 <!-- <td>Modificar <i class="fa fa-pencil-square" aria-hidden="true"></i>-->
</td>

      </tr>

              </tr>

<?php } ?>  

    </tbody>
  </table>


</div>
</body>
</html>