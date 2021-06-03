<?php 

class Departamento
{
	private $id;
	private $idDepartamento;
	private $nombre;
	private $activo;


    /**
     * Class Constructor
     * @param    $id   
     * @param    $idDepartamento   
     * @param    $nombre   
     * @param    $activo   
     */
    public function __construct($id, $idDepartamento, $nombre, $activo)
    {
        $this->id = $id;
        $this->idDepartamento = $idDepartamento;
        $this->nombre = $nombre;
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

	