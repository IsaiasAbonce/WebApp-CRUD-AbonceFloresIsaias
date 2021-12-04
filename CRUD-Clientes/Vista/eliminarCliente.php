<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/styleForm.css">
    <link rel="stylesheet" href="css/tablecrud.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="icons/clientes.png">
    <title>Eliminar cliente</title>
</head>

<body>
    <h1 class="h1Title">Eliminar cliente</h1>
    <br>
    <h4>
        Clientes:
    </h4>
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
                            <td> <?php echo $registro[6] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <br>
            <h5>Ingreso de cliente a eliminar:</h5>
    <div>
        <div>
            <div>
                <form action="../Controlador/eliminarCliente.php" method="POST" class="form-register">
                    <h4 class="text-center">Eliminación de cliente</h4>
                    <label> ID de cliente a eliminar</label>
                        <select class="controls" name="id">
                            <?php
                            $ids = $clienteDAO->verIDs();
                            while ($fila = mysqli_fetch_array($ids)) {
                            ?>
                                <option> <?php echo $fila[0]; ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    <br>
                    <input type="submit" class="btn btn-danger" value="Eliminar cliente">
                    <a href="../index.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>