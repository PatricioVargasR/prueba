<?php
include_once "funciones.php";
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit_button"])) {
    quitarCarrito();
}
# Saber si redireccionamos a tienda o al carrito, esto es porque
# llamamos a este archivo desde la tienda y desde el carrito
if (isset($_POST["redireccionar_carrito"])) {
    header("Location: productos.php");
} else {
    header("Location: terminar_compra.php");
}
