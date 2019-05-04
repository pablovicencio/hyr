<?php

require_once '../recursos/db/db.php';


class Funciones 
{

   /*///////////////////////////////////////
    Cargar datos Documento pendiente
    //////////////////////////////////////*/
    public function cargar_pagos_doc($id_doc){

         try{
            
            
            $pdo = AccesoDB::getCon();
                    
            
                 $sql = "select desc_item est, sum(c.monto_mov) suma
                            from tab_param a, documento b, mov_documento c
                            where a.cod_grupo = 2
                            and a.cod_item = b.est_doc
                            and c.id_doc_mov = b.id_doc
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
                $sql = "";
            }else if ($sel == 1 and $id_emp == 0) {
                $sql = "select a.id_doc, a.nro_doc, b.razon_social_emp, c.desc_item est, a.monto_afecto_doc, a.monto_exento_doc, a.monto_iva_doc,
                    a.monto_total_doc, a.fec_emi_doc, a.fec_ven_doc,a.tipo_doc, a.obs_doc,
                    (select sum(d.monto_mov) from mov_documento d where a.id_doc = d.id_doc_mov) suma
                    from documento a, empresa b,tab_param c
                    where
                    a.emp_doc = b.id_emp
                    and a.est_doc in (1,2)
                    and c.cod_grupo = 2
                    and c.cod_item = a.est_doc
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
    Cargar datos de Empresa
    //////////////////////////////////////*/
    public function cargar_datos_emp($id_emp,$sel){

         try{
            
            
            $pdo = AccesoDB::getCon();
                    
            if ($sel == 1) {
                 $sql = "";
            }else if ($sel == 2) {
                $sql = "select *                
                from empresa where id_emp = :id_emp";
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