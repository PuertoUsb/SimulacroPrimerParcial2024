<?php
class Venta{
    private $num;
    private $fecha;
    private $referenciaCliente;
    private $refColeccionMotos;
    private $precioFinal;

    // Cosntructor de la clase venta
    public function __construct($num, $fecha, $referenciaCliente, $precioFinal,){
        $this->num = $num;
        $this->fecha = $fecha;
        $this->referenciaCliente = $referenciaCliente;
        $this->refColeccionMotos = array();
        $this->precioFinal = $precioFinal;
    }


    // Getters
    public function getNum(){
        return $this->num;
    }
    public function getFecha(){
        return $this->fecha;
    }   
    public function getReferenciaCliente(){
        return $this->referenciaCliente;
    }
    public function getRefColeccionMotos(){
        return $this->refColeccionMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    // Metodo ToString para retornar la informacion de los atributos en forma de cadena de caracteres
    public function __toString(){
    return
    $infoMotos = "";
    foreach ($this-> refColeccionMotos as $motos) {
        $infoMotos = $motos -> __toString(). "\n";
    }
    return 
    "Numero de venta: ". $this->num ."\n";
    "Fecha: ". $this->fecha ."\n";
    "Cliente: ". $this->referenciaCliente ."\n";
    "Motos vendidas; ". $infoMotos;
    "Precio final: $". $this->precioFinal ."\n";
    }

    // Metodo que incorpora un objeto moto a la coleccion de motos de la venta, siempre y cuando sea posible la venta
    public function incorporarMoto($objMoto){
        $incorporado = false;
        if ($objMoto->activa === true){
            $this->refColeccionMotos[] = $objMoto;
            $this->precioFinal += $objMoto->darPrecioVenta();
            $incorporado = true;
        }
        return $incorporado;
    }
}


?>