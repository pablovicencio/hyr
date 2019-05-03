<?php
require_once '../recursos/db/db.php';

/*/////////////////////////////
Clase Documento
////////////////////////////*/

class DocumentoDAO    
{
    private $id_doc;
    private $nro_doc;
    private $afecto_doc;
    private $exento_doc;
    private $iva_doc;
    private $total_doc;
    private $fec_ven_doc;
    private $fec_emi_doc;
    private $tipo_doc;
    private $est_doc;
    private $fec_reg_doc;
    private $periodo_doc;
    private $obs_doc;
    




    public function __construct($id_doc=null,
                                $nro_doc=null,
                                $afecto_doc=null,
                                $exento_doc=null,
                                $iva_doc=null,
                                $total_doc=null,
                                $fec_ven_doc=null,
                                $fec_emi_doc=null,
                                $tipo_doc=null,
                                $est_doc=null,
                                $fec_reg_doc=null,
                                $periodo_doc=null,
                                $obs_doc=null) 
                                {


$this->id_doc      =$id_doc;
$this->nro_doc     =$nro_doc;
$this->afecto_doc  =$afecto_doc;
$this->exento_doc  =$exento_doc;
$this->iva_doc     =$iva_doc;
$this->total_doc   =$total_doc;
$this->fec_ven_doc =$fec_ven_doc;
$this->fec_emi_doc =$fec_emi_doc;
$this->tipo_doc    =$tipo_doc;
$this->est_doc     =$est_doc;
$this->fec_reg_doc =$fec_reg_doc;
$this->periodo_doc =$periodo_doc;
$this->obs_doc =$obs_doc;
                                    

    }

    public function getdoc() {
    return $this->id_doc;
    }

    /*///////////////////////////////////////
    Ingresar Documento
    //////////////////////////////////////*/
    public function ing_doc($usu,$emp) {


        try{
             
                $pdo = AccesoDB::getCon();

                $sql_ing_doc = "INSERT INTO `documento`
                (`nro_doc`,`monto_afecto_doc`,`monto_exento_doc`,`monto_iva_doc`,`monto_total_doc`,
                  `fec_ven_doc`,`fec_emi_doc`,`tipo_doc`,`est_doc`,`fec_reg_doc`,`usu_reg_doc`,`emp_doc`, `obs_doc`)
                VALUES
                (:nro_doc,:afecto,:exento,:iva,:total,:fec_ven_doc,:fec_emi_doc,:tipo_doc,:est_doc,
                :fec_reg_doc,:usu_reg_doc,:emp_doc, :obs_doc);";


                $stmt = $pdo->prepare($sql_ing_doc);
                $stmt->bindParam(":nro_doc", $this->nro_doc, PDO::PARAM_INT);
                $stmt->bindParam(":afecto", $this->afecto_doc, PDO::PARAM_INT);
                $stmt->bindParam(":exento", $this->exento_doc, PDO::PARAM_INT);
                $stmt->bindParam(":iva", $this->iva_doc, PDO::PARAM_INT);
                $stmt->bindParam(":total", $this->total_doc, PDO::PARAM_INT);
                $stmt->bindParam(":fec_ven_doc", $this->fec_ven_doc, PDO::PARAM_STR);
                $stmt->bindParam(":fec_emi_doc", $this->fec_emi_doc, PDO::PARAM_STR);
                $stmt->bindParam(":tipo_doc", $this->tipo_doc, PDO::PARAM_INT);
                $stmt->bindParam(":est_doc", $this->est_doc, PDO::PARAM_INT);
                $stmt->bindParam(":fec_reg_doc", $this->fec_reg_doc, PDO::PARAM_STR);
                $stmt->bindParam(":usu_reg_doc", $usu, PDO::PARAM_INT);
                $stmt->bindParam(":emp_doc", $emp, PDO::PARAM_INT);
                $stmt->bindParam(":obs_doc", $this->obs_doc, PDO::PARAM_STR);
                $stmt->execute();

                
                    return $stmt->rowCount();
                 
        

            } catch (Exception $e) {
                echo"-1";
                //echo $e->getMessage();
            }
    }








  


}

    ?>