<?php 

class Cliente
{
	private $id;
	private $idCliente;
	private $idUsuario;
	private $nombre;
	private $apellido1;
	private $apellido2;
	private $nif;
	private $varon;
	private $numCta;
	private $comoNosConocio;
	private $activo;


	/**
	 * Class Constructor
	 * @param    $id   
	 * @param    $idCliente   
	 * @param    $idUsuario   
	 * @param    $nombre   
	 * @param    $apellido1   
	 * @param    $apellido2   
	 * @param    $nif   
	 * @param    $varon   
	 * @param    $numCta   
	 * @param    $comoNosConocio   
	 * @param    $activo   
	 */
	public function __construct($id, $idCliente, $idUsuario, $nombre, $apellido1, $apellido2, $nif, $varon, $numCta, $comoNosConocio, $activo)
	{
		$this->id = $id;
		$this->idCliente = $idCliente;
		$this->idUsuario = $idUsuario;
		$this->nombre = $nombre;
		$this->apellido1 = $apellido1;
		$this->apellido2 = $apellido2;
		$this->nif = $nif;
		$this->varon = $varon;
		$this->numCta = $numCta;
		$this->comoNosConocio = $comoNosConocio;
		$this->activo = $activo;
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
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @param mixed $idCliente
     *
     * @return self
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

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
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * @param mixed $nif
     *
     * @return self
     */
    public function setNif(String $nif)
    {
        $this->nif = $nif;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVaron()
    {
        return $this->varon;
    }

    /**
     * @param mixed $varon
     *
     * @return self
     */
    public function setVaron($varon)
    {
        $this->varon = $varon;

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
    public function getComoNosConocio()
    {
        return $this->comoNosConocio;
    }

    /**
     * @param mixed $comoNosConocio
     *
     * @return self
     */
    public function setComoNosConocio($comoNosConocio)
    {
        $this->comoNosConocio = $comoNosConocio;

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
}


 ?>