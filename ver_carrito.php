<?php

    #include('includes/config.php');

    include('funciones.php');

    $page_title = "Página de Productos";

    include('includes/header.php');
    include('includes/navbar.php');


    $productos = obtenerProductosEnCarrito();
?>



<section class="informacion">
<center>
        <h3>Productos</h3>
        <div class="underline"></div>
        <!-- <p>
            Toma una vista de algo de nuestras memorables obras
        </p> -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Quitar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($productos as $producto) {
                        $total += $producto->precio_unitario;
                    ?>
                        <tr>
                            <td><?php echo $producto->nombre_producto ?></td>
                            <td>$<?php echo number_format($producto->precio_unitario, 2) ?></td>
                            <td>
                                <form action="eliminar_del_carrito.php" method="post">
                                    <input type="hidden" name="id_producto" value="<?php echo $producto->id_productos ?>">
                                    <input type="hidden" name="redireccionar_carrito">
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash-o"></i>Eliminar
                                    </button>
                                </form>
                            </td>
                        <?php } ?>
                        </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="is-size-4 has-text-right"><strong>Total</strong></td>
                        <td colspan="2" class="is-size-4">
                            $<?php echo number_format($total, 2) ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <a href="terminar_compra.php" class="button is-success is-large"><i class="fa fa-check"></i>&nbsp;Terminar compra</a>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    </center>
    </section>

<?php

    include('includes/footer.php');
?>
