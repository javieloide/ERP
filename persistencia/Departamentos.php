<?php 

require_once 'Conexion.php';

	class Departamentos {
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonDepartamentos(){
			if (!isset(self::$instancia)){
				$miclase = __CLASS__;
				self::$instancia = new $miclase;

			}
			return self::$instancia; //this->$instancia

		}


public function getDepartamentosTodos(){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM departamentos";
				

				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tClientes = $query->fetchAll();
				
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes

			} catch (Exception $e) {
				echo "Se ha producido un errro";
				
			}

			$tablaClientes=array(); //inicializamos la tabla de salida
			foreach ($tClientes as $fila) {
				$c=new Departamento($fila[0], $fila[1], 
					$fila[2], $fila[3]);
				array_push($tablaClientes, $c);
			}
			return $tablaClientes;
		}

		public function getNumeroDepartamentos(){
			//Devolvemos un número que representa el número de productos que tenemos en la
			try {
				$consulta="SELECT * FROM departamentos";
				
				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tProducto = $query->fetchAll();
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes
			} catch (Exception $e) {
				echo "Se ha producido un errro";
				
			}
			return count($tProducto);
	}

public function addUnDepartamento(Departamento $p) {
	try {
			//Para insertar una copia del id de la tabla en id_producto, tendríamos
			//que averiguar cuál es el último introducido y sumarle 1
			//esto puede hacerse aquí o en el script principal
			//Optamos por el script principal
			//
			//$ultimo=$this->getUltimo()+1; //último código introducido +1
			$consulta = "INSERT INTO departamentos " .
			"(id_departamento,nombre,activo)  "
			. "values"
			. "(?,?,?)";

			$query = $this->db->preparar($consulta);

			@$query->bindParam(1, $p->getIdDepartamento());
			@$query->bindParam(2, $p->getNombre());
			@$query->bindParam(3, $p->getActivo());

			$query->execute();
			$insertado = true;

		} catch (Exception $ex) {
			$insertado = false;
		}

		return $insertado;
	}






}
?>