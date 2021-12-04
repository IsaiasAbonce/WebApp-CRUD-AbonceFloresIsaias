<?php
$id = $_POST['id'];

include("../Modelo/cliente.php");
$eliminarPorId = new Cliente();

$eliminarPorId->setIdUsuario($id);

include("../Persistencia/clienteDAO.php");
$clienteDao = new ClienteDAO();
$clienteDao->eliminarCliente($eliminarPorId);
header("Location: ../index.php");
