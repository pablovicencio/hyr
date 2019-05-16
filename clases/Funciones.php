<?php

require_once '../recursos/db/db.php';



/* INDICE
1°  cargar_id_emp
2°  cargar_pagos_doc
3°  cargar_datos_doc
4°  cargar_docs_emp
5°  cargar_forma_pago
6°  cargar_datos_emp
7°  cargar_datos_emp2
8°  cargar_tipo_doc
9°  cargar_empresas
10°  cargar_usuarios
11°  cargar_perfiles
12° cargar_cargos
13° validar_rut
14° generaPass
*/

class Funciones 
{

    /*///////////////////////////////////////
    //////////Cargar id empresa/////////////
    //////////////////////////////////////*/
    public function cargar_id_emp($rut_emp){

         try{
            
            
            $pdo = AccesoDB::getCon();
                    
            
                 $sql = "select id_emp from empresa where rut_emp = :rut_emp";
            
                   
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":rut_emp", $rut_emp, PDO::PARAM_STR);
            $stmt->execute();
            $response = $stmt->fetchColumn();
            return $response;
        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }
   /*///////////////////////////////////////
    Cargar datos Documento pendiente
    //////////////////////////////////////*/
    public function cargar_pagos_doc($id_doc){

         try{
            
            
            $pdo = AccesoDB::getCon();
                    
            
                 $sql = "select desc_item est, ifnull(sum(c.monto_mov),0) suma
                            from tab_param a, documento b left join mov_documento c on c.id_doc_mov = b.id_doc
                            where a.cod_grupo = 2
                            and a.cod_item = b.est_doc
                            and b.id_doc = :id_doc";
            
                   
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id_doc", $id_doc, PDO::PARAM_INT);
            $stmt->execute();
            $response = $stmt->fetchAll();
            return $response;
        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }
    /*///////////////////////////////////////
    Cargar datos Documento
    //////////////////////////////////////*/
    public function cargar_datos_doc($id_doc){

         try{
            
            
            $pdo = AccesoDB::getCon();
                    
            
                 $sql = "select * from documento where id_doc = :id_doc";
            
                   
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id_doc", $id_doc, PDO::PARAM_INT);
            $stmt->execute();
            $response = $stmt->fetchAll();
            return $response;
        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }
    /*///////////////////////////////////////
    Cargar documentos de Empresa
    //////////////////////////////////////*/
    public function cargar_docs_emp($id_emp,$sel){

         try{
            
            
            $pdo = AccesoDB::getCon();
                    
            if ($sel == 1 and $id_emp <> 0) {//documentos pendientes
                 $sql = "select *                
                from documento where emp_doc = :id_emp and est_doc in (1,2)";
            }else if ($sel == 2 and $id_emp <> 0) {
                $sql = "select a.id_doc,b.razon_social_emp, a.nro_doc, b.razon_social_emp, c.desc_item est, a.monto_afecto_doc, a.monto_exento_doc, a.monto_iva_doc,
                    a.monto_total_doc, a.fec_emi_doc, a.fec_ven_doc,d.desc_item tipo_doc, a.obs_doc,
                    (select sum(d.monto_mov) from mov_documento d where a.id_doc = d.id_doc_mov) suma,a.est_doc
                    from documento a, empresa b,tab_param c, tab_param d
                    where
                    a.emp_doc = b.id_emp
                    and c.cod_grupo = 2
                    and c.cod_item = a.est_doc
                    and d.cod_grupo = 1
                    and d.cod_item = a.tipo_doc
                    and emp_doc = :id_emp";
            }else if ($sel == 1 and $id_emp == 0) {
                $sql = "select a.id_doc, a.nro_doc, b.razon_social_emp, c.desc_item est, a.monto_afecto_doc, a.monto_exento_doc, a.monto_iva_doc,
                    a.monto_total_doc, a.fec_emi_doc, a.fec_ven_doc,d.desc_item tipo_doc, a.obs_doc,
                    (select sum(d.monto_mov) from mov_documento d where a.id_doc = d.id_doc_mov) suma
                    from documento a, empresa b,tab_param c , tab_param d
                    where
                    a.emp_doc = b.id_emp
                    and a.est_doc in (1,2)
                    and c.cod_grupo = 2
                    and c.cod_item = a.est_doc
                    and d.cod_grupo = 1
                    and d.cod_item = a.tipo_doc
                    and a.fec_ven_doc <= sysdate()
                    ";
            }   
                   
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id_emp", $id_emp, PDO::PARAM_INT);
            $stmt->execute();
            $response = $stmt->fetchAll();
            return $response;
        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }
    /*///////////////////////////////////////
    Cargar lista despegable de formas de pago
    //////////////////////////////////////*/
    public function cargar_forma_pago($vig){

        try{
            
            
            $pdo = AccesoDB::getCon();


    
                    if ($vig == 0) {
                            $sql = "";
                        }else if ($vig == 1){
                            $sql = "select id_formapago, desc_formapago from forma_pago where vig_formapago = 1";
                        }
                        

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;

        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }
    /*///////////////////////////////////////
    Cargar datos de Empresa por Rut
    //////////////////////////////////////*/
    public function cargar_datos_emp($rut_emp,$sel){

         try{
            
            
            $pdo = AccesoDB::getCon();
                    
            if ($sel == 1) {
                 $sql = "";
            }else if ($sel == 2) {
                $sql = "select *                
                from empresa where rut_emp = :rut_emp";
            }  
                   
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":rut_emp", $rut_emp, PDO::PARAM_INT);
            $stmt->execute();
            $response = $stmt->fetchAll();
            return $response;
        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }
    /*///////////////////////////////////////
    Cargar datos de Empresa por Id
    //////////////////////////////////////*/
    public function cargar_datos_emp2($id,$sel){

        try{
           
           
           $pdo = AccesoDB::getCon();
                   
           if ($sel == 1) {
                $sql = "";
           }else if ($sel == 2) {
               $sql = "select *                
               from empresa where id_emp = :id";
           }  
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(":id", $id, PDO::PARAM_INT);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
       }
   }
    /*////////////////////////////////////////////
    Cargar lista despegable de tipos de documentos
    /////////////////////////////////////////////*/
    public function cargar_tipo_doc($vig){

        try{
            
            
            $pdo = AccesoDB::getCon();


    
                    if ($vig == 0) {
                            $sql = "";
                        }else if ($vig == 1){
                            $sql = "select cod_item tipo, desc_item tipo_doc from tab_param where cod_grupo = 1 and cod_item <> 0 and vig_item = 1";
                        }
                        

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;

        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }
    /*///////////////////////////////////////
    Cargar lista despegable de empresas
    //////////////////////////////////////*/
    public function cargar_empresas($opcion){

        try{
            
            
            $pdo = AccesoDB::getCon();


    
                    if ($opcion == 0) {
                        $sql = "select id_emp, razon_social_emp from empresa order by 2";
                    }else if ($opcion == 1){
                        $sql = "select id_emp, razon_social_emp from empresa where vig_emp = 1 order by 2";
                    }else if($opcion == 2 ){
                        $sql = "select id_emp,razon_social_emp,rut_emp,ciudad_emp,comuna_emp,dir_emp,mail_emp,fec_cre_emp,u.nick_usu
                        from empresa,usuarios as u
                        where vig_emp = 1 and empresa.usu_cre_emp = u.id_usu";
                    }else if ($opcion == 3){
                        $sql = "select id_emp, razon_social_emp from empresa";
                    }

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;

        } catch (Exception $e) {
            echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
        }
    }
    /*////////////////////////////////////////////
    ///////////// CARGAR USUARIOS ////////////////
    ////////////////////////////////////////////*/ 
    public function cargar_usuarios($id_usu,$opc){
        try {
            
            $pdo = AccesoDB::getCon();

            if ($opc == 1)
            {
                $sql = "select u.id_usu,u.nom_usu,u.apepat_usu,u.apemat_usu,u.rut_usu,u.mail_usu,a.desc_item as id_perfil,u.fec_cre_usu,b.desc_item as cargo_usu,if(u.vig_usu = 1, 'VIGENTE','NO VIGENTE') as vig_usu,u.nick_usu
                from usuarios u, tab_param a, tab_param b
                where u.id_perfil = a.cod_item and a.cod_grupo = 3 and a.vig_item = 1
                and u.cargo_usu =  b.cod_item and b.cod_grupo = 4 and b.vig_item = 1 ";
            }
            else if($opc == 2)
            {
                $sql = "select u.id_usu,u.nom_usu,u.apepat_usu,u.apemat_usu,u.rut_usu,u.mail_usu,u.id_perfil,u.fec_cre_usu,u.cargo_usu,if(u.vig_usu = 1, 'VIGENTE','NO VIGENTE') as vig_usu,u.nick_usu
                from usuarios u, tab_param a, tab_param b
                where u.id_perfil = a.cod_item and a.cod_grupo = 3 and a.vig_item = 1
                and u.cargo_usu =  b.cod_item and b.cod_grupo = 4 and b.vig_item = 1 and u.id_usu = :id_usu";
            }


            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id_usu", $id_usu, PDO::PARAM_INT);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;
            
        } catch (\Throwable $th) {
            echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
        }
    }
    /*////////////////////////////////////////////
    ///////////// CARGAR PERFILES ////////////////
    ////////////////////////////////////////////*/ 
    public function cargar_perfiles($vig_usu){
        try {
            
            $pdo = AccesoDB::getCon();


            if ($vig_usu == 0) {
                $sql = "select cod_item id_perfil, desc_item perfil from tab_param where cod_grupo = 2 and cod_item <> 0";
            }else if ($vig_usu == 1) {
                $sql = "select cod_item id_perfil, desc_item perfil from tab_param where cod_grupo = 2 and cod_item <> 0 and vig_item = 1";
            }  

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;
            
        } catch (\Throwable $th) {
            echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
        }
    }
    /*////////////////////////////////////////////
    ///////////// CARGAR CARGOS //////////////////
    ////////////////////////////////////////////*/ 
    public function cargar_cargos($vig_cargo){
        try {
            
            $pdo = AccesoDB::getCon();

            if ($vig_cargo == 0) {
                $sql = "select cod_item id_cargo, desc_item cargo from tab_param where cod_grupo = 3 and cod_item <> 0";
            }else if ($vig_cargo == 1) {
                $sql = "select cod_item id_cargo, desc_item cargo from tab_param where cod_grupo = 3 and cod_item <> 0 and vig_item = 1";
            }  

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;
            
        } catch (\Throwable $th) {
            echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
        }
    }
    /*////////////////////////////////////////////
    ////////////// VALIDAR RUT  //////////////////
    ////////////////////////////////////////////*/ 
    public function validar_rut($rut,$opc){
        try {
            
            $pdo = AccesoDB::getCon();

            if($opc == 1){
                $sql = "SELECT rut_usu FROM usuarios where rut_usu = :rut";
            } else if($opc == 2){
               $sql = "SELECT rut_emp FROM empresa where rut_emp = :rut";
            } else if($opc == 3){
               //opciones adicionales
            }

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":rut", $rut, PDO::PARAM_STR);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;
            
        } catch (\Throwable $th) {
            echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
        }
    }
    /*////////////////////////////////////////////
    ////////////// GENERAR PASS //////////////////
    ////////////////////////////////////////////*/ 
    public function generaPass(){
        //Se define una cadena de caractares. Te recomiendo que uses esta.
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        //Obtenemos la longitud de la cadena de caracteres
        $longitudCadena=strlen($cadena);
         
        //Se define la variable que va a contener la contraseña
        $pass = "";
        //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
        $longitudPass=6;
         
        //Creamos la contraseña
        for($i=1 ; $i<=$longitudPass ; $i++){
            //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
            $pos=rand(0,$longitudCadena-1);
         
            //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }

}
?>