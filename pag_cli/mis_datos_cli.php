<?php 
  include("../includes/validaSesionCli.php")
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--Quitar al pasar a prod, no guarda cache-->
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">




<?php
  include("../includes/recursosExternos.php");
?>
<title>HYR - Mis Datos</title>

<script  src="../js/funcionesDat.js"></script>
</head>
<?php

  include("../includes/infoLog.php");
  include("../includes/menuCli.php");
?>
</head>
<body>






<div class="container" id="main">
  <div class="row">
    <div class="col-12">
      <h3>Mis Datos&nbsp&nbsp<i class="fa fa-address-card" aria-hidden="true"></i></h3>
    </div>
    <div id="loading" style="display: none;">
    <center><img src="../recursos/img/load.gif"></center>
    </div>
  </div>
      <?php
      $re = $fun->cargar_datos_cli($id,$perfil);   
      foreach($re as $row)      
          {
          }    
      ?>  
  <hr>
  <div class="row">
      <div class="col-12">
        <div class="form-group">
          <label for="nom">Nombre:</label>
          <input type="text" class="form-control" id="nom" name="nom"  value="<?php echo $row['nom'] ?>" readonly>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="rut">Rut:</label>
          <input type="text" class="form-control" id="rut" name="rut"  value="<?php echo $row['rut'] ?>" readonly>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="mail">Email:</label>
          <input type="text" class="form-control" id="mail" name="mail"  value="<?php echo $row['mail'] ?>" readonly>
        </div>
      </div>
              
      <div class="col-12 text-center">
      <br>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalActPwd" id="btn-pwd" name="btn-pwd">Actualizar Contraseña</button> 
      </div>
    </div>
  </div>

    <div class="modal fade " id="ModalActPwd" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Actualizar Contraseña</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <br>
        <div class="col-12">
              <form  id="formActPwd" onsubmit="return false;">
              <div class="form-group row">
                <label class="col-sm-6 col-form-label" >Contraseña Actual:</label>
                <div class="col-sm-6">
                <input type="password" class="form-control" id="actpwd" placeholder="Ingresa tu contraseña" maxlength="6" name="actpwd">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-6 col-form-label" >Nueva Contraseña:</label>
                <div class="col-sm-6">
                <input type="password" class="form-control" id="newpwd1" placeholder="Nueva contraseña" maxlength="6" name="newpwd1">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-6 col-form-label" >Repita la Nueva Contraseña:</label>
                <div class="col-sm-6">
                <input type="password" class="form-control" id="newpwd2" placeholder="Nueva contraseña" maxlength="6" name="newpwd2">
                </div>
              </div>
                <center><input type="submit" class="btn btn-info" id="btnAc" name="btnAc" value="Actualizar"></center> 
                <br>
              </form>
          </div>
        
      </div>

    </div>
  </div>
</body>
</html>