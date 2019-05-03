<?php
require_once '../recursos/db/db.php';

/*/////////////////////////////
Clase Empresa
////////////////////////////*/

class EmpresaDAO    
{
    private $id_emp;
    private $razon_social_emp;
    private $cons_soc_emp;
    private $monto_mensual_emp;
    private $monto_renta_emp;
    private $ciudad_emp;
    private $comuna_emp;
    private $dir_emp;
    private $reg_trib_emp;
    private $fec_ini_act_emp;
    private $mail_emp;
    private $nom_contacto_emp;
    private $patente_comer_emp;
    private $evaluacion_emp;
    private $vig_emp;
    private $fec_cre_emp;
    private $clave_previred_emp;
    private $clave_sii_emp;
    private $fac_rea_emp;
    private $rta_at_emp;






    public function __construct($id_emp=null,
                                $razon_social_emp=null,
                                $cons_soc_emp=null,
                                $monto_mensual_emp=null,
                                $monto_renta_emp=null,
                                $ciudad_emp=null,
                                $comuna_emp=null,
                                $dir_emp=null,
                                $reg_trib_emp=null,
                                $fec_ini_act_emp=null,
                                $mail_emp=null,
                                $nom_contacto_emp=null,
                                $patente_comer_emp=null,
                                $evaluacion_emp=null,
                                $vig_emp=null,
                                $fec_cre_emp=null,
                                $clave_previred_emp=null,
                                $clave_sii_emp=null,
                                $fac_rea_emp=null,
                                $rta_at_emp=null) 
                                {


    $this->id_emp               = $id_emp;
    $this->razon_social_emp    = $razon_social_emp;
    $this->cons_soc_emp        = $cons_soc_emp;
    $this->monto_mensual_emp   = $monto_mensual_emp;
    $this->monto_renta_emp     = $monto_renta_emp;
    $this->ciudad_emp          = $ciudad_emp;
    $this->comuna_emp          = $comuna_emp;
    $this->dir_emp             = $dir_emp;
    $this->reg_trib_emp        = $reg_trib_emp;
    $this->fec_ini_act_emp     = $fec_ini_act_emp;
    $this->mail_emp            = $mail_emp;
    $this->nom_contacto_emp    = $nom_contacto_emp;
    $this->patente_comer_emp   = $patente_comer_emp;
    $this->evaluacion_emp      = $evaluacion_emp;
    $this->vig_emp             = $vig_emp;
    $this->fec_cre_emp         = $fec_cre_emp;
    $this->clave_previred_emp  = $clave_previred_emp;
    $this->clave_sii_emp       = $clave_sii_emp;
    $this->fac_rea_emp         = $fac_rea_emp;
    $this->rta_at_emp          = $rta_at_emp;

    }

    public function getEmp() {
    return $this->id_emp;
    }










  


}

    ?>