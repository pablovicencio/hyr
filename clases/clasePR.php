<?php
require_once '../recursos/db/db.php';

/*/////////////////////////////
Clase Proyeccion de Renta
////////////////////////////*/

class PrDAO    
{
    private $id_pr;
    private $emp;
    private $trib;
    private $periodo;
    private $util_ejer;
    private $base_idpc;
    private $idpc;
    private $ppmo;
    private $ppmv;
    private $fec_reg;
    private $id_usu;
    private $pr;
    private $gc;
    private $data;
    private $vig;

    




    public function __construct($id_pr=null,
                                $emp=null,
                                $trib=null,
                                $periodo=null,
                                $util_ejer=null,
                                $base_idpc=null,
                                $idpc=null,
                                $ppmo=null,
                                $ppmv=null,
                                $fec_reg=null,
                                $id_usu=null,
                                $pr=null,
                                $gc=null,
                                $data=null,
                                $vig=null) 
                                {

$this->id_pr        =$id_pr;
$this->emp          =$emp;
$this->trib         =$trib;
$this->periodo      =$periodo;
$this->util_ejer    =$util_ejer;
$this->base_idpc    =$base_idpc;
$this->idpc         =$idpc;
$this->ppmo         =$ppmo;
$this->ppmv         =$ppmv;
$this->fec_reg      =$fec_reg;
$this->id_usu       =$id_usu;
$this->pr           =$pr;
$this->gc           =$gc;
$this->data         =$data;
$this->vig         =$vig;


                                    

    }

    public function getPr() {
    return $this->id_pr;
    }


    /*///////////////////////////////////////
    Ingresar Proyeccion de renta
    //////////////////////////////////////*/
    public function ing_pr() {


        try{
             
                $pdo = AccesoDB::getCon();

                $sql_pr = "INSERT INTO `proyeccion_renta`(
                                        `periodo_pr`,
                                        `util_ejer_pr`,
                                        `base_idpc_pr`,
                                        `idpc_pr`,
                                        `proy_renta`,
                                        `emp_pr`,
                                        `reg_trib_pr`,
                                        `ppmo_pr`,
                                        `ppmv_pr`,
                                        `gc_pr`,
                                        `usu_pr`,
                                        `fec_reg_pr`,
                                        `vig_pr`)
                                        VALUES
                                        (
                                        :per,
                                        :util,
                                        :base_idpc,
                                        :idpc,
                                        :pr,
                                        :emp,
                                        :reg_trib,
                                        :ppmo,
                                        :ppmv,
                                        :gc,
                                        :usu,
                                        :fec_reg,
                                        :vig);";

                    $stmt = $pdo->prepare($sql_pr);
                            $stmt->bindParam("per", $this->periodo, PDO::PARAM_STR);
                            $stmt->bindParam("util", $this->util_ejer, PDO::PARAM_INT);
                            $stmt->bindParam("base_idpc", $this->base_idpc, PDO::PARAM_INT);
                            $stmt->bindParam("idpc", $this->idpc, PDO::PARAM_INT);
                            $stmt->bindParam("pr", $this->pr, PDO::PARAM_INT);
                            $stmt->bindParam("emp", $this->emp, PDO::PARAM_INT);
                            $stmt->bindParam("reg_trib", $this->trib, PDO::PARAM_INT);
                            $stmt->bindParam("ppmo", $this->ppmo, PDO::PARAM_INT);
                            $stmt->bindParam("ppmv", $this->ppmv, PDO::PARAM_INT);
                            $stmt->bindParam("gc", $this->gc, PDO::PARAM_INT);
                            $stmt->bindParam("usu", $this->id_usu, PDO::PARAM_INT);
                            $stmt->bindParam("fec_reg", $this->fec_reg, PDO::PARAM_STR);
                            $stmt->bindParam("vig", $this->vig, PDO::PARAM_INT);
                            
                    $stmt->execute();



                $sql= " SELECT id_pr FROM `proyeccion_renta` ORDER BY id_pr DESC LIMIT 1 ";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $id = $stmt->fetchColumn();



                foreach ($this->data as $row) {
                              $part = $row['part'];
                              $atrib = $row['atrib'];
                              $cred = $row['cred'];
                              $igc = $row['igc'];
                              $igc_total = $row['igc_total'];
                              $id_per = $row['per'];

                              $igc_total = str_replace(",","",(str_replace(".","",$igc_total)));
                              $atrib = str_replace(",","",(str_replace(".","",$atrib)));
                              $cred = str_replace(",","",(str_replace(".","",$cred)));
                              $igc = str_replace(",","",(str_replace(".","",$igc)));

                         
                                  $sql_det_pr = "INSERT INTO `proyeccion_renta_det`
                                                  (
                                                    `participacion_prd`,
                                                    `atrib_prd`,
                                                    `cred_prd`,
                                                    `igc_prd`,
                                                    `igc_total`,
                                                    `id_pr`,
                                                    `id_per`)
                                                    VALUES
                                                    (
                                                    :part,
                                                    :atrib,
                                                    :cred,
                                                    :igc,
                                                    :igc_total,
                                                    :id_pr,
                                                    :id_per);";


                                $stmt = $pdo->prepare($sql_det_pr);
                                        $stmt->bindParam("part", $part, PDO::PARAM_INT);
                                        $stmt->bindParam("atrib", $atrib, PDO::PARAM_INT);
                                        $stmt->bindParam("cred", $cred, PDO::PARAM_INT);
                                        $stmt->bindParam("igc", $igc, PDO::PARAM_INT);
                                        $stmt->bindParam("igc_total", $igc_total, PDO::PARAM_INT);
                                        $stmt->bindParam("id_pr", $id, PDO::PARAM_INT);
                                        $stmt->bindParam("id_per", $id_per, PDO::PARAM_INT);

                                $stmt->execute();
                
                 }

                    return $stmt->rowCount();

                
                
                
                 
        

            } catch (Exception $e) {
                //echo"-1";
                echo $e->getMessage();
            }
    }




    /*///////////////////////////////////////
    Anular PR
    //////////////////////////////////////*/
    public function anu_pr($usu_anu) {


        try{
             
                $pdo = AccesoDB::getCon();


                    $sql_anu_pr = "update proyeccion_renta
                                set vig_pr = 2, usu_anu = :usu
                                where id_pr = :pr";


                    $stmt = $pdo->prepare($sql_anu_pr);
                    $stmt->bindParam(":usu", $usu_anu, PDO::PARAM_INT);
                    $stmt->bindParam(":pr", $this->id_pr, PDO::PARAM_INT);
                    $stmt->execute();

                    return $stmt->rowCount();

                

                
                
                
                 
        

            } catch (Exception $e) {
                //echo"-1";
                echo $e->getMessage();
            }
    }

  


}

    ?>