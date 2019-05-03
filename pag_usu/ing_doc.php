<?php 
  include("../includes/validaSesion.php")
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>HYR - Ingreso de Documento</title>

<?php
  include("../includes/recursosExternos.php");

?>
</head>
<?php

  include("../includes/infoLog.php");
  include("../includes/menu.php");
?>



<body>
<div class="container" id="main">
    <div class="row">
        <div class="col-12">
        <h3>Ingreso de Documento  <i class="fa fa-file-text" aria-hidden="true"></i></h3>
        </div>
    </div>
    <hr>

    <div id="loading" style="display: none;">
        <center><img src="../recursos/img/load.gif"></center>
    </div>
     <div  id="form">
     <form id="formIngDoc" name="formIngDoc" onsubmit="return false;">
                        <div class="col-12">
                            <label for="emp">Empresa:</label>
                                        <select class="form-control chosen" id="emp" name="emp" onchange="montoEmp(this.value);">
                                        <option value="" selected disabled>Seleccione Empresa</option>
                                           <?php 
                                            $re = $fun->cargar_empresas(1);   
                                            foreach($re as $row)      
                                                {
                                                  ?>
                                                  
                                                   <option value="<?php echo $row['id_emp'] ?>"><?php echo $row['razon_social_emp'] ?></option>
                                                      
                                                  <?php
                                                }    
                                            ?>  
                            </select><hr>
                        </div>
                         <div class="row" >

                        <div class="col-4">
                              <div class="form-group" >
                                <label for="num_doc">Nro Documento:</label>
                                <input type="number" class="form-control" id="num_doc" name="num_doc" min="0" required>
                              </div>
                              
                              <div class="form-group" >
                                <label for="afecto">Monto Afecto:</label>
                                <input type="number" class="form-control" id="afecto" name="afecto" min="0" onkeyup="calculoIva();" required>
                              </div>

                             
                              
                              
                              
                                 
                        </div>
                        <div class="col-4">   
                              <div class="form-group">
                                <label for="tipo_doc">Tipo Documento:</label>
                                <select class="form-control chosen" id="tipo_doc" name="tipo_doc" required>
                                        <option value="" selected disabled>Seleccione tipo documento</option>
                                           <?php 
                                            $re = $fun->cargar_tipo_doc(1);   
                                            foreach($re as $row)      
                                                {
                                                  ?>
                                                  
                                                   <option value="<?php echo $row['tipo'] ?>"><?php echo $row['tipo_doc'] ?></option>
                                                      
                                                  <?php
                                                }    
                                            ?>  
                            </select>
                              </div>

                              <div class="form-group" >
                                <label for="exento">Monto Exento:</label>
                                <input type="number" class="form-control" id="exento" name="exento" min="0" onkeyup="calculoTotal();" required>
                              </div>

                              
                              
                        </div>
                        <div class="col-4">   
                              
                        <div class="form-group">
                                <label for="mon_men">Monto Mensual Acordado:</label>
                                <input type="number" class="form-control" id="mon_men" name="mon_men" min="0" readonly>
                              </div>
                              
                        <div class="form-group" >
                                <label for="iva">Monto IVA:</label>
                                <input type="number" class="form-control" id="iva" name="iva" min="0" readonly required>
                              </div>
                        
                      
                        </div>

                        </div>  
                        <div class="row" >
                          <div class="col-12">
                            <div class="form-group">
                                    <label for="total">Monto Total:</label>
                                    <input type="number" class="form-control" id="total" name="total" style="width: 500px" required readonly>
                                  </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-4">
                              <div class="form-group">
                                    <label for="fec_emi">Fecha Emisión:</label>
                                    <input type="date" class="form-control" id="fec_emi" name="fec_emi"  required>
                                  </div>
                            </div>
                            <div class="col-4">
                              <div class="form-group">
                                    <label for="fec_ven">Fecha Vencimiento:</label>
                                    <input type="date" class="form-control" id="fec_ven" name="fec_ven" required>
                              </div>
                            </div>
                            <div class="col-4">
                              
                            </div>


                        </div>
                        <textarea class="form-control" rows="5" id="obs_doc" name="obs_doc" placeholder="Observación"></textarea><br><br>

                        <div class="container-login100-form-btn">
                     
                          <button class="login100-form-btn" type="submit">
                            Guardar
                          </button>
         
					</div>
     </form>

    </div>




</div>


</body>
</html>