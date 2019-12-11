<?php
require_once('modelo.php');

//Esta clase es hija y hereda de su padre

class usuario extends modeloCredencialesBD{

    //Construct

    public function __construct()
    {
        parent::__construct();
    }

   //Methods
    //Función que envía dos parámetros al procedimiento almacenado
    public function validar_usuario($usr,$pwd){
        $instruccion = "CALL sp_validar_usuario('".$usr."','".$pwd."')";
        //echo "La instrucción: ". $instruccion;
        $consulta=$this->_db->query($instruccion);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

        if($resultado){
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    public function consultar_usuario($usr){
        $instruccion = "CALL sp_pf_consultar_usuario('".$usr."')";
        
        //echo "La instrucción: ". $instruccion;
        $consulta=$this->_db->query($instruccion);
        //print_r($consulta);
        //echo "<br>";
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
        //print_r($resultado);
        if($resultado){
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }


}
