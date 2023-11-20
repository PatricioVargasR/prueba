<?php

    include('includes/config.php');


    $page_title = "Página de Productos";

    include('includes/header.php');
    include('includes/navbar.php');
?>


<section class="portafolio">
        <h3>Productos</h3>
        <div class="underline"></div>
        <!-- <p>
            Toma una vista de algo de nuestras memorables obras
        </p> -->
        <ul class="cartas">
        <?php
            $homePosts = "SELECT * FROM productos WHERE stock != 0 ORDER BY id_productos DESC";
            $homePosts_run = mysqli_query($conn, $homePosts);

            if(mysqli_num_rows($homePosts_run) > 0){

                foreach ($homePosts_run as $postItem) {

                    ?>

                            <li class="carta">
                                <?php

                                    if($postItem['imagen'] != null):
                                        ?>
                                            <img src="<?= base_url('uploads/posts/'.$postItem['imagen']);?>" alt="<?=$postItem['nombre_producto'];?>" style="width:100%">
                                <?php endif; ?>

                                <h3><?=$postItem['nombre_producto'];?></h3>
                                <p>
                                    Precio: <?= $postItem['precio_unitario']; ?><br/><p></p>
                                    Diseñado por: <?= $postItem['autor']; ?> <br/><p></p>

                                     <a href="<?= base_url('productos/'.$postItem['slug']); ?>" class="btn btn-primary">Ver más</a>
<!--                                      <form action="agregar_al_carrito.php" method='post'>
                                        <br>
                                        <input type="hidden" name='id_producto' value="<?= $postItem['id_productos']; ?>">
                                        <button class="btn btn-success">
                                            Agregar al carrito
                                        </button>
                                     </form> -->
                                </p>
                            </li>
                    <?php

                }
            }
        ?>

    </section>

    <br><br><br>
        </div>
    </div>
</div>

<?php

    include('includes/footer.php');
?>
