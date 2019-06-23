

<div class="row">
<div class="col-12 text-center">
  <nav class="navbar navbar-expand-md navbar-dark" style ="background-color:#0a4f90 ">
        <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="false">
              <span class="navbar-toggler-icon"></span>
              </button>
              <div class="navbar-collapse collapse" id="navb" >
              <ul class="navbar-nav" >
                <li class="nav-item "><a class="nav-link" href="inicio.php"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp;Inicio </a></li> 
                <li class="nav-item "><a class="nav-link" href="mis_datos.php"><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;Mis Datos
                </a></li> 
                <!-- Dropdown -->
                <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;Clientes</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="empresas.php">Empresas &nbsp;<i class="fa fa-building" aria-hidden="true"></i></a>
                        <a class="dropdown-item" href="#">Personas &nbsp;<i class="fa fa-plus-square" aria-hidden="true"></i></a>
                        <a class="dropdown-item" href="#">Sociedades &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                      </div>
                    </li>  

                <!-- Dropdown -->
               
                <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;Cobranza</a>
                      <div class="dropdown-menu">
                       <a class="dropdown-item" href="consulta_doc.php">Consulta &nbsp;<i class="fa fa-eye" aria-hidden="true"></i></a>


                      <?php if($_SESSION['perfil']==1){echo '<a class="dropdown-item" href="ing_doc.php">Ingresar Documento &nbsp;<i class="fa fa-plus-square" aria-hidden="true"></i></a>';}?>

                       
                        <a class="dropdown-item" href="ing_pago.php">Ingresar Pago &nbsp;<i class="fa fa-dollar" aria-hidden="true"></i></a>
                        <a class="dropdown-item" href="inf_cob.php">Informes  &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      </div>
                    </li>

                
                <?php if($_SESSION['perfil']==1){echo '<li class="nav-item "><a class="nav-link" href="usuarios.php"><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;Usuarios</a></li> ';}?>
              </ul>
            </div>
      </nav> 
  </div>
</div>
  


