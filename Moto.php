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

// Metodo que informa en "cadena de caracteres" los atributos de la clase
public function __toString(){
    return 
    "Codigo: ". $this->codigo ."\n";
    "Costo: $". $this->costo ."\n";
    "Año de fabricacion: ". $this->anioFabricacion ."\n";
    "Descripcion: ". $this->descripcion ."\n";
    "Porcentaje de incremento anual: ".$this->incrementoAnual . "%" . "\n";
    "Activa: ". ($this->activa ? "Si" : "No") ."\n";
}

// Metodo que calcula el valor de la moto. Si la moto no se encuentra disponible para la venta retorna un valor 
// < 0. Si la moto está disponible para la venta, el método realiza el siguiente cálculo
//Retorta float
public function darPrecioVenta(){
    if (!$this->activa){
        $precioVenta = -1;
    } else {
        $precioVenta = $this->costo + $this->costo * ($this->anioFabricacion * $this->incrementoAnual);
    }
    return $precioVenta;
}

}


?>