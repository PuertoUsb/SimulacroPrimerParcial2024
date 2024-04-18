<?php
class Empresa{
    private $denominacion; 
    private $direccion; //string
    private $coleccionClientes; //array
    private $coleccionMotos; //array
    private $coleccionVentas; //array

    //constructor de los atributos de la clase empresa
    public function __construct($denominacion, $direccion, $coleccionClientes, $colCodigosMoto, $coleccionVentas){
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionClientes = array();
        $this->coleccionMotos = array();
        $this->coleccionVentas = array();
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

// Metodo para que retorne la informacion de los atributos de la clase
public function __toString(){
    $infoClientes = "";
    foreach ($this-> coleccionClientes as $infoC) {
        $infoClientes .= $infoC -> __toString(). "\n";
}
$infoVenta = "";
foreach ($this->coleccionVentas as $infoV) {
    $infoVenta = $infoV -> __toString(). "\n";
}
$infoMotos = "";
foreach ($this->coleccionMotos as $infoM) {
    $infoMotos .= $infoM -> __toString(). "\n";
}
    $info = "";
    $info .= "Denominacion: " . $this->denominacion . "\n";
    $info .="Direccion: ". $this->direccion ."\n";
    $info .="Informacion de clientes: ". $infoClientes;
    $info .="Informacion de motos: ". $infoM. "\n";
    $info .="Informacion de ventas: ". $infoVenta."\n";
    return $info;
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
    $importFinal = 0;

    // intancia creada para inicialicar la clase y utilizarla en el metodo retornarMoto
    

if ($objCliente->getEstado() == "alta"){
    $motosAVender = [];
    $colMotos = $this->getColeccionMotos();
}
foreach ($colCodigosMoto as $unCodigoMoto) {
    $unObjMoto = $this->retornarMoto($unCodigoMoto);

    if ($unObjMoto !== null && $unObjMoto->getActiva()){
        array_push($motosAVender, $unObjMoto);
        $importFinal += $unObjMoto->darPrecioVenta();
    }
}
if (count($motosAVender) > 0){ // encontre motos a vender
    $copiaColVentas = $this->getColeccionVentas();
    $idVentas = count($copiaColVentas) + 1;


}
$venta = new Venta(count($this->getColeccionVentas()), date("m/d/y"), $objCliente, $motosAVender, 0);

}

/** Metodo que registra al cliente con todas sus compras
 * @param $tipo
 * @param int $numDoc
 * @return array
 */
public function retortornarXCliente($tipo, $numDoc){
    $ventasClientes = array();
    //Recorrido exhaustivo del arreglo coleccionVentas
    foreach ( $this->coleccionVentas as $ventaC) {

        //Obtiene el cliente asociado a la venta
        $clienteVentas = $ventaC->getRefereasClientes();
        
        //Verifica si el cliente coincide con el tipo y numero de documento y lo agrega al array
        if ($clienteVentas->getTipoDocumento() == $tipo && $clienteVentas->getDocumento() == $numDoc) {
            $ventasClientes[] = $ventaC;
        }
    }
    return $ventasClientes;
}
}


?>