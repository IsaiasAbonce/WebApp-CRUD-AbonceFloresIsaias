<?php
include("../Persistencia/clienteDAO.php");
include("../Modelo/cliente.php");

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$anio = $_POST['anio'];
$mes = $_POST['mes'];
$dia = $_POST['dia'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$colonia = $_POST['colonia'];
$rfc = $_POST['rfc'];

$domicilio = "Calle ".$calle." #".$numero." Col. ".$colonia;
$fecha = $anio."/".$mes."/".$dia;

$clienteDao = new ClienteDAO();
$cliente = new Cliente();

$cliente->setNombres($nombres);
$cliente->setApellidos($apellidos);
$cliente->setCorreo($correo);
$cliente->setDomicilio($domicilio);
$cliente->setFechaNac($fecha);
$cliente->setRfc($rfc);

$clienteDao->agregaCliente($cliente);
header("Location: ../index.php");