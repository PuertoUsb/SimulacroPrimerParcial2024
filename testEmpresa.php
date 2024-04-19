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
$objCliente1 = new Cliente("Juan", "Perez", "Si", "DNI", 43123456 );
$objCliente2 = new Cliente("Pedro", "Hernandez", "No", "DNI", 44789456);

//Obgjetos moto 2
$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiable400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanela Zr 150 Ohc", 70, true );
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonia Eagle 250", 55, false);

//Objetos empresa 3
$objEmpresa1 = new Empresa("Alta gama", "Av Argentina 123", [$objMoto1, $objMoto2, $objMoto3], [$objCliente1, $objCliente2], []);
$colMotos = [$objCliente1, $objMoto2, $objMoto3];
$colClientes = [$objCliente1, $objCliente2];
echo "==================================================";
echo "==================   PUNTO 1   ===================" ;
echo "==================================================";
echo $objEmpresa1;
echo "\n";
echo "\n";

// metodo registrar venta 5
$resp = $objEmpresa1->registrarVenta([11, 12, 13],$objCliente2);
echo "==================================================";
echo "==================   PUNTO 5   ===================" ;
echo "==================================================";
echo $resp;
echo "\n";
echo "\n";

// 6
$resp = $objEmpresa1->registrarVenta([0], $objCliente2);
echo "==================================================";
echo "==================   PUNTO 6   ===================" ;
echo "==================================================";
echo $resp;

// 7
$resp = $objEmpresa1->registrarVenta([2], $objCliente2);
echo "==================================================";
echo "==================   PUNTO 7   ===================" ;
echo "==================================================";
echo $resp;

// 8
$respcolVentas = $objEmpresa1-> retortornarXCliente("dni", "1122");
echo "==================================================";
echo "==================   PUNTO 8   ===================" ;
echo "==================================================";
mostrarDatosColeccion($respcolVentas);
// 9 
$respcolVentas = $objEmpresa1-> retortornarXCliente("dni", "1142");
echo "==================================================";
echo "==================   PUNTO 9   ===================" ;
echo "==================================================";
mostrarDatosColeccion($respcolVentas);

// 10
echo "==================================================";
echo "==================   PUNTO 10   ===================" ;
echo "==================================================";
echo $objEmpresa1;
// 9 










//


?>