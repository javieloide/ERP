<?php 

class FamiliaProducto{

	private $id;
	private $idFamilia;
	private $nombre;
	private $descripcion;
	private $activo;


	/**
	 * Class Constructor
	 * @param    $id   
	 * @param    $idFamilia   
	 * @param    $nombre   
	 * @param    $descripcion   
	 * @param    $activo   
	 */
	public function __construct($id, $idFamilia, $nombre, $descripcion, $activo)
	{
		$this->id = $id;
		$this->idFamilia = $idFamilia;
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
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
    public function getIdFamilia()
    {
        return $this->idFamilia;
    }

    /**
     * @param mixed $idFamilia
     *
     * @return self
     */
    public function setIdFamilia($idFamilia)
    {
        $this->idFamilia = $idFamilia;

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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     *
     * @return self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

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