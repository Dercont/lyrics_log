<?php
require_once('modelo.php');

class obra extends modeloCredencialesBD
{
    //Attributes
    protected $titulo;
    protected $cuerpo;
    protected $categoria;
    protected $fecha;
    protected $imagen;
    
    //Constructor
    public function __construct()
    {
        parent::__construct();
    }

    //Methods
    public function seleccionar_obras($id){
        $instruccion = "CALL sp_pf_seleccionar('".$id."')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
          
        //Si es false se ejecuta la validación
          if (!$resultado){
            echo "Fallo al consultar las obras";
        }
        else{
            //Si la consulta es correcta se retorna el arreglo y se cierra la conexión con la db.
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    public function seleccionar_obra($id_obra){
        $instruccion = "CALL sp_pf_seleccionar_obra('".$id_obra."')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        if (!$resultado){
            echo "Fallo al consultar la obra";
        }
        else{
            //Si la consulta es correcta se retorna el arreglo y se cierra la conexión con la db.
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    public function consultar_obras(){
        $pagina= 0 ;
        
        if(isset($_GET['pag'])){
            $pagina=$_GET['pag'];
        }
        
        $instruccion = "CALL sp_pf_paginacion(".$pagina.")";
        $consulta=$this->_db->query($instruccion);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
        If(!$resultado){
            echo "Error al consultar las obras";
        }
        else{
            return $resultado;
        }
    }

    public function insertar_obras($id,$titulo,$cuerpo,$categoria,$fecha){
        $instruccion = "CALL sp_pf_insertar('".$id."','".$titulo."','".$cuerpo."','".$categoria."','".$fecha."')";
        $consulta=$this->_db->query($instruccion);
        $this->_db->close();
        return $consulta;
    }

    public function consultar_obras_filtro($campo,$valor){
        
        $instruccion = "CALL sp_pf_filtrar('".$campo."','".$valor."')";
        $consulta=$this->_db->query($instruccion);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

            if($resultado){
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
    }
    
    public function total_obras(){
        
        $instruccion = "SELECT count(*) FROM obras";
       // print_r($instruccion);
        $consulta=$this->_db->query($instruccion);
        //echo "<br>";
        //print_r($consulta);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
        //echo "<br>";
        //print_r($resultado);
        if(!$resultado){
            echo "Error al consultar las obras";
        }
        else{
            return $resultado;
        }
    }
    
    public function actualizar_obras($id_obra,$id,$titulo,$cuerpo,$categoria,$fecha){
        $instruccion = "CALL sp_pf_actualizar('".$id_obra."','".$id."','".$titulo."','".$cuerpo."','".$categoria."','".$fecha."')";
        //echo($instruccion);
        $consulta=$this->_db->query($instruccion);
        $this->_db->close();
        return $consulta;
    }

    public function eliminar_obras($id_obra){   
        $instruccion = "CALL sp_pf_eliminar('".$id_obra."')";
        echo($instruccion);
        $consulta=$this->_db->query($instruccion);
        $this->_db->close();
    }
    
}