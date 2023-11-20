<?php

    include('includes/config.php');

    if(isset($_GET['title'])){

        $slug = mysqli_real_escape_string($conn, $_GET['title']);

        $meta_posts = "SELECT * FROM productos WHERE slug='$slug' LIMIT 1";
        $meta_posts_run = mysqli_query($conn, $meta_posts);

        if(mysqli_num_rows($meta_posts_run) > 0){

            $metaPostItem = mysqli_fetch_array($meta_posts_run);

            $page_title = $metaPostItem['nombre_producto'];

        } else {

            $page_title = "Página de Post";

        }

    } else {

        $page_title = "Página de Post";

    }

    include('includes/header.php');
    include('includes/navbar.php');
?>




<div class="py-5">
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <?php

                    if(isset($_GET['title'])){

                        $slug = mysqli_real_escape_string($conn, $_GET['title']);

                        $posts = "SELECT * FROM productos WHERE slug='$slug' LIMIT 1";
                        $posts_run = mysqli_query($conn, $posts);

                        if(mysqli_num_rows($posts_run) > 0){

                            foreach ($posts_run as $postItems) {
                                ?>
                                    <div class="card shadow-sm mb-4">
                                        <div class="card-header">
                                            <h5><?= $postItems['nombre_producto']; ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <hr/>
                                            <?php

                                                if($postItems['imagen'] != null):

                                                    ?>
                                                    <center>
                                                        <img src="<?= base_url('uploads/posts/'.$postItems['imagen']);?>" alt="<?=$postItems['nombre_producto'];?>" class="w-75">
                                                        </center>
                                                        <br>
                                                    <?php endif; ?>

                                            <div>
                                                <?= $postItems['descripcion']; ?>
                                            </div>
                                        </div>
                                    </div>


                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>$<?= $postItems['precio_unitario']; ?></h4>
                                            </div>
                                            <div class="card-body">
                                                Entrega GRATIS el sábado, 25 de noviembre

                                                <br>
                                                <br>
                                                <p>Estado: Disponible</p>
                                                <br>
                                                <p>
                                                <?php if(isset($_SESSION['auth_user'])): ?>
                                                <a href="<?= base_url('productos/'.$postItems['slug']); ?>" class="btn btn-success">Comprar</a>
                                                <p></p>
                                                <form action="<?= base_url('agregar_al_carrito.php'); ?>" method='post'>
                                                    <br>
                                                    <input type="hidden" name='id_producto' value="<?= $postItems['id_productos']; ?>">

                                                    <button class="btn btn-success">
                                                        Agregar al carrito
                                                    </button>
                                                </form>
                                                </p>
                                                <?php else : ?>
                                                <center>
                                                <p>Inicia sesión para poder comprar</p>
                                                <a href="<?= base_url('login.php'); ?>" class="btn btn-success">Iniciar Sesión</a>
                                                </center>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                            }



                        } else {

                            ?><
                                <h4>No se encontró el post</h4>
                            <?php

                        }

                    } else {
                        ?>
                            <h4>No se encontró la URL</h4>
                        <?php
                    }



                ?>



        </div>
    </div>
</div>

<?php

    include('includes/footer.php');
?>
