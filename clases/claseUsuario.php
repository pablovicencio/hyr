<?php
require_once '../recursos/db/db.php';

/*/////////////////////////////
Clase Usuario
////////////////////////////*/

class UsuarioDAO    
{
    private $id_usu;
    private $nombre;
    private $ape_pat;
    private $ape_mat;
    private $rut;
    private $mail;
    private $perfil;
    private $cargo;
    private $pass;
    private $vigencia;
    private $nick;






    public function __construct($id_usu=null,
                                $rut=null,
                                $nombre=null,
                                $ape_pat=null,
                                $ape_mat=null,
                                $mail=null,
                                $perfil=null,
                                $cargo=null,
                                $pass=null,
                                $vigencia=null,
                                $nick=null) 
                                {


    $this->id_usu       = $id_usu;
    $this->rut          = $rut;
    $this->nombre       = $nombre;
    $this->ape_pat      = $ape_pat;
    $this->ape_mat      = $ape_mat;
    $this->mail         = $mail;
    $this->perfil       = $perfil;
    $this->cargo        = $cargo;
    $this->pass         = $pass;
    $this->vigencia     = $vigencia;
    $this->nick         = $nick;
    }

    public function getusu() {
    return $this->id_usu;
    }

    /*///////////////////////////////////////
    Login 
    //////////////////////////////////////*/
    public function login(){

        try{

                
                $pdo = AccesoDB::getCon();

                $sql_login = "select id_usu id, concat(nom_usu,' ',apepat_usu) nom,mail_usu,id_perfil,pass_usu,cargo_usu
                from usuarios where vig_usu = 1 and rut_usu = :rut";

                $stmt = $pdo->prepare($sql_login);
                $stmt->bindParam(":rut", $this->rut, PDO::PARAM_STR);
           
                $stmt->execute();

               

                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($this->pass == $row["pass_usu"]){
                    session_start();
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['mail'] = $row['mail_usu'];
                        $_SESSION['nom'] = $row['nom'];
                        $_SESSION['perfil'] = $row['id_perfil'];
                        $_SESSION['cargo'] = $row['cargo_usu'];
                        $_SESSION['start'] = time();
                        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
                        
                        //echo"<script type=\"text/javascript\">       window.location='../pag_usu/inicio.php';</script>";
                        echo"0";
                         
                        
                }else{
                    
                   echo "-2";
                   //echo"<script type=\"text/javascript\">alert('Error, favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema.');window.location='../index.html';</script>"; 
                }
             
 

        

        } catch (Exception $e) {
                echo"-1";
                //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>"; 
        }
    }





    /*///////////////////////////////////////
    Crear Usuario
    //////////////////////////////////////*/
    public function crear_usuario() {


        try{
             
                $pdo = AccesoDB::getCon();

                $sql_crear_usu = "INSERT INTO `usuario`(`RUT`,`NOMBRE`,`APELLIDO`,`EMAIL`,`PASS`,`VIGENCIA`,`CARGO`,`PERFIL`,`NICK`)
                            VALUES(:rut,:nombre,:apellido,:email,:pass,:vigencia,:cargo,:perfil,:nick);";


                $stmt = $pdo->prepare($sql_crear_usu);
                $stmt->bindParam(":rut", $this->RUT, PDO::PARAM_STR);
                $stmt->bindParam(":nombre", $this->NOMBRE, PDO::PARAM_STR);
                $stmt->bindParam(":apellido", $this->APELLIDO, PDO::PARAM_STR);
                $stmt->bindParam(":email", $this->EMAIL, PDO::PARAM_STR);
                $stmt->bindParam(":pass", $this->PASS, PDO::PARAM_STR);
                $stmt->bindParam(":vigencia", $this->VIGENCIA, PDO::PARAM_BOOL);
                $stmt->bindParam(":cargo", $this->CARGO, PDO::PARAM_INT);
                $stmt->bindParam(":perfil", $this->PERFIL, PDO::PARAM_INT);
                $stmt->bindParam(":nick", $this->NICK, PDO::PARAM_STR);
                $stmt->execute();
        

            } catch (Exception $e) {
                echo"2";
            }
    }


    /*///////////////////////////////////////
    Modificar Usuario
    //////////////////////////////////////*/
    public function modificar_usuario() {


        try{
             
                $pdo = AccesoDB::getCon();

                $sql_mod_usu = "UPDATE `usuario`
                                    SET
                                    `NOMBRE` = :nombre,
                                    `APELLIDO` = :apellido,
                                    `EMAIL` = :email,
                                    `VIGENCIA` = :vigencia,
                                    `CARGO` = :cargo,
                                    `PERFIL` = :perfil,
                                    `NICK` = :nick
                                    WHERE `ID_USU` = :id ";


                $stmt = $pdo->prepare($sql_mod_usu);
                $stmt->bindParam(":nombre", $this->NOMBRE, PDO::PARAM_STR);
                $stmt->bindParam(":apellido", $this->APELLIDO, PDO::PARAM_STR);
                $stmt->bindParam(":email", $this->EMAIL, PDO::PARAM_STR);
                $stmt->bindParam(":vigencia", $this->VIGENCIA, PDO::PARAM_BOOL);
                $stmt->bindParam(":cargo", $this->CARGO, PDO::PARAM_INT);
                $stmt->bindParam(":perfil", $this->PERFIL, PDO::PARAM_INT);
                $stmt->bindParam(":nick", $this->NICK, PDO::PARAM_STR);
                $stmt->bindParam(":id", $this->ID_USU, PDO::PARAM_INT);
                $stmt->execute();
        

            } catch (Exception $e) {
                echo"Error, comuniquese con el administrador".  $e->getMessage()."";
            }
    }

    /*///////////////////////////////////////
    Actualizar Contraseña 
    //////////////////////////////////////*/
    public static function actualizar_contraseña($id,$pwd){

        try{

                
                $pdo = AccesoDB::getCon();

                $sql_pwd = "update usuario
                set pass = :pwd
                where id_usu = :id";


                
                $stmt = $pdo->prepare($sql_pwd);
                $stmt->bindParam(":pwd", $pwd, PDO::PARAM_STR);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
           
                $stmt->execute();
        

        } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>"; 
        }
    }


}

    ?>