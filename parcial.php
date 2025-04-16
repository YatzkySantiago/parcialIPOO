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
class Vuelo{
    private $numero;
    private $importe;
    private $fecha;
    private $destino;
    private $horaArribo;
    private $horaPartida;
    private $asientosTotales;
    private $asientosDisponibles;
    private $personaResp;

	public function __construct($numero, $importe, $fecha, $destino, $horaArribo, $horaPartida, $asientosTotales, $asientosDisponibles, $personaResp) {
		$this->numero = $numero;
		$this->importe = $importe;
		$this->fecha = $fecha;
		$this->destino = $destino;
		$this->horaArribo = $horaArribo;
		$this->horaPartida = $horaPartida;
		$this->asientosTotales = $asientosTotales;
		$this->asientosDisponibles = $asientosDisponibles;
		$this->personaResp = $personaResp;
	}

	public function getNumero() {
		return $this->numero;
	}
	public function setNumero($val) {
		$this->numero = $val;
	}

	public function getImporte() {
		return $this->importe;
	}
	public function setImporte($val) {
		$this->importe = $val;
	}

	public function getFecha() {
		return $this->fecha;
	}
	public function setFecha($val) {
		$this->fecha = $val;
	}

	public function getDestino() {
		return $this->destino;
	}
	public function setDestino($val) {
		$this->destino = $val;
	}

	public function getHoraArribo() {
		return $this->horaArribo;
	}
	public function setHoraArribo($val) {
		$this->horaArribo = $val;
	}

	public function getHoraPartida() {
		return $this->horaPartida;
	}
	public function setHoraPartida($val) {
		$this->horaPartida = $val;
	}

	public function getAsientosTotales() {
		return $this->asientosTotales;
	}
	public function setAsientosTotales($val) {
		$this->asientosTotales = $val;
	}

	public function getAsientosDisponibles() {
		return $this->asientosDisponibles;
	}
	public function setAsientosDisponibles($val) {
		$this->asientosDisponibles = $val;
	}

	public function getPersonaResp() {
		return $this->personaResp;
	}
	public function setPersonaResp($val) {
		$this->personaResp = $val;
	}

    public function asignarAsientosDisponibles($cantidad){
        $respuesta = false;
        if ($cantidad <= $this->getAsientosDisponibles()) {
            $this->setAsientosDisponibles($this->getAsientosDisponibles() - $cantidad);
            $respuesta = true;
        }
        return $respuesta;
    }
}
class Aerolinea{
    private $identificacion;
    private $nombre;
    private $vuelosProgramados;

	public function __construct($identificacion, $nombre) {
		$this->identificacion = $identificacion;
		$this->nombre = $nombre;
		$this->vuelosProgramados = [];
	}


	public function getIdentificacion() {
		return $this->identificacion;
	}
	public function setIdentificacion($val) {
		$this->identificacion = $val;
	}

	public function getNombre() {
		return $this->nombre;
	}
	public function setNombre($val) {
		$this->nombre = $val;
	}

	public function getVuelosProgramados() {
		return $this->vuelosProgramados;
	}
	public function setVuelosProgramados($val) {
		$this->vuelosProgramados[] = $val;
	}

    public function darVueloADestino($destino, $cantAsientos){
        $colVuelos = array();
        foreach ($this->getVuelosProgramados() as $unObjVuelo) {
            if ($unObjVuelo->getDestino() == $destino && $cantAsientos <= $unObjVuelo->getAsientosDisponibles()) {
                $colVuelos[] = $unObjVuelo;
            }
        }
        return $colVuelos;
    }

    public function incorporarVuelo($objVuelo){
        $respuesta = false;
        foreach ($this->getVuelosProgramados() as $vuelos) {
            if ($vuelos->getDestino() == $objVuelo->getDestino() && $vuelos->getFecha() != $objVuelo->getFecha()) {
                $this->setVuelosProgramados($objVuelo);
                $respuesta = true;
            }
        }
        return $respuesta;
    }

    public function venderVueloADestino($cantAsientos, $destino, $fecha){
        $respuesta = null;
        foreach ($this->getVuelosProgramados as $vuelos) {
            if ($destino == $vuelos->getDestino() && $vuelos->asignarAsientosDisponibles($cantAsientos)) {
                $respuesta = $vuelos;
            }
        }
        return $respuesta;
    }

    public function montoPromedioRecaudado(){
        $promedio = 0;
        $total = 0;
        foreach ($this->getVuelosProgramados as $vuelos) {
            $total = $total + $vuelos->getImporte();
            $promedio = $total / count($this->getVuelosProgramados);
        }
        return $promedio;
    }
}