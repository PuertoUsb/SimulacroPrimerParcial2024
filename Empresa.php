<?php
class Empresa{
    private $denominacion; 
    private $direccion; //string
    private $coleccionClientes; //array
    private $coleccionMotos; //array
    private $coleccionVentas; //array

    //constructor de los atributos de la clase empresa
    public function __construct($denominacion, $direccion, $coleccionClientes, $coleccionMotos, $coleccionVentas){
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionClientes = $coleccionClientes;
        $this->coleccionMotos = $coleccionMotos;
        $this->coleccionVentas = $coleccionVentas;
    }

    //Getters
    public function getDenominacion(){
        return $this->denominacion;
    }
    public function getdireccion(){
        return $this->direccion;
    }
    public function getColeccionClientes(){
        return $this->coleccionClientes;
    }
    public function getColeccionMotos(){
        return $this->coleccionMotos;
    }
    public function getColeccionVentas(){
        return $this->coleccionVentas;
    }
    //Setters
    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function setColeccionClientes($coleccionClientes){
        $this->coleccionClientes = $coleccionClientes;
    }

    public function setColeccionMotos($coleccionMotos){
        $this->coleccionMotos = $coleccionMotos;
    }

    public function setColeccionVentas($coleccionVentas){
        $this->coleccionVentas = $coleccionVentas;
    }

    /** Metodo que devuelve una cadena con los valores de los atributos de la intancia actual de la clase
     * @param array
     * @return string
     */
private function retornarCadenaDesdeColeccion($coleccion){
    $cadena = "";
    foreach ($coleccion as $unElemntoCol) {
        $cadena = $cadena. "  " . $unElemntoCol . "\n";
    }
    return $cadena;
}


// Metodo para que retorne la informacion de los atributos de la clase
public function __toString(){
    //$cadena string
    $cadena = "Denominacion: " . $this->getDenominacion() . "\n";
    $cadena = $cadena. "Direccion: ". $this->getDireccion() ."\n";

    $cadena = $cadena. "************  Informacion de clientes  ************ \n"
    . $this->retornarCadenaDesdeColeccion($this->getColeccionClientes()). "\n";

    $cadena = $cadena. "************  Coleccion de motos  ************ \n" 
    . $this->retornarCadenaDesdeColeccion($this->getColeccionMotos()). "\n";

    $cadena = $cadena. "************  Coleccion de ventas  ************ \n"
    . $this->retornarCadenaDesdeColeccion($this->getColeccionVentas()). "\n";

    return $cadena;
}

/** Recorre la colección de motos de la Empresa y retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
 * @param int $codigoMoto
 * @return 
 */
public function retornarMoto($codigoMoto){
    //$objReferencia moto
    //$motoEncontrada bool
    //$colMotosCopia array
    //$i int

    $objReferencia = null;
    $motoEncontrada = false;
    $colMotosCopia = $this->getColeccionMotos();
    $i = 0;
    while ($i < count($colMotosCopia) && !$motoEncontrada ) {
        if ($colMotosCopia[$i]-> getCodigo() == $codigoMoto){
            $motoEncontrada = true;
            $objReferencia = $colMotosCopia[$i];
        }
        $i++ ;
    }
    
    return $objReferencia;
}

/** método que recibe por parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
 *se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
 *venta que debe ser creada.
 * @param array $colCodigosMoto
 * @param Cliente $objCliente
 * @return float
*/
public function registrarVenta($colCodigosMoto, $objCliente){
    //$importeFinal float
    //$motosAVender array
    //$colMotos colecion de motos
    //$unObjMoto moto
    //$copiaColVentas colecion de ventas
    //$idVentas int
    //$NuevaVenta intacia de venta

    $importeFinal = 0;
    
if ($objCliente->getEstado() == "alta"){

    $motosAVender = [];
    $copiaColVentas = $this->getColeccionVentas();
    $idVentas = count($copiaColVentas) + 1;
    // ($numero, $fecha, $cliente, $colMotos, $precioFinal)
    $nuevaVenta = new Venta($idVentas, date("m/d/y"), $objCliente, $motosAVender, 0);
    $colMotos = $this->getColeccionMotos();

    foreach ($colCodigosMoto as $unCodigoMoto) {
    $unObjMoto = $this->retornarMoto($unCodigoMoto);

    if ($unObjMoto != null){
        //Por cada moto encontrada y activa
    $nuevaVenta->incorporarMoto($unObjMoto);
    }
}

if (count($nuevaVenta->getObjColeccionMotos()) > 0 ){ // encontre motos a vender
    array_push($copiaColVentas, $nuevaVenta);
    $this->setColeccionVentas($copiaColVentas); //Actualiza la coleccion ventas
    $importeFinal = $nuevaVenta->getPrecioFinal();
}

}else{
    $importeFinal = -1;
}
return $importeFinal;
    
}

/** Metodo que registra al cliente con todas sus compras
 * @param $tipo
 * @param int $numDoc
 * @return array
 */
public function retortornarXCliente($tipo, $numDoc){
    //$colVentasClientes array
    //$colVentasRealizadas colecion de ventas
    $colVentasClientes = [];
    $colVentasRealizadas = $this->getColeccionVentas();

    //Recorrido exhaustivo del arreglo coleccionVentas
    foreach ( $colVentasRealizadas as $unObjVenta) {
        //Verifica si el cliente coincide con el tipo y numero de documento y lo agrega al array
        if ($unObjVenta->getObjCliente()->getTipoDocumento() == $tipo 
            && $unObjVenta->getObjCliente()->getDocumento() == $numDoc) {
                //agrega al cliente en una coleccion de sus ventas
            array_push($colVentasClientes, $unObjVenta);
        }
    }
    return $colVentasClientes;
}
}


?>