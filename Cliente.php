<?php
class Client{
    private $nombre;
    private $apellido;
    private $dadoDeBaja;
    private $tipoDocumento;
    private $numDocumento;

    public function __construct($nombre, $apellido, $dadoDeBaja, $tipoDocumento,$numDocumento){
    $this-> nombre = $nombre;
    $this->apellido = $apellido;
    $this->tipoDocumento = $tipoDocumento;
    $this->numDocumento = $numDocumento;
    $this-> dadoDeBaja = $dadoDeBaja;
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
public function getDadoDeBaja(){
    return $this->dadoDeBaja;
}
public function getDocumento(){
    return $this->numDocumento;
}

// Metodo que informa en "cadena de caracteres" de los atributos
public function __toString(){
    return 
    "Nombre: " . $this->nombre. "\n";  
    "Apellido: ". $this->apellido . "\n";
    "Tipo de documento: ". $this->tipoDocumento ."\n";
    "Documento: ". $this->numDocumento ."\n";
    "Dado de baja: ". ($this->dadoDeBaja ? "Si" : "No") ."\n";
}


}

?>