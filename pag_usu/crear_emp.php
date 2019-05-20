<form id="formCrearEmp" onsubmit="return false;"  >
  <!-- Inicio Row -->
  <h5>Detalle Empresa:</h5>
  <br>
  <div class="row" >

      
      <div class="col-4"> 
              <div class="form-group">
                <label for="rsocial">Razón Social:</label>
                  <div class="row">
                    <div class="col-12">
                      <input type="text" class="form-control" id="rsocial" name="rsocial"  maxlength="150" placeholder="Razón Social Empresa" required>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                  <label for="cem">Contacto Empresarial:</label>
                  <div class="row">
                    <div class="col-12">
                      <input type="text" class="form-control" id="cem" name="cem"  maxlength="" placeholder="Contacto Empresarial" required>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                <label for="mail">Email:</label>
                <input type="text" class="form-control" id="mail" name="mail" maxlength="20"  required>
              </div>
              

              
      </div>
      
    <div class="col-4">

          <div class="form-group">
              <label for="rut">Rut:</label>
              <div class="row">
                <div class="col-12">
                  <input type="text" class="form-control" id="rut" name="rut"  maxlength="10" placeholder="xxxxxxxx-x" required>
                </div>
              </div>
          </div>





          <div class="form-group">
             <label for="direc">Dirección:</label>
             <input type="text" class="form-control" id="direc" name="direc" maxlength="150"  required>
          </div>



          



    </div>

        <div class="col-4">

              <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                            <select class="form-control" name="ciudad" id="ciudad" required onchange="mod_ciudad(this.value,'comuna')">
              <option value="" selected disabled>Seleccione la Ciudad</option>
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
              <label for="comuna">Comuna:</label>
              <select class="form-control" name="comuna" id="comuna" required>
              <option value="" selected disabled>Seleccione la Comuna</option>
            </select>
              </div>




        </div>
  </div>
  <hr>
  <h5>Detalle Financiero Empresa:</h5>
  <br>
  <div class="row" >

      
<div class="col-4"> 

        <div class="form-group">
          <label for="mme">Monto Mensual Empresa:</label>
          <input type="number"  class="form-control" id="mme" name="mme" maxlength="10" placeholder="Monto Mensual Empresa" required>
        </div>
        <div class="form-group">
          <label for="mre">Monto Renta Empresa:</label>
          <input type="number" class="form-control" id="mre" name="mre" maxlength="10"  placeholder="Monto Renta Empresa" required>
        </div>
        <div class="form-group">
          <label for="cse">Cons. Soc. Emp.:</label>
          <input type="number" class="form-control" id="cse" name="cse" maxlength="10"  placeholder="Cons. Soc. Emp." required>
        </div>
        <div class="form-group">
          <label for="rte">Reg. Trib. Emp.:</label>
          <input type="number" class="form-control" id="rte" name="rte" maxlength="10"  placeholder="Reg. Trib. Emp." required>
        </div>


        
</div>

<div class="col-4">

    <div class="form-group">
        <label for="pce">Patente Comercial:</label>
        <div class="row">
          <div class="col-12">
            <input type="text" class="form-control" id="pce" name="pce"  maxlength="10" placeholder="Patente Comercial" required>
          </div>
        </div>
    </div>

    <div class="form-group">
        <label for="pce">Evaluacion Empresa:</label>
        <div class="row">
          <div class="col-12">
            <input type="text" class="form-control" id="pce" name="pce"  maxlength="10" placeholder="Patente Comercial" required>
          </div>
        </div>
    </div>
    <div class="form-group">
      <label for="fia">Fecha Inicio Actividades:</label>
        <div class="row">
          <div class="col-12">
            <input type="date" class="form-control" id="fia" name="fia"  maxlength="150" placeholder="Fecha Inicio Actividades" required>
          </div>
        </div>
      </div>

      <div class="form-group">
          <label for="rae">Rta. At. Emp.:</label>
          <div class="row">
            <div class="col-12">
              <input type="number" class="form-control" id="rae" name="rae"  maxlength="10" placeholder="Rta. At. Emp." required>
            </div>
          </div>
      </div>  
    
    

</div>

  <div class="col-4">

      <div class="form-group">
        <label for="csii">Clave SII:</label>
        <input type="text" class="form-control" id="csii" name="csii" maxlength="45"  placeholder="Clave SII" required>
      </div>
      <div class="form-group">
       <label for="cprev">Clave Previred:</label>
       <input type="text" class="form-control" id="cprev" name="cprev" maxlength="45" placeholder="Clave Previred" required>
       </div>

       <div class="form-group">
        <label for="fre">Fac. Rea. Emp.:</label>
        <div class="row">
          <div class="col-12">
            <input type="text" class="form-control" id="fre" name="fre"  maxlength="10" placeholder="Fac. Rea. Emp." required>
          </div>
        </div>
        </div> 

         

  </div>
</div>
    <br>  
  <div class="col-12 text-center">
    <input type="submit" class="btn btn-outline-success" id="btnAc" name="btnAc" value="Crear Empresa" >                                         
  </div>
  <!-- Fin Row -->  
</form>
