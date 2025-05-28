<?php
class ClienteModel {		
    //definir atributos:
    private $db;
    private $empleado;
    private $tipo;

    public function __construct(){
    $this->db = Conectar::conexion();
	$this->empleado = array();
    $this->tipo = get_class($this->db);
    }		

    

    public function listar(){

    if ($this->tipo=='PDO') {
        $pst=$this->db->prepare("select * from Empleados");
            $pst->execute();
            $resultados=$pst->fetchAll(\PDO::FETCH_ASSOC);
            
            //$sql="select * from Producto";

            foreach($resultados as $resultado)
            {
                $this->empleado[]=$resultado;
            }
            
    } elseif ($this->tipo=='mysqli') {
        $pst=$this->db->prepare("select * from Empleados");
            $pst->execute();
            $res=$pst->get_result();
            $resultados=$res->fetch_All(MYSQLI_ASSOC);
            foreach($resultados as $resultado){
                $this->empleado[]=$resultado;
            }
    }

        $this->db=null;
        return $this->empleado;

	}

    public function insertar(/*completar*/){			
			
    }


    public function modificar(/*completar*/){

	}


	public function eliminar($id){
        /*completar*/
	}
        

    public function buscarEmpleado($id){
		/*completar*/
	}
}