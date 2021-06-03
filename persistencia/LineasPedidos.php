<?php 

	class LineasPedidos {
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonLineasPedidos(){
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


		public function getLineasPedidosTodos(){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM lineas_pedidos";

				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tLineasPedidos = $query->fetchAll();
				
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes

			} catch (Exception $e) {
				echo "Se ha producido un error";
				
			}

			$tablaLineasPedidos = array();
			foreach ($tLineasPedidos as $fila) {
				$c=new LineaPedido($fila[0], $fila[1],$fila[2],$fila[3],$fila[4], $fila[5], $fila[6],$fila[7]);
				array_push($tablaLineasPedidos, $c);
			}
			return $tablaLineasPedidos;
		}


public function getLineasUnPedido(String $idPedido){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM lineas_pedidos where id_pedido='$idPedido'";

				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tLineasPedidos = $query->fetchAll();
				
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes

			} catch (Exception $e) {
				echo "Se ha producido un error";
				
			}

			$tablaLineasPedidos = array();
			foreach ($tLineasPedidos as $fila) {
				$c=new LineaPedido($fila[0], $fila[1],$fila[2],$fila[3],$fila[4], $fila[5], $fila[6],$fila[7]);
				array_push($tablaLineasPedidos, $c);
			}
					return $tablaLineasPedidos;

		}


		// Un método que permita dar de alta a un cliente
		public function addLineasPedidos(LineaPedido $c) {
			try {
				$consulta = "INSERT INTO lineas_pedidos (id, id_pedido, id_producto, unidades, descripcion, pvp, tipo_iva, activo) VALUES (null, ?,?,?,?,?,?,?)";


				$idPedido=$c->getIdPedido();
				$idProducto=$c->getIdProducto();
				$unidades=$c->getUnidades();
				$descripcion=$c->getDescripcion();
				$pvp=$c->getPvp();				
				$tipoIva=$c->getTipoIva();
				$activo=$c->getActivo();




				$query=$this->db->preparar($consulta);





				$query->bindParam(1,$idPedido);
				$query->bindParam(2,$idProducto);
				$query->bindParam(3,$unidades);
				$query->bindParam(4,$descripcion);
				$query->bindParam(5,$pvp);
				$query->bindParam(6,$tipoIva);
				$query->bindParam(7,$activo);
				$query->execute();
				$insertado=true;
			} catch (Exception $e) {
				echo "Se ha producido un error";
				$insertado=false;
			}

			return $insertado;
		}
	}

 ?>