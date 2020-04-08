<?php
include "sesion.php";
class Usuarios extends Sesion
{
    public function __construct()
    {
        parent::__construct();
        $this->sesion = null;
    }

    public function login($correo, $pass)
    {
        $query = " select nombre, correo from usuarios where correo= :correo and password= :pass and estado = 1 ;";
        $oUsuario = null;
        if ($this->conBDPDO()) {
            $pQuery = $this->oConBD->prepare($query);
            $pQuery->bindParam(':correo', $correo);
            $pQuery->bindParam(':pass', $pass);
            $pQuery->execute();
            $pQuery->setFetchMode(PDO::FETCH_ASSOC);
            while ($usuario = $pQuery->fetch()) {
                $oUsuario = new Usuario();
                $oUsuario->nombre = $usuario['nombre'];
                $oUsuario->correo = $usuario['correo'];
            }
            $this->sesion = $this->getInstancia();
            if ($oUsuario != null) {
                $jDatos = json_encode($oUsuario);
                $this->sesion->__set("rolWeb",  $jDatos);
                return 200;
            } else {
                $this->sesion->__set("rolWeb",  null);
                return 401;
            }
        }
    }
}

class Usuario
{
    public $nombre = "";
    public $correo = "";
}
