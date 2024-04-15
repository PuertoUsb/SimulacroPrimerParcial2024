<?php
class Empresa{
    private $denominacion;
    private $direccion;
    private $coleccionClientes; //array
    private $coleccionMotos; //array
    private $coleccionVentas; //array

    //constructor de los atributos de la clase empresa
    public function __construct($denominacion, $direccion){
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionClientes = array();
        $this->coleccionMotos = array();
        $this->coleccionVentas = array();
    }

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

return
    "Denominacion: " . $this->denominacion . "\n";
    "Direccion: ". $this->direccion ."\n";
    "Informacion de clientes: ". $infoClientes;
    "Informacion de motos: ". $infoM. "\n";
    "Informacion de ventas: ". $infoVenta."\n";
}

/** Recorre la colección de motos de la Empresa y retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
 * @param int $codigoMoto
 * @return 
 */
public function retornarMoto($codigoMoto){
    $objReferencia = null;
    $n = count($this->coleccionMotos);
    $i = 0;
    while ($i < $n) {
        $motoActual = $this->coleccionMotos[$i];
        
        if ($motoActual->getCodigo() == $codigoMoto ){
        $objReferencia = $motoActual;
        }
        $i++ ;
    }
    
    return $objReferencia;
}

/** método que recibe por parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
 *se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
 *venta que debe ser creada.
 * @param array $colCodigosMoto
 * @param string $objCliente
 * @return float
*/
public function registrarVenta($colCodigosMoto, $objCliente){

    // intancia creada para inicialicar la clase y utilizarla en el metodo retornarMoto
    $venta = new Venta(001, 2024, $objCliente, 250000);


foreach ($colCodigosMoto as $codigo) {
    $moto = $this->retornarMoto($codigo);
    if ($moto !== null && $moto->getActiva()){
        $venta->incorporarMoto($moto);
    }
}
$this->coleccionVentas[] = $venta;
return $venta->getPrecioFinal();
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