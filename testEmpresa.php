<?php 
include_once("Cliente.php");
include_once("Venta.php");
include_once("Moto.php");
include_once("Empresa.php");

function mostrarDatosColeccion($unaColeccion){
    echo "### VENTAS ###". "\n";
    foreach($unaColeccion as $unElemento){
        echo $unElemento . "\n";
    }
    echo "### VENTAS ###". "\n";
}

//Objetos cliente 1
$objCliente1 = new Cliente("Juan", "Perez", "alta", "DNI", 43123456 );
$objCliente2 = new Cliente("Pedro", "Hernandez", "alta", "DNI", 44789456);

//Obgjetos moto 2
$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiable400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanela Zr 150 Ohc", 70, true );
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonia Eagle 250", 55, false);

//Objetos empresa 3
$colMotos = [$objCliente1, $objMoto2, $objMoto3];
$colClientes = [$objCliente1, $objCliente2];
$objEmpresa1 = new Empresa("Alta gama", "Av Argentina 123", $colClientes, $colMotos, []);

echo "==================================================\n";
echo "==================   PUNTO 1   ===================\n" ;
echo "==================================================\n";
echo $objEmpresa1;
echo "\n";
echo "\n";

// metodo registrar venta 5
$resp = $objEmpresa1->registrarVenta([11, 12, 13],$objCliente2);
echo "==================================================\n";
echo "==================   PUNTO 5   ===================\n" ;
echo "==================================================\n";
echo $resp . "\n";
echo $objEmpresa1. "\n";
echo "\n";

// 6
$resp = $objEmpresa1->registrarVenta([0], $objCliente2);
echo "==================================================\n";
echo "==================   PUNTO 6   ===================\n" ;
echo "==================================================\n";
echo $objEmpresa1;

// 7
$resp = $objEmpresa1->registrarVenta([2], $objCliente2);
echo "==================================================\n";
echo "==================   PUNTO 7   ===================\n" ;
echo "==================================================\n";
echo $resp;

// 8
$respcolVentas1 = $objEmpresa1-> retortornarXCliente("dni", "1122");
echo "==================================================\n";
echo "==================   PUNTO 8   ===================\n" ;
echo "==================================================\n";
mostrarDatosColeccion($respcolVentas1);
// 9 
$respcolVentas2 = $objEmpresa1-> retortornarXCliente("dni", "1142");
echo "==================================================\n";
echo "==================   PUNTO 9   ===================\n" ;
echo "==================================================\n";
mostrarDatosColeccion($respcolVentas2);

// 10
echo "==================================================\n";
echo "==================   PUNTO 10   ===================\n" ;
echo "==================================================\n";
echo $objEmpresa1;
// 9 










//


?>