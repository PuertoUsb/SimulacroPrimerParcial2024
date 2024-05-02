<?php
class Venta{
    private $num;
    private $fecha;
    private $objCliente;
    private $objColeccionMotos;
    private $precioFinal;

    // Cosntructor de la clase venta
    public function __construct($num, $fecha, $objCliente, $objColeccionMotos, $precioFinal){
        $this->num = $num;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->objColeccionMotos = $objColeccionMotos;
        $this->precioFinal = $precioFinal;
    }


    // Getters
    public function getNum(){
        return $this->num;
    }
    public function getFecha(){
        return $this->fecha;
    }   
    public function getObjCliente(){
        return $this->objCliente;
    }
    public function getObjColeccionMotos(){
        return $this->objColeccionMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    // Setters
    public function setNum($num) {
        $this->num = $num;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setObjCliente($objCliente) {
        $this->objCliente = $objCliente;
    }

    public function setObjColeccionMotos($objColeccionMotos) {
        $this->objColeccionMotos = $objColeccionMotos;
    }

    public function setPrecioFinal($precioFinal) {
        $this->precioFinal = $precioFinal;
    }

    /** Metodo ToString para retornar la informacion de los atributos en forma de cadena de caracteres
     * @return string
    */
    public function __toString(){
    return
    $cadena = "============   VENTA". $this->getNum()  . "============";
    
    $cadena = $cadena. "Numero: ". $this->getNum() ."\n";
    $cadena = $cadena. "Fecha: ". $this->getFecha() ."\n";
    $cadena = $cadena. "Cliente: ". $this->getObjCliente() ."\n";
    $cadena = $cadena. "Coleccion de motos:---> ". $this->colMotosString() ."\n";
    $cadena = $cadena. "Precio final: $". $this->getPrecioFinal() ."\n";
    return $cadena;
    }
 
    /** Metodo que me retorna en tipo string toda la objColeccionMotos
     * @return string
     */
    public function colMotosString(){
        //$infoM array
        //$cadena string
        $cadena = "";
        $infoM = $this->getObjColeccionMotos();

        for($i = 0 ; $i < count($infoM); $i++){
            $cadena = $cadena. "Moto n°: ". $i . "\n". $infoM[$i]. "\n";
        }
        return $cadena;

    }

    // Metodo que incorpora un objeto moto a la coleccion de motos de la venta, siempre y cuando sea posible la venta
    public function incorporarMoto($objMoto){
        //$colMotosCopia array
        //$precioMoto, $precioFinalCopia float

        if ($objMoto->getActiva()){
            $colMotosCopia = $this->getObjColeccionMotos();
            array_push($colMotosCopia, $objMoto);
            $this->setObjcoleccionMotos($colMotosCopia);

            $precioMoto = $objMoto->darPrecioVEnta();
            $precioFinalCopia = $this->getPrecioFinal();
            $precioFinalCopia += $precioMoto;
            $this->setPrecioFinal($precioFinalCopia);
        }
    }
}

?>