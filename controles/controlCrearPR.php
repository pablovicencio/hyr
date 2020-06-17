<?php
  session_start();
 
  	if( isset($_SESSION['id']) and ($_SESSION['perfil'] <> 0) ){
  		//Si la sesión esta seteada no hace nada
  		$id_usu = $_SESSION['id'];
  	}
  	else{
 		//Si no lo redirige a la pagina index para que inicie la sesion	
 		echo("-3");
 		goto salir;
 	}      

     require_once '../clases/clasePR.php';
     require_once '../clases/Funciones.php';
 

 	try{

        
        $id_emp = $_POST['emp'];
        $trib = $_POST['trib'];
        $periodo = $_POST['periodo'];
        $util_ejer = str_replace(",","",(str_replace(".","",$_POST['util_ejer'])));
        $base_idpc = $_POST['base_idpc'];
        $idpc = $_POST['idpc'];
        $ppmo = str_replace(",","",(str_replace(".","",$_POST['ppmo'])));
        $ppmv = str_replace(",","",(str_replace(".","",$_POST['ppmv'])));
        $fec_reg = date("Y-m-d h:i:s", time());
        $pr = str_replace(",","",(str_replace(".","",$_POST['pr'])));
        $gc = $_POST['gc'];
        $vig = 1;

        
        
        $TableData = stripcslashes ($_POST['data']);

        // Decodificar el array JSON
        $TableData= json_decode($TableData,TRUE);


        $fecha_per = date_create($periodo);
        $fecha_per = date_format($fecha_per,"m-Y");

        $func = new Funciones();


        $val_pr = $func->val_periodo_pr($id_emp,$fecha_per,0);  

        if ($val_pr['val'] == 0) {
            $dao = new PrDAO('',$id_emp,$trib,$periodo,$util_ejer,$base_idpc,$idpc,$ppmo,$ppmv,$fec_reg,$id_usu,$pr,$gc,$TableData, $vig);

            $ing_pr = $dao->ing_pr();                 
                    

                if(count($ing_pr)==0){
                    echo "2";    
                }else{
                   echo "Proyección de Renta Ingresada Correctamente!";
                }

        }else{
            echo "-1"; 
        }

        

      

	
	
        salir:
    } catch (Exception $e) {
       //ERROR DE BASE DE DATOS
       echo "1"; 
     }
?>