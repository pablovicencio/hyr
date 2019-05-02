<?php

require_once '../recursos/db/db.php';


class Funciones 
{

   
    /*///////////////////////////////////////
    Cargar lista despegable de tipos de documentos
    //////////////////////////////////////*/
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
        public function cargar_empresas($vig){

            try{
                
                
                $pdo = AccesoDB::getCon();


        
                        if ($vig == 0) {
                                $sql = "select id_emp, razon_social_emp
                                        from empresa order by 2";
                            }else if ($vig == 1){
                                $sql = "select id_emp, razon_social_emp
                                        from empresa where vig_emp = 1 order by 2";
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


}
?>