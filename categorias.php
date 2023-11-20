<?php

    include('includes/config.php');


    $page_title = "Página de Noticias";

    include('includes/navbar.php');
    include('includes/header.php');

?>


<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-white" >Categorias</h3>
                <div class="underline"></div>
            </div>
        

            <?php 
                $homeCategory = "SELECT * FROM categorias WHERE navbar_status = '0' AND status = '0' LIMIT 12";
                $homeCategory_run = mysqli_query($conn, $homeCategory);

                if(mysqli_num_rows($homeCategory_run) > 0){

                    foreach ($homeCategory_run as $cateItem) {
                        
                        ?>  
                        <div class="col-md-3 mb-4">
                            <a href="<?= base_url('category/'.$cateItem['slug']); ?>" class="text-decoration-none">
                                <div class="card card-body">
                                    <?= $cateItem['nombre']; ?>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                }

            ?>
        </div>
    </div>
</div>

<div class="py-5 b-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-dark">Tejiendo Raices</h3>
                <div class="underline"></div>
                <p>
                ¡Bienvenido a Tejiendo Raices, tu destino de moda con un propósito!
                Nos enorgullece ser el puente que conecta a mujeres indígenas talentosas
                y emprendedoras con amantes de la moda consciente como tú. Nuestra plataforma es
                mucho más que una tienda en línea: es un espacio donde la tradición se encuentra con la 
                tendencia, y donde cada compra cuenta una historia única.
                </p>
                <p>
                Cada prenda que encuentres en nuestro catálogo es una obra maestra elaborada
                por manos expertas de mujeres indígenas. Desde los vibrantes patrones hasta los
                intrincados detalles, cada pieza cuenta una historia rica en cultura y artesanía.
                Al elegir nuestra plataforma, no solo estás comprando ropa, sino también apoyando
                    y preservando las tradiciones ancestrales.
                </p>
            </div>

        </div>
    </div>
</div>

<section class="portafolio">
        <h2>Productos</h2>
        <p>
            Toma una vista de algo de nuestras memorables obras
        </p>
        <ul class="cartas">
        <?php
            $homePosts = "SELECT * FROM productos WHERE stock !='0' ORDER BY id_productos DESC LIMIT 3";
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
                                    <p></p>
                                     <a href="<?= base_url('productos/'.$postItem['slug']); ?>" class="btn btn-primary">Leer más</a>
                                     <a href="<?= base_url('productos/'.$postItem['slug']); ?>" class="btn btn-success">Comprar</a>
                                </p>
                            </li>
                    <?php

                }
            }
        ?>

    </section>


    <?php

include('includes/footer.php');
?>