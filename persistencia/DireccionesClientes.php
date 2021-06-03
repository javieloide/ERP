<?php

require_once 'Conexion.php';

class DireccionesClientes {
	private static $instancia;
	private $db;

	function __construct() {
		$this->db = Conexion::singleton_conexion();
	}

	public static function singletonDireccionesClientes() {
		if (!isset(self::$instancia)) {
			$miclase = __CLASS__;
			self::$instancia = new $miclase;

		}

		return self::$instancia;
	}

	public function addUnaDireccionCliente($dc) {
		try
		{

			$consulta = "INSERT INTO direcciones_clientes (id,id_cliente,id_usuario,direccion,"
				. "codpostal,localidad,provincia,"
				. "pais,"
				. "activo)  "
				. " values"
				. "(null,?,?,?,?,?,?,?,?)";
		
			$query = $this->db->preparar($consulta);
			@$query->bindParam(1, $dc->getIdCliente());
			@$query->bindParam(2, $dc->getIdUsuario());
			@$query->bindParam(3, $dc->getDireccion());
			@$query->bindParam(4, $dc->getLocalidad());
			@$query->bindParam(5, $dc->getCodPostal());
			@$query->bindParam(6, $dc->getProvincia());
			@$query->bindParam(7, $dc->getPais());
			@$query->bindParam(8, $dc->getActivo());

			$query->execute();
			$insertado = true;

		} catch (Exception $ex) {
			$insertado = false;
		}

		return $insertado;
	}

	public function getDireccionCliente(Cliente $c)
    {
        try {
            $idCliente = $c->getIdCliente();
            $consulta = "SELECT * FROM direcciones_clientes "
                . "WHERE id_cliente LIKE '$idCliente'";
            //echo $consulta;
            $query = $this->db->preparar($consulta);
            $query->execute();
            $tDirecciones = $query->fetchAll();

        } catch (Exception $e) {
            echo "Se ha producido un error";
        }
        if (empty($tDirecciones)) {
            $tablaDireccionClientes = array();
        } else {
            $tablaDireccionClientes = array();
            $direccionCliente = new DireccionesCliente($tDirecciones[0][0], $tDirecciones[0][1], $tDirecciones[0][2], $tDirecciones[0][3], $tDirecciones[0][4], $tDirecciones[0][5], $tDirecciones[0][6], $tDirecciones[0][7], $tDirecciones[0][8]);
            array_push($tablaDireccionClientes, $direccionCliente);
        }
        return $tablaDireccionClientes;
    }

	public function getIdUsuario($dc) {
		try
		{

			$consulta = "INSERT INTO direcciones_clientes (id,id_cliente,id_usuario,direccion,"
				. "codpostal,localidad,provincia,"
				. "pais,"
				. "activo)  "
				. " values"
				. "(null,?,?,?,?,?,?,?,?)";
			//echo $consulta;

			$query = $this->db->preparar($consulta);
			@$query->bindParam(1, $dc->getIdCliente());
			@$query->bindParam(2, $dc->getIdUsuario());
			@$query->bindParam(3, $dc->getDireccion());
			@$query->bindParam(4, $dc->getLocalidad());
			@$query->bindParam(5, $dc->getCodPostal());
			@$query->bindParam(6, $dc->getProvincia());
			@$query->bindParam(7, $dc->getPais());
			@$query->bindParam(8, $dc->getActivo());

			$query->execute();
			$insertado = true;

		} catch (Exception $ex) {
			$insertado = false;
		}

		return $insertado;
	}

    public function updateDireccionCliente(DireccionesCliente $dc){
        try{
            $id_cliente = $dc->getIdCliente();
            $consulta= "UPDATE direcciones_clientes SET id_usuario = ?, direccion = ?, codpostal = ?, localidad = ?, provincia = ?, activo = ? WHERE id_cliente LIKE '$id_cliente'";
            $query = $this->db->preparar($consulta);
            //echo $consulta;
            @$query->bindParam(1,$dc->getIdUsuario());
            @$query->bindParam(2,$dc->getDireccion());
            @$query->bindParam(3,$dc->getCodPostal());
            @$query->bindParam(4,$dc->getLocalidad());
            @$query->bindParam(5,$dc->getProvincia());
            @$query->bindParam(6,$dc->getActivo());
            $query->execute();
            $actualizado = true;
        } catch (Exception $e)  {
            echo "Se ha producido un error";
            $actualizado = false;
        }
        return $actualizado;
    }
}