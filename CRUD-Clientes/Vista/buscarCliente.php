<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tablecrud.css">
    <link rel="stylesheet" href="css/formulario.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="icons/clientes.png">
    <title>Buscar cliente por su ID</title>
</head>

<body>
    <h1 class = "h1Title">Buscar cliente por su ID</h1>
    <div>
        <div>
            <form method="POST">
            <div class="input-group">
                <div class="form-outline">
                    <input type="number" placeholder="Ingrese el ID" name="id" class="form-control" />
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
                    <i class="fas fa-search"></i>
                </button>
            </div>
            </form>
            <?php
            if (isset($_POST['id'])) {
            ?>
                <!-- Si existe el elemento POST -->
                <table>
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
                        include("../Persistencia/clienteDAO.php");
                        $clienteDAO = new ClienteDAO();
                        $tablaID = $clienteDAO->buscarPorID($_POST['id']);
                        while($registro = mysqli_fetch_array($tablaID)){
                        ?>
                        <tr>
                            <td> <?php echo $registro[0] ?> </td>
                            <td> <?php echo $registro[1] ?> </td>
                            <td> <?php echo $registro[2] ?> </td>
                            <td> <?php echo $registro[3] ?> </td>
                            <td> <?php echo $registro[4] ?> </td>
                            <td> <?php echo $registro[5] ?> </td>
                            <td> <?php echo $registro[6] ?> </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <!-- De lo contrario -->
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
                        include("../Persistencia/clienteDAO.php");
                        $clienteDAO = new ClienteDAO();
                        $tabla = $clienteDAO->leerClientes();
                        while ($registro = mysqli_fetch_array($tabla)) {
                        ?>
                            <tr>
                                <td> <?php echo $registro[0] ?> </td>
                                <td> <?php echo $registro[1] ?> </td>
                                <td> <?php echo $registro[2] ?> </td>
                                <td> <?php echo $registro[3] ?> </td>
                                <td> <?php echo $registro[4] ?> </td>
                                <td> <?php echo $registro[5] ?> </td>
                                <td> <?php echo $registro[6] ?> </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
            <div >
                <a href="../index.php" class="btn btn-info">Regresar</a>
            </div>
</body>
</html>