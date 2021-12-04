<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Vista/css/tablecrud.css">
    <link rel="stylesheet" href="Vista/css/menu.css">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="icon" href="./Vista/icons/clientes.png">
    <title>CRUD-Clientes</title>
</head>

<body>
    <header>
        <img src="./Vista/icons/logo.jpg" alt="logo.png" class="logo">
        <nav>
            <ul>
                <li><a href="./Vista/agregarCliente.php">Agregar cliente</a></li>
                <li><a href="./Vista/modificarCliente.php">Modificar cliente</a></li>
                <li><a href="./Vista/eliminarCliente.php">Eliminar cliente</a></li>
                <li><a href="./Vista/buscarCliente.php">Buscar cliente por ID</a></li>
            </ul>
        </nav>
    </header>
    <div >
        <div >
            <table >
                <thead>
                    <th scope="col">ID Cliente</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Correo electrónico</th>
                    <th scope="col">Domicilio</th>
                    <th scope="col">Fecha de registro</th>
                    <th scope="col">RFC</th>
                </thead>
                <tbody>
                    <?php
                    include("./Persistencia/clienteDAO.php");

                    $clienteDao = new ClienteDAO();
                    $tabla = $clienteDao->leerClientes();
                    while ($registro = mysqli_fetch_array($tabla)) {
                    ?>
                        <tr>
                            <td> <?php echo $registro[0] ?> </td>
                            <td> <?php echo $registro[1] ?> </td>
                            <td> <?php echo $registro[2] ?> </td>
                            <td> <?php echo $registro[3] ?> </td>
                            <td> <?php echo $registro[4] ?> </td>
                            <td> <?php echo $registro[5] ?> </td>
                            <td> <?php echo $registro[6] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>