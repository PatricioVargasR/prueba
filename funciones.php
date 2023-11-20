<?php
include('admin/config/dbconn.php');
include('includes/config.php');

function agregarProductoAlCarrito($idProducto)
{
    // Ligar el id del producto con el usuario a través de la sesión
    $bd = obtenerConexion();
    $idSesion = session_id();
    $sentencia = $bd->prepare("INSERT INTO carrito(id_sesion, id_producto) VALUES (?, ?)");
    return $sentencia->execute([$idSesion, $idProducto]);
}

function obtenerProductosEnCarrito()
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT productos.id_productos, productos.nombre_producto, productos.precio_unitario
     FROM productos
     INNER JOIN carrito
     ON productos.id_productos = carrito.id_producto
     WHERE carrito.id_sesion = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll();
}

function obtenerConexion()
{

    $user = 'root';
    $password = '';
    $dbName = 'productos';


    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}
function quitarProductoDelCarrito($idProducto)
{
    $bd = obtenerConexion();
    $idSesion = session_id();
    $sentencia = $bd->prepare("DELETE FROM carrito WHERE id_sesion = ? AND id_producto = ?");
    return $sentencia->execute([$idSesion, $idProducto]);
}

?>