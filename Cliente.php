<?php
class Cliente{
    private $nombre;
    private $apellido;
    private $estado;
    private $tipoDocumento;
    private $numDocumento;

    public function __construct($nombre, $apellido, $estado, $tipoDocumento,$numDocumento){
    $this-> nombre = $nombre;
    $this->apellido = $apellido;
    $this->tipoDocumento = $tipoDocumento;
    $this->numDocumento = $numDocumento;
    $this-> estado = $estado;
    }

// Getters 
public function getNombre(){
    return $this->nombre;
}
public function getApellido(){
    return $this->apellido;
}
public function getTipoDocumento(){
    return $this->tipoDocumento;
}
public function getEstado(){
    return $this->estado;
}
public function getNumDocumento(){
    return $this->numDocumento;
}

// Setters/Modificadores
public function setNombre($nombre) {
    $this->nombre = $nombre;
}

public function setApellido($apellido) {
    $this->apellido = $apellido;
}

public function setEstado($estado) {
    $this->estado = $estado;
}

public function setTipoDocumento($tipoDocumento) {
    $this->tipoDocumento = $tipoDocumento;
}

public function setNumDocumento($numDocumento) {
    $this->numDocumento = $numDocumento;
}


/** Metodo que informa en "cadena de caracteres" de los atributos
 *  @return string
 */
public function __toString(){
    $cadena = "";
    $cadena .= "Nombre: " . $this->getNombre(). "\n";  
    $cadena .="Apellido: ". $this->getApellido() . "\n";
    $cadena .="Tipo de documento: ". $this->getTipoDocumento() ."\n";
    $cadena .="Documento: ". $this->getNumDocumento() ."\n";
    $cadena .="Dado de baja: ". ($this->getEstado() ? "Si" : "No") ."\n";

    return $cadena;
}


}
?>