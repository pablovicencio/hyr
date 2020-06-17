<?php
  session_start();
 
  	if( isset($_SESSION['id']) ){
  		//Si la sesión esta seteada no hace nada
  		$id_usu = $_SESSION['id'];
  	}
  	else{
 		//Si no lo redirige a la pagina index para que inicie la sesion	
 		echo("-3");
 		goto salir;
 	}      

 	require_once '../clases/clasePR.php';

 
 	try{


 		

 		$id_pr = $_POST['id'];
 		

 			$dao = new PrDAO($id_pr);
 		
			$anular_pr = $dao->anu_pr($id_usu);
			
			if ($anular_pr>0){
			
			echo"La proyeccion ha sido anulada exitosamente";    
			} else {
				//$enviar_pass = $fun->enviar_correo_pass($nom,$correo,$nueva_pass);
			
			echo"-2";  
				
					}
		
	
	salir:
 	} catch (Exception $e) {
		
		echo"-2"; 
  	}
 ?>