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

		$emp = stripcslashes ($_POST['emp']);
		$graf = stripcslashes ($_POST['graf']);

		 $fun = new Funciones();
		 $re = $fun->cargar_datos_f29graf($emp,$graf);
		 
		 if (!empty($re)) {
		 	          

          foreach($re as $row){

                $datos [] = array(
        							"periodo" => $row["periodo"], 
        							"value1" => $row["val1"],
        							"value2" => $row["val2"]
      							); 
    
              }
		
		$json = json_encode($datos);  //encode the array into a valid JSON object
  		echo $json; //output the JSON
		 }


	
	} catch (Exception $e) {
		//echo($e);
		echo"'Error, verifique los datos'",  $e->getMessage(); 

	}
?>