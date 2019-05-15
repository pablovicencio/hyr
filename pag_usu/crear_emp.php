<form id="formCrearUsu" onsubmit="return false;"  >
  <!-- Inicio Row -->
  <div class="row" >
      <div class="col-4">

              <div class="form-group">
                <label for="rsoc">Razón Social:</label>
                  <div class="row">
                    <div class="col-12">
                      <input type="text" class="form-control" id="rsocial" name="rsocial"  maxlength="150" placeholder="Razón Social Empresa" required>
                    </div>
                  </div>
              </div>
              <div class="form-group">
                  <label for="Rut">Rut:</label>
                  <div class="row">
                    <div class="col-12">
                      <input type="text" class="form-control" id="Rut" name="Rut"  maxlength="10" placeholder="xxxxxxxx-x" required>
                    </div>
                  </div>
              </div>
              <div class="form-group">
                  <label for="cse">Cons. Soc. Empresa:</label>
                  <div class="row">
                    <div class="col-12">
                      <input type="number" class="form-control" id="cse" name="cse"  maxlength="" placeholder="Cons. Soc. Empresa" required>
                    </div>
                  </div>
              </div>
              <div class="form-group">
                <label for="mme">Monto Mensual Empresa:</label>
                <input type="number"  class="form-control" id="mme" name="mme" maxlength="10" placeholder="Monto Mensual Empresa" required>
              </div>
              <div class="form-group">
                <label for="mre">Monto Renta Empresa:</label>
                <input type="number" class="form-control" id="mre" name="mre" maxlength="10"  placeholder="Monto Renta Empresa" required>
              </div>
              
      </div>

    <div class="col-4">

          <div class="form-group">
            <label for="ape">Perfil de Sistema:</label>
            <select class="form-control" name="perfil" id="perfil" required>
              <option value="" selected disabled>Seleccione el perfil</option>
              <?php 
              $re = $fun->cargar_perfiles(1);   
              foreach($re as $row)      
              {
              ?>
              <option value="<?php echo $row['id_perfil'] ?>"><?php echo $row['perfil'] ?></option>

              <?php
              }    
              ?>       
            </select>
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
              ?>       
            </select>
          </div>



          <div class="form-group">
             <label for="mail">Nickname:</label>
             <input type="text" class="form-control" id="nick" name="nick" maxlength="20"  required>
          </div>
          



    </div>

    <div class="col-4">

            <div class="form-group">
            <label for="ape">Perfil de Sistema:</label>
            <select class="form-control" name="perfil" id="perfil" required>
                <option value="" selected disabled>Seleccione el perfil</option>
                <?php 
                $re = $fun->cargar_perfiles(1);   
                foreach($re as $row)      
                {
                ?>
                <option value="<?php echo $row['id_perfil'] ?>"><?php echo $row['perfil'] ?></option>

                <?php
                }    
                ?>       
            </select>
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
                ?>       
            </select>
            </div>



            <div class="form-group">
            <label for="mail">Nickname:</label>
            <input type="text" class="form-control" id="nick" name="nick" maxlength="20"  required>
            </div>




            </div>

  </div>

      
  <div class="col-12 text-center">
    <input type="submit" class="btn btn-outline-success" id="btnAc" name="btnAc" value="Crear Usuario" >                                         
  </div>
  <!-- Fin Row -->  
</form>
