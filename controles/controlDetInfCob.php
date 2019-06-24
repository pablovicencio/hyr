<?php
 session_start();

 if( isset($_SESSION['id']) and ($_SESSION['perfil'] <> 0) ){
    //Si la sesión esta seteada no hace nada
    $id_usu = $_SESSION['id'];
  }
  else{
    //Si no lo redirige a la pagina index para que inicie la sesion 
    header("location: ../index.html");
  }  

	require_once '../clases/Funciones.php';

	try{

		if (isset($_POST['fec_desde'])) {
			$desde = stripcslashes ($_POST['fec_desde']);
		}else{
			$desde = 0;
		}

		if (isset($_POST['fec_hasta'])) {
			$hasta = stripcslashes ($_POST['fec_hasta']);
		}else{
			$hasta = 0;
		}

		
		$emp = stripcslashes ($_POST['emp']);
		
		 $fun = new Funciones();
		 $re = $fun->inf_det_cob($emp,$desde,$hasta);
		 
		 if (!empty($re)) {
		 	          $datos = array();


          foreach($re as $row){

               echo $datos[] = $row;
    
              }
		ob_end_clean();
		
		echo json_encode($datos);
		 }


	
	} catch (Exception $e) {
		//echo($e);
		echo"'Error, verifique los datos'",  $e->getMessage(); 

	}
?>