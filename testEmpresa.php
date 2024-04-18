<?php 
//Objetos cliente
$objCliente1 = new Cliente("Juan", "Perez", "Si", "DNI", 43123456 );
$objCliente2 = new Cliente("Pedro", "Hernandez", "No", "DNI", 44789456);

//Obgjetos moto
$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiable400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanela Zr 150 Ohc", 70, true );
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonia Eagle 250", 55, false);

//Objetos empresa
$objEmpresa = new Empresa("Alta gama", "Av Argentina 123", [$objMoto1, $objMoto2, $objMoto3], [$objCliente1, $objCliente2], []);



?>