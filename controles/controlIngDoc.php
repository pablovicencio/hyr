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

 	require_once '../clases/ClaseDocumento.php';
 	require_once '../clases/ClaseEmpresa.php';
 	require_once '../clases/ClaseUsuario.php';
 
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

 		
 			$emp = new EmpresaDAO($id_emp);

 			$usu = new UsuarioDAO($id_usu);

 			$dao = new DocumentoDAO('',$num_doc, $afecto, $exento, $iva, $total, $fec_ven, $fec_emi, $tipo_doc, $est,  $fec_reg, '', $obs_doc);
 		
			$ing_doc = $dao->ing_doc($usu->getUsu(),$emp->getEmp());
			
			if (count($ing_doc)>0){
			
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