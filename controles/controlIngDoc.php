<?php
  session_start();
 
  	if( isset($_SESSION['id']) and ($_SESSION['perfil'] <> 0)and isset($_POST['emp']) ){
  		//Si la sesión esta seteada no hace nada
  		$id_usu = $_SESSION['id'];
  	}
  	else{
 		//Si no lo redirige a la pagina index para que inicie la sesion	
 		echo("-3");
 		goto salir;
 	}      

 	require_once '../clases/claseDocumento.php';
 	require_once '../clases/claseEmpresa.php';
 	require_once '../clases/claseUsuario.php';
 	require_once '../clases/Funciones.php';
 
 	try{
 		$id_emp = $_POST['emp'];

 		$num_doc = $_POST['num_doc'];
 		$afecto = $_POST['afecto'];
 		$fec_emi = $_POST['fec_emi'];
 		$tipo_doc = $_POST['tipo_doc'];
 		$exento = $_POST['exento'];
 		$fec_ven = $_POST['fec_ven'];
 		$iva = $_POST['iva'];
 		$total = $_POST['total'];
 		$fec_reg = date("Y-m-d h:m:s", time());
 		$est = 1;
 		if (isset($_POST['obs_doc'])) {
 			$obs_doc = $_POST['obs_doc'];
 		}else{
 			$obs_doc = '';
 		}

 			$fun = new Funciones();

 			$emp = new EmpresaDAO($id_emp);
		 	
 			$usu = new UsuarioDAO($id_usu);

 			$dao = new DocumentoDAO('',$num_doc, $afecto, $exento, $iva, $total, $fec_ven, $fec_emi, $tipo_doc, $est,  $fec_reg, '', $obs_doc);
 		
			$ing_doc = $dao->ing_doc($usu->getUsu(),$emp->getEmp());
			
			if ($ing_doc>0){

				$datos_mail = $fun->datos_mail($num_doc);

				$mail = $fun->mail_ing_doc($datos_mail[0]['nom_emp'],$datos_mail[0]['mail_emp'],$datos_mail[0]['tipo'],$num_doc,$total, $fec_ven);	
				
				echo"Documento Nro. ".$num_doc." ingresado correctamente";



			} else {
				//$enviar_pass = $fun->enviar_correo_pass($nom,$correo,$nueva_pass);
			
			echo"-2";  
				
					}
		
	
	salir:
 	} catch (Exception $e) {
		
		echo"-2"; 
  	}
 ?>