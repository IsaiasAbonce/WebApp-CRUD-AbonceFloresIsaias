<?php
//include("../Modelo/cliente.php");

class ClienteDAO{
    private $servidor = "localhost";
    private $usuario = "root";
    private $pws = "root";
    private $db = "clientes";

    public function Conectar(){
        try {
            $mysqli = new mysqli(
                $this->servidor,
                $this->usuario,
                $this->pws,
                $this->db
            );
            return $mysqli;
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
    }

    public function leerClientes(){
        $conexion = $this->Conectar();
        $consulta = "select * from cliente";

        return $resultado = $conexion->query($consulta);
    }

    public function verIDs(){
        $conexion = $this->Conectar();
        $consulta = "select id from cliente";

        return $resultado = $conexion->query($consulta);
    }

    public function agregaCliente(Cliente $cliente){
        $conectar = $this->Conectar();
        $agregarCliente = "INSERT INTO cliente (nombres,apellidos,correo,domicilio,fechaNac,rfc) values ('".$cliente->getNombres()
        ."' , '".$cliente->getApellidos()."' , '".$cliente->getCorreo()."' , '".$cliente->getDomicilio()."' , '"
        .$cliente->getFechaNac()."' , '".$cliente->getRfc()."')";
        $resultado = mysqli_query($conectar,$agregarCliente);

        return $resultado;
    }

    public function modificarCliente(Cliente $cliente){
        $conectar = $this->Conectar();
        $modificacion = "UPDATE cliente set nombres='".$cliente->getNombres()."', apellidos='".$cliente->getApellidos().
        "', correo='".$cliente->getCorreo()."', domicilio='".$cliente->getDomicilio()."', fechaNac='".$cliente->getFechaNac()."', rfc='".$cliente->getRfc().
        "' where id='".$cliente->getIdUsuario()."'";
        $resultado = mysqli_query($conectar,$modificacion);

        return $resultado;
    }

    public function eliminarCliente(Cliente $cliente){
        $conectar = $this->Conectar();
        $eliminacion = "DELETE FROM cliente WHERE id=".$cliente->getIdUsuario();
        $resultado = mysqli_query($conectar,$eliminacion);

        return $resultado;
    }

    public function buscarPorID($id){
        $conectar = $this->Conectar();
        $busqueda = "SELECT * FROM cliente WHERE id='".$id."'";
        $resultado = mysqli_query($conectar,$busqueda);

        return $resultado;
    }
}
