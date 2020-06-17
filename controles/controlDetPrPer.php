<?php
 session_start();

 if( isset($_SESSION['id']) and ($_SESSION['perfil'] <> 0)  ){
    //Si la sesión esta seteada no hace nada
    $id = $_SESSION['id'];
  }
  else{
    //Si no lo redirige a la pagina index para que inicie la sesion 
    header("location: ../index.html");
  }  

	require_once '../clases/Funciones.php';

	try{

		$id_pr = stripcslashes ($_POST['id']);

		 $fun = new Funciones();
		 $re = $fun->cargar_det_pr_per($id_pr);
		 


          $datos = array();


          foreach($re as $row){

                $datos[] = $row;
    
              }
		ob_end_clean();
		
		echo json_encode($datos);
	
	} catch (Exception $e) {
		//echo($e);
		echo"'Error, verifique los datos'",  $e->getMessage(); 

	}
?>