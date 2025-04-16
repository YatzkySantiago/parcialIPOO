<?php
class Persona{
    private $nombre;
    private $apellido;
    private $direccion;
    private $mail;
    private $telefono;
    
	public function __construct($nom, $ap, $direc, $mail, $telef) {
		$this->nombre = $nom;
		$this->apellido = $ap;
		$this->direccion = $direc;
		$this->mail = $mail;
		$this->telefono = $telef;
	}


	public function getNombre() {
		return $this->nombre;
	}
	public function setNombre($nomb) {
		$this->nombre = $nomb;
	}

	public function getApellido() {
		return $this->apellido;
	}
	public function setApellido($apll) {
		$this->apellido = $apll;
	}

	public function getDireccion() {
		return $this->direccion;
	}
	public function setDireccion($dir) {
		$this->direccion = $dir;
	}

	public function getMail() {
		return $this->mail;
	}
	public function setMail($ml) {
		$this->mail = $ml;
	}

	public function getTelefono() {
		return $this->telefono;
	}
	public function setTelefono($telf) {
		$this->telefono = $telf;
	}

    public function __toString(){
        return "Nombre: " . $this->getNombre() . "\nApellido: " . $this->getApellido() . "\nDireccíon: " . $this->getDireccion() . "\nMail: " . $this->getMail() . "\nTelefono: " . $this->getTelefono();
    }
}