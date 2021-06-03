<?php 

	class Usuarios {
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonUsuarios(){
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


		public function getUsuariosTodos(){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM usuarios WHERE activo = 1"; 

				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tUsuarios = $query->fetchAll();
				
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes

			} catch (Exception $e) {
				echo "Se ha producido un error";
				
			}

			$tablaUsuarios = array();
			foreach ($tUsuarios as $fila) {
				$c=new Usuario($fila[0], $fila[1],$fila[2],$fila[3],$fila[4],$fila[5]);
				array_push($tablaUsuarios, $c);
			}
			return $tablaUsuarios;
		}


		// Un método que permita dar de alta a un cliente
		public function addUnUsuario($c) {
			try {
				$consulta = "INSERT INTO usuarios (id, id_usuario, id_rol, login, password, activo) VALUES (null, ?,?,?,?,?)";

				$query=$this->db->preparar($consulta);

				@$query->bindParam(1,$c->getIdUsuario());
				@$query->bindParam(2,$c->getIdRol());
				@$query->bindParam(3,$c->getLogin());
				@$query->bindParam(4,$c->getPassword());
				@$query->bindParam(5,$c->getActivo());

				$query->execute();
				$insertado=true;
			} catch (Exception $e) {
				echo "Se ha producido un error";
				$insertado=false;
			}

			return $insertado;
		}

		public function getUsuarioById($codigo){
			try {
				
				$consulta="SELECT * FROM usuarios WHERE id_usuario LIKE '$codigo'";
				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tUsuario = $query->fetchAll();
				
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes

			} catch (Exception $e) {
				echo "Se ha producido un errro";
				
			}

			$tablaUsuarios = array(); //inicializamos la tabla de salida
			foreach ($tUsuario as $fila) {
				$u = new Usuario($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5]);
				array_push($tablaUsuarios, $u);
			}

			return $tablaUsuarios;
		}

		public function getUsuarioByLogin($login){
			try {
				
				$consulta="SELECT * FROM usuarios WHERE login LIKE '$login'";
				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tUsuario = $query->fetchAll();
				
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes

			} catch (Exception $e) {
				echo "Se ha producido un errro";
				
			}

			$tablaUsuarios = array(); //inicializamos la tabla de salida
			foreach ($tUsuario as $fila) {
				$u = new Usuario($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5]);
				array_push($tablaUsuarios, $u);
			}

			return $tablaUsuarios;
		}

		public function getUsuario($login, $password){
            try {

                $consulta="SELECT * FROM usuarios WHERE login LIKE '$login' and password LIKE '$password'";
                $query=$this->db->preparar($consulta);
                $query->execute();

                $tUsuario = $query->fetchAll();

                //obtiene todas las tuplas de la tabla clientes
                //y devuelve el array $tClientes

            } catch (Exception $e) {
                echo "Se ha producido un errro";

            }

            $tablaUsuarios = array(); //inicializamos la tabla de salida
            foreach ($tUsuario as $fila) {
                $u = new Usuario($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5]);
                array_push($tablaUsuarios, $u);
            }

            return $tablaUsuarios;
        }

		public function deleteUsuarioById($codigo){
			$borrado = false;
			try {
				
				$consulta="UPDATE usuarios SET activo = 0 WHERE id_usuario LIKE '$codigo'";
				$query=$this->db->preparar($consulta);
				$query->execute();
				$borrado=true;

			} catch (Exception $e) {
				echo "Se ha producido un error";
				
			}

			return $borrado;
		}
		
			
		public function updateUsuario(Usuario $r){
           	$actualizado = false;
			try{
                $codigoUsuario = $r->getIdUsuario();
                $consulta= "UPDATE usuarios SET id_rol = ?, login = ?, password = ? WHERE id_usuario LIKE '$codigoUsuario'";
                $query = $this->db->preparar($consulta);
                @$query->bindParam(1,$r->getIdRol());
				@$query->bindParam(2,$r->getLogin());
				@$query->bindParam(3,$r->getPassword());
                $query->execute();
                $actualizado = true;
            } catch (Exception $e)  {
                echo "Se ha producido un error";
                $actualizado = false;
            }
		    return $actualizado;
		}

		public function getNumeroUsuarios(){
			//Devolvemos un número que representa el número de productos que tenemos en la
			try {
				$consulta="SELECT * FROM usuarios";
				
				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tUsuario = $query->fetchAll();
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes
			} catch (Exception $e) {
				echo "Se ha producido un error";
				
			}
			return count($tUsuario);
	}
	}

 ?>