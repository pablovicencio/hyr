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
  <div class="row">
  <div class="col-12 text-center">
    <h3>Modificar Usuario&nbsp;&nbsp;<i class="fa fa-pencil-square" aria-hidden="true"></i></h3>
    <hr>
  </div>
  </div>

  <div id="loading" style="display: none;">
    <center><img src="../recursos/img/load.gif"></  center>
  </div>
    <form id="formModUsu" onsubmit="return false;"  >
    <div class="col-12">
      <select class="form-control" id="usu" name="usu" style="width: 500px" onchange="mod(this.value)">
          <option value="" selected disabled>Seleccione Usuario</option>
                     <?php 
                      $re = $fun->cargar_usuarios(1,1);   
                      foreach($re as $row)      
                          {
                            ?>
                            
                             <option value="<?php echo $row['id_usu'] ?>"><?php echo $row['nom_usu']." ".$row['apepat_usu']." ".$row["apemat_usu"] ?></option>
                                
                            <?php
                          }    
                      ?>  
      </select><hr>
    </div>



  <div class="row" >
  <div class="col-6">
          <div class="form-group">
            <label for="nom">Nombre:</label>
              <div class="row">
                <div class="col-12">
                  <input type="text" class="form-control" id="nombre" name="nombre"  maxlength="25" placeholder="Nombre" required>
                </div>
             </div>
          </div>
          <div class="form-group">
              <label for="ape">Apellido Paterno:</label>
              <div class="row">
                <div class="col-12">
                  <input type="text" class="form-control" id="apellidop" name="apellidop"  maxlength="25" placeholder="Apellido" required>
                </div>
             </div>
          </div>
          <div class="form-group">
              <label for="ape">Apellido Materno:</label>
              <div class="row">
                <div class="col-12">
                  <input type="text" class="form-control" id="apellidom" name="apellidom"  maxlength="25" placeholder="Apellido" required>
                </div>
             </div>
          </div>
          <div class="form-group">
             <label for="rut">Rut:</label>
             <input type="text"  class="form-control" id="rut" name="rut" maxlength="10" placeholder="xxxxxxxx-x"  readonly>
          </div>
          <div class="form-group">
             <label for="mail">Mail:</label>
             <input type="text" class="form-control" id="mail" name="mail" maxlength="50"  required>
          </div>           
  </div>
  <div class="col-6">
        <div class="form-group">
          <label for="ape">Perfil de Sistema:</label>
             <select class="form-control" name="perfil" id="perfil" required>
                          <option value="" selected disabled>Seleccione el perfil</option>
                                       <?php 
                                        $re = $fun->cargar_perfiles(1);   
                                        foreach($re as $row)      
                                            {
                                              ?>
                                               <option value="<?php echo $row['id_perfil']; ?>"><?php echo $row['perfil']; ?></option>
                                              <?php
                                            }
                                        ?></select>
          </div>
          <div class="form-group">
            <label for="ape">Cargo:</label>
               <select class="form-control" name="cargo" id="cargo" required>
                            <option value="" selected disabled>Seleccione el cargo</option>
                                         <?php 
                                          $re = $fun->cargar_cargos(1);   
                                          foreach($re as $row)      
                                              {
                                                ?>
                                                 <option value="<?php echo $row['id_cargo'] ?>"><?php echo $row['cargo'] ?></option>
                                                    <?php
                                              }
                                          ?></select>
            </div>
            <div class="form-group">
             <label for="mail">Nickname:</label>
             <input type="text" class="form-control" id="nick" name="nick" maxlength="20"  readonly>
          </div>             
          <div class="form-check">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="vig" id="vig"> Vigencia</label>
          </div>
          
          </form>
  </div>
  <div class="col-12 text-center">
  <input type="submit" class="btn btn-outline-success" id="btnAc" name="btnAc" value="Modificar Usuario" >                                         
    </div>
  </div>



</div>
</body>
</html>