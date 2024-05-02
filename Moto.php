<?php
class Moto{
    private $codigo; //string
    private $costo; //float
    private $anioFabricacion; // Int
    private $descripcion; //string
    private $incrementoAnual; //float
    private $activa; //boolean

//Constructor de la clase moto
public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $incrementoAnual, $activa){
    $this->codigo = $codigo;
    $this->costo = $costo;
    $this->anioFabricacion = $anioFabricacion;
    $this->descripcion = $descripcion;
    $this->incrementoAnual = $incrementoAnual;
    $this->activa = $activa;

// Getters
}
public function getCodigo(){
    return $this->codigo;
}
public function getCosto(){
    return $this->costo;
}
public function getAnioFabricacion(){
    return $this->anioFabricacion;
}
public function getDescripcion(){
    return $this->descripcion;
}
public function getIncrementoAnual(){
    return $this->incrementoAnual;
}
public function getActiva(){
    return $this->activa;
}

// Setters
public function setCodigo($codigo) {
    $this->codigo = $codigo;
}

public function setCosto($costo) {
    $this->costo = $costo;
}

public function setAnioFabricacion($anioFabricacion) {
    $this->anioFabricacion = $anioFabricacion;
}

public function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
}

public function setIncrementoAnual($incrementoAnual) {
    $this->incrementoAnual = $incrementoAnual;
}

public function setActiva($activa) {
    $this->activa = $activa;
}

// Metodo que informa en "cadena de caracteres" los atributos de la clase
public function __toString(){
    
    $cadena = "";
    $cadena = $cadena. "Codigo: ". $this->getCodigo() ."\n";
    $cadena = $cadena. "Costo: $". $this->getCosto() ."\n";
    $cadena = $cadena. "Año de fabricacion: ". $this->getAnioFabricacion() ."\n";
    $cadena = $cadena. "Descripcion: ". $this->getDescripcion() ."\n";
    $cadena = $cadena. "Porcentaje de incremento anual: ".$this->getIncrementoAnual() . "%" . "\n";
    $cadena = $cadena. "Activa: ". $this->getActiva() ."\n";

    return $cadena ;

}

// Metodo que calcula el valor de la moto. Si la moto no se encuentra disponible para la venta retorna un valor 
// < 0. Si la moto está disponible para la venta, el método realiza el siguiente cálculo
//Retorta float
public function darPrecioVenta(){
    //$precioVenta float
    //$anioTranscurrido int
    // 
    if ($this->getActiva() == false){
        $precioVenta = -1;
    } else {
        $anioTranscurrido = date("y") - $this->getAnioFabricacion();
        $precioVenta = $this->getCosto() + ($this->getCosto() * ($anioTranscurrido * $this->getIncrementoAnual()));
    }
    return $precioVenta;
}
}
?>