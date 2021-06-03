<?php 

require_once 'Conexion.php';

	class Productos {
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonProductos(){
			if (!isset(self::$instancia)){
				$miclase = __CLASS__;
				self::$instancia = new $miclase;

			}
			return self::$instancia; //this->$instancia

		}


public function getProductosTodos(){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM productos";
				

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
				$c=new Producto($fila[0], $fila[1], 
					$fila[2], $fila[3], $fila[4], 
					$fila[5], $fila[6], $fila[7], 
					$fila[8], $fila[9], $fila[10],$fila[11],$fila[12],$fila[13]);
				array_push($tablaClientes, $c);
			}
			return $tablaClientes;
		}

		public function getProductoByCodigo($codigo){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM productos WHERE codigo_barras LIKE '$codigo'";
				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tProductos = $query->fetchAll();
				
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes

			} catch (Exception $e) {
				echo "Se ha producido un errro";
				
			}

			$tablaProductos=array(); //inicializamos la tabla de salida
			foreach ($tProductos as $fila) {
				$p=new Producto($fila[0], $fila[1], 
					$fila[2], $fila[3], $fila[4], 
					$fila[5], $fila[6], $fila[7], 
					$fila[8], $fila[9], $fila[10],$fila[11],$fila[12],$fila[13]);
				array_push($tablaProductos, $p);
			}
			return $tablaProductos;
		}

		public function getProductoByIdProducto($codigo){
			//Devolvemos un array de objetos clientes

			try {
				
				$consulta="SELECT * FROM productos WHERE id_producto LIKE '$codigo'";
				$query=$this->db->preparar($consulta);
				$query->execute();
				
				$tProductos = $query->fetchAll();
				
				//obtiene todas las tuplas de la tabla clientes
				//y devuelve el array $tClientes

			} catch (Exception $e) {
				echo "Se ha producido un errro";
				
			}

			$tablaProductos=array(); //inicializamos la tabla de salida
			foreach ($tProductos as $fila) {
				$p=new Producto($fila[0], $fila[1], 
					$fila[2], $fila[3], $fila[4], 
					$fila[5], $fila[6], $fila[7], 
					$fila[8], $fila[9], $fila[10],$fila[11],$fila[12],$fila[13]);
				array_push($tablaProductos, $p);
			}
			return $tablaProductos;
		}

			/*id,id_producto,id_familia,tipo_iva,precio_coste,"
			. "pvp,descripcion,codigo_barras,id_proveedor,"

			. "stock_actual,stock_minimo,stock_maximo,"
			. "ruta_foto,activo)  "*/
		public function updateProducto(Producto $c){
            try{
                $codigoBarras = $c->getCodigoBarras();
                $consulta= "UPDATE productos SET id_familia = ?, tipo_iva = ?, precio_coste = ?, pvp = ?, descripcion = ?, id_producto = ?, 
							id_proveedor = ?, stock_actual = ?,  stock_minimo = ?, stock_maximo = ?, ruta_foto = ?, activo = ? WHERE codigo_barras LIKE '$codigoBarras'";
                $query = $this->db->preparar($consulta);
                @$query->bindParam(1,$c->getIdFamilia());
                @$query->bindParam(2,$c->getTipoIva());
                @$query->bindParam(3,$c->getPrecioCoste());
                @$query->bindParam(4,$c->getPvp());
                @$query->bindParam(5,$c->getDescripcion());
                @$query->bindParam(6,$c->getIdProducto());
                @$query->bindParam(7,$c->getIdProveedor());
				@$query->bindParam(8,$c->getStockActual());
				@$query->bindParam(9,$c->getStockMinimo());
				@$query->bindParam(10,$c->getStockMaximo());
				@$query->bindParam(11,$c->getRutaFoto());
				@$query->bindParam(12,$c->getActivo());
                $query->execute();
                $actualizado = true;
            } catch (Exception $e)  {
                echo "Se ha producido un error";
                $actualizado = false;
            }
		    return $actualizado;
		}
		
		public function deleteProducto(Producto $p){
			try{
				$id_producto = $p->getIdProducto();
				$consulta = "DELETE FROM productos WHERE id_producto LIKE '$id_producto'";
				$query=$this->db->preparar($consulta);
				$query->execute();
				$borrado = true;
			} catch(Exception $e){
				echo "Se ha producido un error";
                $borrado = false;
			}
			return $borrado;
		}

		public function getNumeroProductos(){
			//Devolvemos un número que representa el número de productos que tenemos en la
			try {
				$consulta="SELECT * FROM productos";
				
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

public function addUnProducto(Producto $p) {
	try {
			//Para insertar una copia del id de la tabla en id_producto, tendríamos
			//que averiguar cuál es el último introducido y sumarle 1
			//esto puede hacerse aquí o en el script principal
			//Optamos por el script principal
			//
			//$ultimo=$this->getUltimo()+1; //último código introducido +1
			$consulta = "INSERT INTO productos " .
			"(id,id_producto,id_familia,tipo_iva,precio_coste,"
			. "pvp,descripcion,codigo_barras,id_proveedor,"

			. "stock_actual,stock_minimo,stock_maximo,"
			. "ruta_foto,activo)  "
			. "values"
			. "(null,?,?,?,?,?,?,?,?,?,?,?,?,?)";

			$query = $this->db->preparar($consulta);

			@$query->bindParam(1, $p->getIdProducto());
			@$query->bindParam(2, $p->getIdFamilia());
			@$query->bindParam(3, $p->getTipoIva());
			@$query->bindParam(4, $p->getPrecioCoste());

			@$query->bindParam(5, $p->getPvp());
			@$query->bindParam(6, $p->getDescripcion());
			@$query->bindParam(7, $p->getCodigoBarras());
			@$query->bindParam(8, $p->getIdProveedor());
			@$query->bindParam(9, $p->getStockActual());
			@$query->bindParam(10, $p->getStockMinimo());
			@$query->bindParam(11, $p->getStockMaximo());
			@$query->bindParam(12, $p->getRutaFoto());
			@$query->bindParam(13, $p->getActivo());

			$query->execute();
			$insertado = true;

		} catch (Exception $ex) {
			$insertado = false;
		}

		return $insertado;
	}




	public function getUltimoProductoFamilia(string $familia) {
	//Devuelve un numero q es el id último producto introducido de la familia que le paso como parámetro

		try 
		{
			$consulta = "SELECT COUNT(id_producto) as ultimo FROM productos where id_familia='$familia'";

			$query = $this->db->preparar($consulta);

			$query->execute();
			$tProductos = $query->fetchAll();

		} catch (Exception $ex) {
			echo "Se ha producido un error en getUltimoProducto";
		}
		
		return (string) $tProductos[0]['ultimo'];
		// o bien return $tProductos[0][0];

	}

public function getProductosByCategoria($categoria){
	//Devolvemos un array de objetos clientes

	try {
		
		$consulta="SELECT * FROM productos WHERE id_familia = $categoria";


		$query=$this->db->preparar($consulta);
		$query->execute();
		
		$tProductos = $query->fetchAll();
		
		//obtiene todas las tuplas de la tabla clientes
		//y devuelve el array $tClientes

	} catch (Exception $e) {
		echo "Se ha producido un errro";
		
	}

	$tablaProductos=array(); //inicializamos la tabla de salida
	foreach ($tProductos as $fila) {
		$c=new Producto($fila[0], $fila[1], 
			$fila[2], $fila[3], $fila[4], 
			$fila[5], $fila[6], $fila[7], 
			$fila[8], $fila[9], $fila[10],$fila[11],$fila[12],$fila[13]);
		array_push($tablaProductos, $c);
	}
	return $tablaProductos;
}


public function getProductosByPrecioMenorA($precio){
	//Devolvemos un array de objetos clientes

	try {
		
		$consulta="SELECT * FROM productos WHERE precio_coste < ".$precio;


		$query=$this->db->preparar($consulta);
		$query->execute();
		
		$tProductos = $query->fetchAll();
		
		//obtiene todas las tuplas de la tabla clientes
		//y devuelve el array $tClientes

	} catch (Exception $e) {
		echo "Se ha producido un errro";
		
	}

	$tablaProductos=array(); //inicializamos la tabla de salida
	foreach ($tProductos as $fila) {
		$c=new Producto($fila[0], $fila[1], 
			$fila[2], $fila[3], $fila[4], 
			$fila[5], $fila[6], $fila[7], 
			$fila[8], $fila[9], $fila[10],$fila[11],$fila[12],$fila[13]);
		array_push($tablaProductos, $c);
	}
	return $tablaProductos;
}


}