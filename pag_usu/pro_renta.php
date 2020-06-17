<?php 
  include("../includes/validaSesion.php")
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>HYR - Proyección Renta</title>
<!--Quitar al pasar a prod, no guarda cache-->
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">

<?php
  include("../includes/recursosExternos.php");
?>

<script src="../js/funcionesProRenta.js"></script>
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
        <h3>Proyeccion de Renta  <i class="fa fa-book" aria-hidden="true"></i></h3>
        </div>
    </div>
    <hr>
    <div class="table-responsive">
    <table id="tabla_proy_ren" class="table table-striped table-bordered" cellspacing="0" style="font-size: 0.8rem;" width="100%">
    <thead >
                                      <tr>
                                        <th style="display: none" scope="col">id Empresa</th>
                                        <th scope="col">Rut Empresa</th>
                                        <th scope="col">Empresa</th>
                                        <th scope="col">Ver</th>
                                      </tr>
    </thead>
    <tbody>

    <?php
      $re = $fun ->cargar_empresas(1);

     foreach($re as $row)
        {

        
      ?>
    
    <tr>          
                  <td style="display: none"><?php echo $row['id_emp']?></td>
                  <td><?php echo $row['rut_emp']?></td>
                  <td><?php echo $row['razon_social_emp']?></td>

                  <td><?php echo'<a id="btn_modal_pro_renta" class="link-modal btn btn-outline-success" data-id="'.$row['id_emp'].'" data-reg_trib="'.$row['reg_trib_emp'].'" data-rut="'.$row['rut_emp'].'" data-emp="'.$row['razon_social_emp'].'"  data-toggle="modal" ><i class="fa fa-plus-square" aria-hidden="true"></i></a>';?></td>
                
                 
                

  
      </tr>

              </tr>

<?php } ?>  

    </tbody>
    <tfoot>
                                      <tr>
                                        <th style="display: none" scope="col">id Empresa</th>
                                        <th scope="col">Rut Empresa</th>
                                        <th scope="col">Empresa</th>
                                        <th scope="col">Ver</th>
                                      </tr>
    </tfoot> 
  </table>
</div>
        </div>
    </div>
    <hr>
    




</div>



