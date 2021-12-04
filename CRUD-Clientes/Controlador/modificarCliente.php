<?php
$id = $_POST['id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$colonia = $_POST['colonia'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$anio = $_POST['anio'];
$rfc = $_POST['rfc'];

$domicilio = "Calle ".$calle." #".$numero." Col.".$colonia;
$fecha = $anio."/".$mes."/".$dia;

include("../Modelo/cliente.php");
include("../Persistencia/clienteDAO.php");

$clienteModificar = new Cliente();
$clienteDao = new ClienteDAO();

$clienteModificar->setIdUsuario($id);
$clienteModificar->setNombres($nombres);
$clienteModificar->setApellidos($apellidos);
$clienteModificar->setCorreo($correo);
$clienteModificar->setDomicilio($domicilio);
$clienteModificar->setFechaNac($fecha);
$clienteModificar->setRfc($rfc);

$clienteDao->modificarCliente($clienteModificar);
header("Location: ../index.php");