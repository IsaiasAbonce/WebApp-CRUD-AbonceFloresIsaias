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
    <title>Modificar cliente</title>
</head>

<body>
    <h1 class="h1Title">Modificar cliente</h1>
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
                    $clienteDao = new clienteDAO();
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
            <br>
            <h5>Ingreso de cliente a modificar:</h5>
    <div>
        <div>
            <div>
                <form action="../Controlador/modificarCliente.php" method="POST" class="form-register">
                <label> ID de cliente a modificar</label>
                        <select class="controls" name="id">
                            <?php
                            $ids = $clienteDao->verIDs();
                            while ($fila = mysqli_fetch_array($ids)) {
                            ?>
                                <option> <?php echo $fila[0]; ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                        
                    <label>Nombres</label>
                <input type="text" class="controls" name="nombres">
                <label>Apellidos</label>       
                <input type="text" class="controls" name="apellidos">
                <label>Correo electrónico</label>
                <input type="email" class="controls" name="correo">      
                <label>RFC</label>
                <input type="text" class="controls" name="rfc">
                <label>Fecha de Nacimiento:</label>
                <br>
                <label>Año</label>
                <select class="controls" name="anio">
                    <?php for ($i = 1998; $i < 2050; $i++) { ?>
                        <option> <?php echo $i ?> </option>
                        <?php } ?>
                    </select>
                <label>Mes</label>
                <select class="controls" name="mes">
                    <option> 01 </option>
                    <option> 02 </option>
                    <option> 03 </option>
                    <option> 04 </option>
                    <option> 05 </option>
                    <option> 06 </option>
                    <option> 07 </option>
                    <option> 08 </option>
                    <option> 09 </option>
                    <?php for ($i = 10; $i < 13; $i++) { ?>
                        <option> <?php echo $i ?> </option>
                        <?php } ?>
                    </select>
                <label>Día</label>
                <select class="controls" name="dia">
                    <option> 01 </option>
                    <option> 02 </option>
                    <option> 03 </option>
                    <option> 04 </option>
                    <option> 05 </option>
                    <option> 06 </option>
                    <option> 07 </option>
                    <option> 08 </option>
                    <option> 09 </option>
                    <?php for ($i = 10; $i < 32; $i++) { ?>
                        <option> <?php echo $i ?> </option>
                        <?php } ?>
                    </select>
                <br>
                <label>Domicilio:</label>
                <br>
                <label>Calle</label>
                <input type="text" class="controls" name="calle">
                <label>Número</label>
                <input type="text" class="controls" name="numero">
                <label>Colonia</label>
                <input type="text" class="controls" name="colonia">  
                <br>
                <input type="submit" class="btn btn-primary" value="Registrar">
                <a href="../index.php" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>