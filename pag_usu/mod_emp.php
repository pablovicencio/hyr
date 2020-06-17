<form id="formModEmp" onsubmit="return false;"  >
  <!-- Inicio Row -->
    <div class="col-12">
      <select class="form-control" id="emp" name="emp" style="width: 500px" onchange="mod(this.value)">
          <option value="" selected disabled>Seleccione Empresa</option>
                     <?php 
                      $re = $fun->cargar_empresas(3);   
                      foreach($re as $row)      
                          {
                            ?>
                            
                             <option value="<?php echo $row['id_emp'] ?>"><?php echo $row['razon_social_emp']?></option>
                                
                            <?php
                          }    
                      ?>  
      </select><hr>
    </div>
  <h5>Detalle Empresa:</h5>
  <br>




  <div class="row" >

      
      <div class="col-4"> 
              <div class="form-group">
                <label for="rsoc">Razón Social:</label>
                  <div class="row">
                    <div class="col-12">
                      <input type="text" class="form-control" id="rsoc" name="rsoc"  maxlength="150" placeholder="Razón Social Empresa" required>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                  <label for="mcem">Contacto Empresarial:</label>
                  <div class="row">
                    <div class="col-12">
                      <input type="text" class="form-control" id="mcem" name="mcem"  maxlength="" placeholder="Contacto Empresarial" required>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                <label for="mmail">Email:</label>
                <input type="text" class="form-control" id="mmail" name="mmail" maxlength="100" placeholder="email@dominio.cl" required>
              </div>
              

              
      </div>
      
    <div class="col-4">

          <div class="form-group">
              <label for="mrut">Rut:</label>
              <div class="row">
                <div class="col-12">
                  <input type="text" class="form-control" id="mrut" name="mrut"  maxlength="10" placeholder="ej: 12345678-9" required readonly>
                </div>
              </div>
          </div>





          <div class="form-group">
             <label for="mdirec">Dirección:</label>
             <input type="text" class="form-control" id="mdirec" name="mdirec" maxlength="150" placeholder="Dirección" required>
          </div>



          



    </div>

        <div class="col-4">

              <div class="form-group">
                          <label for="ciudad">Provincia:</label>
                            <select class="form-control" name="mciudad" id="mciudad" required onchange="mod_ciudad(this.value,'mcomuna')">
              <option value="" selected disabled>Seleccione la Provincia</option>
              <?php 
              $re = $fun->cargar_ciudades();   
              foreach($re as $row)      
              {
              ?>
              <option value="<?php echo $row['provincia_id'] ?>"><?php echo $row['provincia_nombre'] ?></option>

              <?php
              }    
              ?>       
            </select>
              </div>

              <div class="form-group">
              <label for="mcomuna">Comuna:</label>
              <select class="form-control" name="mcomuna" id="mcomuna" required>
              <option value="" selected disabled>Seleccione la Comuna</option>
            </select>
              </div>
              
              <div class="form-group">
                  <br>
                      <a id="btn_mmodal_obs" class="link-modal btn btn-outline-warning" data-toggle="modal" data-target="#mmodal_obs">Observaciones</a>  
              </div>




        </div>
  </div>
  <hr>
  <h5>Detalle Financiero Empresa:</h5>
  <br>
  <div class="row" >

      
<div class="col-4"> 

        <div class="form-group">
          <label for="mmme">Monto Mensual Empresa:</label>
          <input type="number"  class="form-control" id="mmme" name="mmme" maxlength="10" placeholder="Monto Mensual Empresa" required>
        </div>
        <div class="form-group">
          <label for="mmre">Monto Renta Empresa:</label>
          <input type="number" class="form-control" id="mmre" name="mmre" maxlength="10"  placeholder="Monto Renta Empresa" required>
        </div>
        <div class="form-group">
          <label for="mcse">Cons. Soc. Emp.:</label>
          <input type="date" class="form-control" id="mcse" name="mcse" required>
        </div>
        <div class="form-group">
          <label for="mrte">Reg. Trib. Emp.:</label>
          <select class="form-control" name="mrte" id="mrte" required>
              <option value="" selected disabled>Seleccione Regimen Tributario</option>
                  <?php 
                  $re = $fun->cargar_reg_trib();   
                  foreach($re as $row)      
                  {
                  ?>
                  <option value="<?php echo $row['id_reg_trib'] ?>"><?php echo $row['desc_reg_trib'] ?></option>

                  <?php
                  }    
                  ?>       
            </select>
        </div>


        
</div>

<div class="col-4">

    <div class="form-group">
        <label for="mpce">Patente Comercial:</label>
        <div class="row">
          <div class="col-12">
            <input type="text" class="form-control" id="mpce" name="mpce"  maxlength="10" placeholder="Patente Comercial" required>
          </div>
        </div>
    </div>

    <div class="form-group">
        <label for="mevem">Evaluacion Empresa:</label>
        <div class="row">
          <div class="col-12">
            <input type="text" class="form-control" id="mevem" name="mevem"  maxlength="10" placeholder="Patente Comercial" required>
          </div>
        </div>
    </div>
    <div class="form-group">
      <label for="mfia">Fecha Inicio Actividades:</label>
        <div class="row">
          <div class="col-12">
            <input type="date" class="form-control" id="mfia" name="mfia"  maxlength="150" placeholder="Fecha Inicio Actividades" required>
          </div>
        </div>
      </div>

      <div class="form-group">
          <label for="mrae">Rta. At. Emp.:</label>
          <div class="row">
            <div class="col-12">
              <input type="text" class="form-control" id="mrae" name="mrae"  maxlength="50" placeholder="Rta. At. Emp." required>
            </div>
          </div>
      </div>  
    
    

</div>

  <div class="col-4">

      <div class="form-group">
        <label for="mcsii">Clave SII:</label>
        <input type="text" class="form-control" id="mcsii" name="mcsii" maxlength="45"  placeholder="Clave SII" required>
      </div>
      <div class="form-group">
       <label for="mcprev">Clave Previred:</label>
       <input type="text" class="form-control" id="mcprev" name="mcprev" maxlength="45" placeholder="Clave Previred" required>
       </div>

       <div class="form-group">
        <label for="mfre">Fac. Rea. Emp.:</label>
        <div class="row">
          <div class="col-12">
            <input type="text" class="form-control" id="mfre" name="mfre"  maxlength="10" placeholder="Fac. Rea. Emp." required>
          </div>
        </div>
        </div> 

        <label for="vigcheck"> Vigencia:</label>
        <div class="input-group mb-3">
          <br>
        
          <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="checkbox" id="vigcheck" name="vigcheck" aria-label="Checkbox for following text input">
            </div>
          </div>
          <input type="text" class="form-control" id="vigtext" name="vigtext" aria-label="Text input with checkbox" placeholder="Vigencia Actual de la Empresa" readonly>
        </div>

         

  </div>
</div>
    <br>  
  <div class="col-12 text-center">
    <input type="submit" class="btn btn-outline-success" id="btnAc" name="btnAc" value="Modificar Datos Empresa" >                                         
  </div>
  <!-- Fin Row -->  
  
  <!-- Modal obs --> 
  <div class="modal fade" id="mmodal_obs" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Observaciones de empresa <span id="mod_emp_obs" name="mod_emp_obs"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                    <textarea class="form-control" id="mobs_emp" name="mobs_emp" rows="20" maxlength="15000"></textarea>
                  </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
        <div class="container-login100-form-btn">
        </div>
      </div>
    </div>
   
  </div>
</div>
</form>