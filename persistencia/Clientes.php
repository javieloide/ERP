<?php 

require_once 'Conexion.php';

	class Clientes {
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonClientes(){
			if (!isset(self::$instancia)){
				$miclase = __CLASS__;
				self::$instancia = new $miclase;

			}
			return self::$instancia; //this->$instancia

		}


		//////// programamaos cada una de las funciones que necesitemos
		///// de ataque a la base de datos
		///// CRUD

		/// Vamos a empezar programando una select * from clientes

		public function getClientesTodos(){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM clientes";
				

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
				$c=new Cliente($fila[0], $fila[1], 
					$fila[2], $fila[3], $fila[4], 
					$fila[5], $fila[6], $fila[7], 
					$fila[8], $fila[9], $fila[10]);
				array_push($tablaClientes, $c);
			}
			return $tablaClientes;
		}



	public function getUnCliente(String $idCliente){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM clientes where id_cliente='$idCliente'";
				

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
				$c=new Cliente($fila[0], $fila[1], 
					$fila[2], $fila[3], $fila[4], 
					$fila[5], $fila[6], $fila[7], 
					$fila[8], $fila[9], $fila[10]);
				array_push($tablaClientes, $c);
			}
			return $tablaClientes[0];
		}

        public function getClienteByNif(String $nif)
        {
            //Retorna el cliente con el mismo nif
            //que le paso como parámetro
            try {
                $consulta = "SELECT * FROM clientes "
                    . "WHERE nif LIKE '$nif'";
                //echo $consulta;
                $query = $this->db->preparar($consulta);
                $query->execute();
                $tClientes = $query->fetchAll();
            }catch (Exception $e) {
                echo "Se ha producido un error";
            }
            if (empty($tClientes)){
                $tablaClientes = array();
            } else {
                $tablaClientes = array();
                $cliente = new Cliente($tClientes[0][0], $tClientes[0][1], $tClientes[0][2], $tClientes[0][3], $tClientes[0][4], $tClientes[0][5], $tClientes[0][6], $tClientes[0][7], $tClientes[0][8],
                    $tClientes[0][9], $tClientes[0][10]);
                array_push($tablaClientes, $cliente);
            }
            return $tablaClientes;
        }

        public function updateCliente(Cliente $c){
            try{
                $id_cliente = $c->getIdCliente();
                $consulta= "UPDATE clientes SET nombre = ?, apellido1 = ?, apellido2 = ?, nif = ?, varon = ?, numcta = ?, como_nos_conocio = ?, activo = ? 
                        WHERE id_cliente LIKE '$id_cliente'";
                $query = $this->db->preparar($consulta);
                @$query->bindParam(1,$c->getNombre());
                @$query->bindParam(2,$c->getApellido1());
                @$query->bindParam(3,$c->getApellido2());
                @$query->bindParam(4,$c->getNif());
                @$query->bindParam(5,$c->getVaron());
                @$query->bindParam(6,$c->getNumCta());
                @$query->bindParam(7,$c->getComoNosConocio());
                @$query->bindParam(8,$c->getActivo());
                $query->execute();
                $actualizado = true;
            } catch (Exception $e)  {
                echo "Se ha producido un error";
                $actualizado = false;
            }
		    return $actualizado;
        }


/// Un método que permita dar de alta un cliente

	public function addUnCliente($c) {
		try {
			$consulta= "INSERT INTO clientes (id, id_cliente,id_usuario, nombre,apellido1,apellido2,nif,varon,numcta,como_nos_conocio,activo) values (null,?,?,?,?,?,?,?,?,?,?)";
			$idCliente=$c->getIdCliente();
			$idUsuario=$c->getIdUsuario();

			$query=$this->db->preparar($consulta);
			$query->bindParam(1,$idCliente);
			$query->bindParam(2,$idUsuario);
			@$query->bindParam(3,$c->getNombre());
			@$query->bindParam(4,$c->getApellido1());
			@$query->bindParam(5,$c->getApellido2());
			@$query->bindParam(6,$c->getNif());
			@$query->bindParam(7,$c->getVaron());
			@$query->bindParam(8,$c->getNumCta());
			@$query->bindParam(9,$c->getComoNosConocio());
			@$query->bindParam(10,$c->getActivo());

			$query->execute();
			$insertado=true;


		} catch (Exception $e) {
			echo "Se ha producido un error";
			$insertado=false;
		}
		return $insertado;
	}



public function getNumeroClienteMismoCodPostal($codPostal) {
		//Retorna el número de clientes con el mismo codPostal
		//que le paso como parámetro
		try {
			$consulta = "SELECT COUNT(id) FROM clientes "
				. "WHERE id_cliente like '" . $codPostal . "%'";
			$query = $this->db->preparar($consulta);
			$query->execute();
			$tClientes = $query->fetchAll();

			if (empty($tClientes)) {
				//no hay ninguno
				$numero = 0;

			} else {
				$numero = $tClientes[0][0];
			}

		} catch (Exception $ex) {
			$numero = -1;
		}
		return $numero;
	}


}


 ?>