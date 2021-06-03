<?php 

class Empleado
{
	private $id;
	private $idEmpleado;
	private $idUsuario;
	private $nombre;
	private $apellido1;
	private $apellido2;
    private $numCta;
    private $movil;
    private $localidad;
	private $codPostal;
	private $provincia;
	private $activo;
    private $idDepartamento;
    private $nif;
    private $direccion;
    private $pais;


    /**
     * Class Constructor
     * @param    $id   
     * @param    $idEmpleado   
     * @param    $idUsuario   
     * @param    $nombre   
     * @param    $apellido1   
     * @param    $apellido2   
     * @param    $numCta   
     * @param    $movil   
     * @param    $localidad   
     * @param    $codPostal   
     * @param    $provincia   
     * @param    $activo   
     * @param    $idDepartamento   
     * @param    $nif   
     * @param    $direccion   
     * @param    $pais   
     */
    public function __construct($id, $idEmpleado, $idUsuario, $nombre, $apellido1, $apellido2, $numCta, $movil, $localidad, $codPostal, $provincia, $activo, $idDepartamento, $nif, $direccion, $pais)
    {
        $this->id = $id;
        $this->idEmpleado = $idEmpleado;
        $this->idUsuario = $idUsuario;
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->numCta = $numCta;
        $this->movil = $movil;
        $this->localidad = $localidad;
        $this->codPostal = $codPostal;
        $this->provincia = $provincia;
        $this->activo = $activo;
        $this->idDepartamento = $idDepartamento;
        $this->nif = $nif;
        $this->direccion = $direccion;
        $this->pais = $pais;
    }






    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdEmpleado()
    {
        return $this->idEmpleado;
    }

    /**
     * @param mixed $idEmpleado
     *
     * @return self
     */
    public function setIdEmpleado($idEmpleado)
    {
        $this->idEmpleado = $idEmpleado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     *
     * @return self
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * @param mixed $apellido1
     *
     * @return self
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * @param mixed $apellido2
     *
     * @return self
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumCta()
    {
        return $this->numCta;
    }

    /**
     * @param mixed $numCta
     *
     * @return self
     */
    public function setNumCta($numCta)
    {
        $this->numCta = $numCta;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMovil()
    {
        return $this->movil;
    }

    /**
     * @param mixed $movil
     *
     * @return self
     */
    public function setMovil($movil)
    {
        $this->movil = $movil;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * @param mixed $localidad
     *
     * @return self
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodPostal()
    {
        return $this->codPostal;
    }

    /**
     * @param mixed $codPostal
     *
     * @return self
     */
    public function setCodPostal($codPostal)
    {
        $this->codPostal = $codPostal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     *
     * @return self
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * @param mixed $activo
     *
     * @return self
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    /**
     * @param mixed $idDepartamento
     *
     * @return self
     */
    public function setIdDepartamento($idDepartamento)
    {
        $this->idDepartamento = $idDepartamento;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * @param mixed $nif
     *
     * @return self
     */
    public function setNif($nif)
    {
        $this->nif = $nif;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     *
     * @return self
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * @param mixed $pais
     *
     * @return self
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }
}
 ?>