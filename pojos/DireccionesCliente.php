<?php

class DireccionesCliente {
	private $id;
	private $idCliente;
	private $idUsuario;
	private $direccion;
	private $localidad;
	private $codPostal;
	private $provincia;
	private $pais;
	private $activo;

	public function __construct($id, $idCliente,$idUsuario, $direccion, $localidad, $codPostal, $provincia, $pais, $activo) {
		$this->id = $id;
		$this->idCliente = $idCliente;
		$this->idUsuario = $idUsuario;
		$this->direccion = $direccion;
		$this->localidad = $localidad;
		$this->codPostal = $codPostal;
		$this->provincia = $provincia;
		$this->pais = $pais;
		$this->activo = $activo;

	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 *
	 * @return self
	 */
	public function setId($id) {
		$this->id = $id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getIdCliente() {
		return $this->idCliente;
	}

	/**
	 * @param mixed $idCliente
	 *
	 * @return self
	 */
	public function setIdCliente($idCliente) {
		$this->idCliente = $idCliente;

		return $this;
	}
/**
	 * @return mixed
	 */
	public function getIdUsuario() {
		return $this->idUsuario;
	}

	/**
	 * @param mixed $idUsuario
	 *
	 * @return self
	 */
	public function setIdUsuario($idUsuario) {
		$this->idUsuario= $idUsuario;

		return $this;
	}



	/**
	 * @return mixed
	 */
	public function getDireccion() {
		return $this->direccion;
	}

	/**
	 * @param mixed $direccion
	 *
	 * @return self
	 */
	public function setDireccion($direccion) {
		$this->direccion = $direccion;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLocalidad() {
		return $this->localidad;
	}

	/**
	 * @param mixed $localidad
	 *
	 * @return self
	 */
	public function setLocalidad($localidad) {
		$this->localidad = $localidad;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCodPostal() {
		return $this->codPostal;
	}

	/**
	 * @param mixed $codPostal
	 *
	 * @return self
	 */
	public function setCodPostal($codPostal) {
		$this->codPostal = $codPostal;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getProvincia() {
		return $this->provincia;
	}

	/**
	 * @param mixed $provincia
	 *
	 * @return self
	 */
	public function setProvincia($provincia) {
		$this->provincia = $provincia;

		return $this;
	}

	/**
	 * @return mixed
	 */

	public function getActivo() {
		return $this->activo;
	}

	/**
	 * @param mixed $activo
	 *
	 * @return self
	 */
	public function setActivo($activo) {
		$this->activo = $activo;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPais() {
		return $this->pais;
	}

	/**
	 * @param mixed $pais
	 *
	 * @return self
	 */
	public function setPais($pais) {
		$this->pais = $pais;

		return $this;
	}

}

?>