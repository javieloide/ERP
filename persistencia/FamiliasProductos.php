<?php 

require_once 'Conexion.php';

	class FamiliasProductos {
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonFamiliasProductos(){
			if (!isset(self::$instancia)){
				$miclase = __CLASS__;
				self::$instancia = new $miclase;

			}
			return self::$instancia; //this->$instancia

		}


		//////// programamaos cada una de las funciones que necesitemos
		///// de ataque a la base de datos
		///// CRUD

		/// Vamos a empezar programando una select * from Familias

		public function getFamiliasProductosTodos(){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM familias_productos";
				

				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tFamilias = $query->fetchAll();
				
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes

			} catch (Exception $e) {
				echo "Se ha producido un errro";
				
			}

			$tablaFamilias=array(); //inicializamos la tabla de salida
			foreach ($tFamilias as $fila) {
				$fp=new FamiliaProducto($fila[0], $fila[1], 
					$fila[2], $fila[3], $fila[4]);
				array_push($tablaFamilias, $fp);
			}
			return $tablaFamilias; //devuelvo un array de objetos
		}

		public function addUnaFamilia($f) {
			try {
				$consulta= "INSERT INTO familias_productos (id, id_familia, nombre, descripcion, activo) values (null,?,?,?,?)";
				$idFamilia=$f->getIdFamilia();
			
	
				$query=$this->db->preparar($consulta);
				@$query->bindParam(1,$idFamilia);
				@$query->bindParam(2,$f->getNombre());
				@$query->bindParam(3,$f->getDescripcion());
				@$query->bindParam(4,$f->getActivo());
				$query->execute();
				$insertado=true;
	
			} catch (Exception $e) {
				echo "Se ha producido un error";
				$insertado=false;
			}
			return $insertado;
		}

		public function getFiltFamilia($nombre, $descripcion)
        {
            //Retorna el cliente con el mismo nif
            //que le paso como parámetro
            try {
                $consulta = "SELECT * FROM familias_productos "
                    . "WHERE nombre = '$nombre' || descripcion = '$descripcion'";
                //echo $consulta;
                $query = $this->db->preparar($consulta);
                $query->execute();
                $tFamilias = $query->fetchAll();
            }catch (Exception $e) {
                echo "Se ha producido un error";
			}
            if (empty($tFamilias)){
                $tablaFamilias = array();
            } else {
                $tablaFamilias = array();
                $familia = new FamiliaProducto($tFamilias[0][0], $tFamilias[0][1], $tFamilias[0][2], $tFamilias[0][3], $tFamilias[0][4]);
                array_push($tablaFamilias, $familia);
            }
            return $tablaFamilias;
	}

	public function getNombreFamilia($nombre)
	{
		//Retorna el cliente con el mismo nif
		//que le paso como parámetro
		try {
			$consulta = "SELECT * FROM familias_productos "
				. "WHERE nombre = '$nombre'";
			//echo $consulta;
			$query = $this->db->preparar($consulta);
			$query->execute();
			$tFamilias = $query->fetchAll();
		}catch (Exception $e) {
			echo "Se ha producido un error";
		}
		if (empty($tFamilias)){
			$tablaFamilias = array();
		} else {
			$tablaFamilias = array();
			$familia = new FamiliaProducto($tFamilias[0][0], $tFamilias[0][1], $tFamilias[0][2], $tFamilias[0][3], $tFamilias[0][4]);
			array_push($tablaFamilias, $familia);
		}
		return $tablaFamilias;
}

	public function getNumeroFamilia() {
		try {
			$consulta = "SELECT COUNT(id) FROM familias_productos ";
			//echo $consulta;
			$query = $this->db->preparar($consulta);
			$query->execute();
			$tFamilias = $query->fetchAll();

			if (empty($tFamilias)) {
				//no hay ninguno
				$numero = 0;

			} else {
				$numero = $tFamilias[0][0];
			}

		} catch (Exception $ex) {
			$numero = -1;
		}
		//echo $numero;
		return $numero;
	}

	public function updateFamilia($c){
        try{
			$idFamilia = $c->getIdFamilia();
            $consulta= "UPDATE familias_productos SET nombre = ?, descripcion = ?, activo = ?
                        WHERE id_familia = $idFamilia";
            $query = $this->db->preparar($consulta);
            @$query->bindParam(1,$c->getNombre());
			@$query->bindParam(2,$c->getDescripcion());
			@$query->bindParam(3,$c->getActivo());
            $query->execute();
            $actualizado = true;
        } catch (Exception $e)  {
            echo "Se ha producido un error";
            $actualizado = false;
        }
        return $actualizado;
    }


}

 ?>