<div class="modal fade" id="modal_pro_renta" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></span>Empresa: <span id="emp_pro_renta" name="emp_pro_renta"></span> Rut: <span id="Remp_pro_renta" name="Remp_pro_renta"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#pro_renta_ing">Ingresar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#pro_renta_ver">Ver</a>
          </li>
        </ul>




          <div class="tab-content">
              <div id="pro_renta_ing" class="container tab-pane active"><br>
                     <form id="formRegProRenta" name="formRegProRenta" onsubmit="return false;" autocomplete="off">
                          <input type="hidden" class="form-control" id="emp" name="emp" min="0" required readonly>
                          <input type="hidden" class="form-control" id="trib" name="trib" min="0" required readonly>
                          <input type="hidden" class="form-control" id="idgc" name="idgc" min="0" required readonly>
                            <div class="row">
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="periodo_renta">Periodo:</label>
                                                        <input type="date" class="form-control" id="per_pro_renta" name="per_pro_renta" required>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="util_ejer">Utilidad Ejercicio</label>
                                                        <input type="text" class="form-control nro" id="util_ejer" name="util_ejer" min="0" onchange="calculoTotal()" required>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="base_idpc">Base IDPC: <span id="val_base_idpc"></span></label>
                                                        <input type="number" class="form-control" id="base_idpc" name="base_idpc" min="0" max="100" onchange="calculoTotal()" required>
                                                  </div>
                                      </div>
                                    </div>

                                  <div class="row">
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="idpc">IDPC (%): <span id="val_idpc"></span></label>
                                                        <input type="number" class="form-control" id="idpc" name="idpc" min="0" max="100" onchange="calculoTotal()" required>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="ppmo">PPMO:</label>
                                                        <input type="text" class="form-control nro" id="ppmo" name="ppmo" min="0" required>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="ppmv">PPMV:</label>
                                                        <input type="number" class="form-control" id="ppmv" name="ppmv" min="0" required>
                                                  </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="pr">Proyeccion de renta: </label>
                                                        <input type="text" class="form-control nro" id="pr" name="pr"  readonly required>
                                                  </div>
                                      </div>
                                      
                                      
                                    </div>

                                    <div class="col-12">
                                      <div class="table-responsive">
                                         <table class="table table-striped table-bordered" id="tabla_per" name="tabla_per">
                                            <thead>
                                              <tr>
                                                <th scope="col" style="display: none">Id_per</th>
                                                <th scope="col">Socios</th>
                                                <th scope="col">Participacion</th>
                                                <th scope="col">Atribuciones</th>
                                                <th scope="col">Créditos</th>
                                                <th scope="col" style="display: none">Idgc</th>
                                                <th scope="col">IGC</th>
                                                <th scope="col">IGC Total</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                          </table>
                                      </div>
                                    </div>
 
    
                                            <div class="row" >
                                                <div class="col">
                                                  <div class="form-group">
                                                        <button class="btn btn-outline-info" type="button" id="btn_calc" name="btn_calc">
                                                          Calcular
                                                        </button>
                                                        <button class="btn btn-outline-success" type="submit" >
                                                          Registrar
                                                        </button>
                                                  </div>
                                                </div>
                                                <div class="col">
                                                  <div class="form-group">
                                                        
                                                  </div>
                                                </div>
                                           </div>
                                </form>
                            </div>
                      
              <div id="pro_renta_ver" class="container tab-pane fade"><br>
                            <div class="row">
                              <div class="col-4">
                                    <label for="periodo_renta">Periodo:</label>
                                    <select class="form-control" id="ver_per" name="ver_per">
                                        <option value="" selected disabled>Seleccione Periodo</option>
                                    </select>
                              </div>

                              <div class="col-4">
                                    <br>
                                    <button class="btn btn-outline-success" name="btn_bus_pr" id="btn_bus_pr" disabled>
                                      Buscar
                                    </button>
                              </div>
                                        
                            </div>
                
                            <hr>
                            <div id="det_pr" name="det_pr" style="display: none">
                            <form id="formVerAnuPr" name="formVerAnuPr">
                            <div class="row">

                                      
                                      <input type="hidden" class="form-control" id="idpr" name="idpr" readonly>
                                      <div class="col-4">                                      
                                                  <div class="form-group">
                                                        <label for="periodo_renta">Periodo:</label>
                                                        <input type="text" class="form-control" id="per_pr_ver" name="per_pr_ver" readonly>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="util_ejer">Utilidad Ejercicio</label>
                                                        <input type="text" class="form-control nro" id="util_ejer_ver" name="util_ejer_ver" min="0" readonly>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="base_idpc">Base IDPC: <span id="val_base_idpc_ver"></span></label>
                                                        <input type="number" class="form-control" id="base_idpc_ver" name="base_idpc_ver" min="0" max="100" readonly>
                                                  </div>
                                      </div>
                                    </div>

                                  <div class="row">
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="idpc">IDPC (%): <span id="val_idpc_ver"></span></label>
                                                        <input type="number" class="form-control" id="idpc_ver" name="idpc_ver" min="0" max="100" readonly>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="ppmo">PPMO:</label>
                                                        <input type="text" class="form-control nro" id="ppmo_ver" name="ppmo_ver" min="0" readonly>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="ppmv">PPMV:</label>
                                                        <input type="number" class="form-control" id="ppmv_ver" name="ppmv_ver" min="0" readonly>
                                                  </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="pr">Proyeccion de renta: </label>
                                                        <input type="text" class="form-control nro" id="pr_ver" name="pr_ver"  readonly>
                                                  </div>
                                      </div>
                                      
                                      
                                    </div>

                                    <div class="col-12">
                                      <div class="table-responsive">
                                         <table class="table table-striped table-bordered" id="tabla_ver_per" name="tabla_ver_per">
                                            <thead>
                                              <tr>
                                                <th scope="col">Socios</th>
                                                <th scope="col">Participacion</th>
                                                <th scope="col">Atribuciones</th>
                                                <th scope="col">Créditos</th>
                                                <th scope="col">IGC</th>
                                                <th scope="col">IGC Total</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                          </table>
                                      </div>
                                    </div>
 
    
                                            <div class="row" >
                                                <div class="col">
                                                  <div class="form-group">
                                                        <button class="btn btn-outline-danger"  id="btn_anu" name="btn_anu" type="submit">
                                                          Anular
                                                        </button>
                                                  </div>
                                                </div>
                                                <div class="col">
                                                  <div class="form-group">
                                                        
                                                  </div>
                                                </div>
                                           </div>
                              
                    </form>
                </div>
              </div>
            </div>











 

                        
 
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>