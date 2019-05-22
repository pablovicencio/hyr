<?php
  session_start();
 
  	if( isset($_SESSION['id']) and ($_SESSION['perfil'] <> 0)and isset($_POST['id_doc']) ){
  		//Si la sesión esta seteada no hace nada
  		$id_usu = $_SESSION['id'];
  	}
  	else{
 		//Si no lo redirige a la pagina index para que inicie la sesion	
 		echo("-3");
 		goto salir;
 	}      

 	require_once '../clases/claseDocumento.php';
 	require_once '../clases/claseUsuario.php';
 	require_once '../clases/Funciones.php';
 
 	try{
 		$id_doc = $_POST['id_doc'];

 		$monto_mov = $_POST['monto_pago'];
 		$fec_reg = date("Y-m-d h:m:s", time());
 		$cod_formapago_mov = $_POST['forma_pago'];
 		$suma_pago = $_POST['monto_pagado'];
 		$fun = new Funciones(); 

 		$re = $fun->cargar_datos_doc($id_doc);  
 	
 		if ($re[0]['monto_total_doc'] > ($monto_mov+$suma_pago)) {
 			$est_mov = 2;
 			$est_msg = 'parcialmente';
 		}else{
 			$est_mov = 3;
 			$est_msg = 'completamente';
 		}

 		if (isset($_POST['obs_pago'])) {
 			$obs_mov = $_POST['obs_pago'];
 		}else{
 			$obs_mov = '';
 		}

 			$usu = new UsuarioDAO($id_usu);

 			$dao = new DocumentoDAO($id_doc);
 		
			$pago_doc = $dao->pago_doc($usu->getUsu(),$monto_mov,$obs_mov,$fec_reg,$cod_formapago_mov,$est_mov);
			
			if ($pago_doc>0){
			
			echo"Documento pagado ".$est_msg;    
			} else {
				//$enviar_pass = $fun->enviar_correo_pass($nom,$correo,$nueva_pass);
			
			echo"-2";  
				
					}
		
	
	salir:
 	} catch (Exception $e) {
		
		echo"-2"; 
  	}
 ?>