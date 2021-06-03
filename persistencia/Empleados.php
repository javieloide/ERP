<?php 

require_once 'Conexion.php';

	class Empleados {
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonEmpleados(){
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

        public function getEmpleadosTodos(){
            //Devolvemos un array de objetos clientes

            try {

                $consulta="SELECT * FROM empleados";
                $query=$this->db->preparar($consulta);
                $query->execute();

                $tEmpleados = $query->fetchAll();

                //obtiene todas las tuplas de la tabla clientes
                //y devuelve el array $tClientes

            } catch (Exception $e) {
                echo "Se ha producido un errro";

            }

            $tablaEmpleados=array(); //inicializamos la tabla de salida
            foreach ($tEmpleados as $fila) {
                $c=new Empleado($fila[0], $fila[1],
                    $fila[2], $fila[3], $fila[4],
                    $fila[5], $fila[6], $fila[7],
                    $fila[8], $fila[9], $fila[10],
                    $fila[11], $fila[12], $fila[13],$fila[14],$fila[15]);
                array_push($tablaEmpleados, $c);
            }
            return $tablaEmpleados;
        }

        public function getEmpleadoByNif(String $nif)
        {
            //Retorna el cliente con el mismo nif
            //que le paso como parámetro
            try {
                $consulta = "SELECT * FROM empleados "
                    . "WHERE nif LIKE '$nif'";
                //echo $consulta;
                $query = $this->db->preparar($consulta);
                $query->execute();
                $tEmpleados = $query->fetchAll();
            }catch (Exception $e) {
                echo "Se ha producido un error";
            }
            if (empty($tEmpleados)){
                $tablaEmpleados = array();
            } else {
                $tablaEmpleados = array();
                $empleado = new Empleado($tEmpleados[0][0], $tEmpleados[0][1], $tEmpleados[0][2], $tEmpleados[0][3], $tEmpleados[0][4], $tEmpleados[0][5], $tEmpleados[0][6], $tEmpleados[0][7], $tEmpleados[0][8],
                    $tEmpleados[0][9], $tEmpleados[0][10],$tEmpleados[0][11],$tEmpleados[0][12],$tEmpleados[0][13],$tEmpleados[0][14],$tEmpleados[0][15]);
                array_push($tablaEmpleados, $empleado);
            }
            return $tablaEmpleados;
        }
		public function getEmpleadoByIdEmpleado($idEmpleado)
        {
            //Retorna el cliente con el mismo nif
            //que le paso como parámetro
            try {
                $consulta = "SELECT * FROM empleados "
                    . "WHERE id_empleado LIKE '$idEmpleado'";
                //echo $consulta;
                $query = $this->db->preparar($consulta);
                $query->execute();
                $tEmpleados = $query->fetchAll();
            }catch (Exception $e) {
                echo "Se ha producido un error";
            }
            if (empty($tEmpleados)){
                $tablaEmpleados = array();
            } else {
                $tablaEmpleados = array();
                $empleado = new Empleado($tEmpleados[0][0], $tEmpleados[0][1], $tEmpleados[0][2], $tEmpleados[0][3], $tEmpleados[0][4], $tEmpleados[0][5], $tEmpleados[0][6], $tEmpleados[0][7], $tEmpleados[0][8],
                    $tEmpleados[0][9], $tEmpleados[0][10],$tEmpleados[0][11],$tEmpleados[0][12],$tEmpleados[0][13],$tEmpleados[0][14],$tEmpleados[0][15]);
                array_push($tablaEmpleados, $empleado);
            }
            return $tablaEmpleados;
        }
        public function updateEmpleado(Empleado $c){
            try{
                $id_empleado = $c->getIdEmpleado();
                //id, id_empleado,id_usuario, nombre,apellido1,apellido2,numcta,movil,localidad,cod_postal,provincia,activo,id_departamento,nif,direccion,pais
                $consulta= "UPDATE empleados SET nombre = ?, apellido1 = ?, apellido2 = ?, numcta = ?, movil = ?, localidad = ?, cod_postal = ?, provincia = ?, activo = ?, id_departamento = ?, direccion = ?, pais = ? 
                        WHERE id_empleado LIKE '$id_empleado'";
                $query = $this->db->preparar($consulta);
                @$query->bindParam(1,$c->getNombre());
                @$query->bindParam(2,$c->getApellido1());
                @$query->bindParam(3,$c->getApellido2());
                @$query->bindParam(4,$c->getNumCta());
                @$query->bindParam(5,$c->getMovil());
                @$query->bindParam(6,$c->getLocalidad());
                @$query->bindParam(7,$c->getCodPostal());
                @$query->bindParam(8,$c->getProvincia());
                @$query->bindParam(9,$c->getActivo());
                @$query->bindParam(10,$c->getIdDepartamento());
                @$query->bindParam(11,$c->getDireccion());
                @$query->bindParam(12,$c->getPais());
                $query->execute();
                $actualizado = true;
            } catch (Exception $e)  {
                echo "Se ha producido un error";
                $actualizado = false;
            }
            return $actualizado;
        }

/// Un método que permita dar de alta un cliente

	public function addUnEmpleado($c) {
		try {
			$consulta= "INSERT INTO empleados (id, id_empleado,id_usuario, nombre,apellido1,apellido2,numcta,movil,localidad,cod_postal,provincia,activo,id_departamento,nif,direccion,pais) values (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

			$query=$this->db->preparar($consulta);
			@$query->bindParam(1,$c->getIdEmpleado());
			@$query->bindParam(2,$c->getIdUsuario());
			@$query->bindParam(3,$c->getNombre());
			@$query->bindParam(4,$c->getApellido1());
			@$query->bindParam(5,$c->getApellido2());
			@$query->bindParam(6,$c->getNumCta());
			@$query->bindParam(7,$c->getMovil());
			@$query->bindParam(8,$c->getLocalidad());
			@$query->bindParam(9,$c->getCodPostal());
			@$query->bindParam(10,$c->getProvincia());
			@$query->bindParam(11,$c->getActivo());
			@$query->bindParam(12,$c->getIdDepartamento());
			@$query->bindParam(13,$c->getNif());
			@$query->bindParam(14,$c->getDireccion());
			@$query->bindParam(15,$c->getPais());
			//@$query->bindParam(16,$c->getRutaFoto());

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
echo $consulta;
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
		echo $numero;
		return $numero;
	}



	public function getNumeroEmpleadosDepartamento($idDepartamento){
			//Devolvemos un número que representa el número de productos que tenemos en la
			try {
				$consulta="SELECT * FROM empleados WHERE id_departamento ='".$idDepartamento."'";
				
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


public function getNumeroEmpleados(){
    //Devolvemos un número que representa el número de productos que tenemos en la
    try {
        $consulta="SELECT * FROM empleados";
        
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
}
 ?>