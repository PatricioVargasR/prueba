<?php

    include('includes/config.php');

    if(isset($_GET['title'])){

        $slug = mysqli_real_escape_string($conn, $_GET['title']);

        $category = "SELECT slug,nombre, descripcion FROM categorias WHERE slug = '$slug' AND status='0' LIMIT 1";
        $category_run = mysqli_query($conn, $category);

        if(mysqli_num_rows($category_run) > 0){

            $categoryItem = mysqli_fetch_array($category_run);

            $page_title = $categoryItem['nombre'];
            $meta_description = $categoryItem['descripcion'];

        } else {

            
            $page_title = "Página de Categorias";
        }            
        
    } else {

        $page_title = "Página de Categorias";

    } 


    include('includes/header.php');
    include('includes/navbar.php');
?>




<section class="portafolio">
        <h2>Últimas noticias relacionadas</h2>
        <p>
            Toma una vista de algo de nuestras memorables obras
        </p>
        <ul class="cartas" >
            <?php

                if(isset($_GET['nombre'])){
                    
                    $slug = mysqli_real_escape_string($conn, $_GET['nombre']);

                    $category = "SELECT id,slug FROM categorias WHERE slug='$slug' AND status = '0' LIMIT 1";
                    $category_run = mysqli_query($conn, $category);

                    if(mysqli_num_rows($category_run) > 0){

                        $categoryItem = mysqli_fetch_array($category_run);
                        $category_id = $categoryItem['id'];

                        $posts = "SELECT id_categoria, nombre_producto, slug, imagen, descripcion, precio_unitario, autor FROM productos WHERE id_categoria='$category_id' AND stock!='0' ";
                        $posts_run = mysqli_query($conn, $posts);

                        if (mysqli_num_rows($posts_run) > 0) {
                            
                            foreach ($posts_run as $postItems) {

                                ?>
                        <!-- <a href="<?= base_url('productos/'.$postItems['slug']); ?>" class="text-decoration-none"> -->
                        <li class="carta" >
                                <?php

                                    if($postItems['imagen'] != null):
                                        ?>
                                            <img src="<?= base_url('uploads/posts/'.$postItems['imagen']);?>" alt="<?=$postItem['nombre_producto'];?>" style="width:100%">
                                <?php endif; ?>

                                <h3><?=$postItems['nombre_producto'];?></h3>
                                <p>
                                    Precio: <?= $postItems['precio_unitario']; ?><br/><p></p>
                                    Diseñado por: <?= $postItems['autor']; ?> <br/><p></p>
                                    <p></p>
                                     <a href="<?= base_url('productos/'.$postItems['slug']); ?>" class="btn btn-primary">Leer más</a>
                                     <!--<a href="<?= base_url('productos/'.$postItems['slug']); ?>" class="btn btn-success">Comprar</a>-->
                                </p>
                            </li>
                        <!-- </a> -->
                                <?php



                            }

                        } else{

                            ?>
                                <h4>Posts no disponible</h4>
                            <?php

                        }

                    } else {
                        
                        ?>
                            <h4>No se encontró la categoria</h4>
                        <?php
   
                    }

                } else {
                    ?>
                        <h4>No se encontró la URL</h4>
                    <?php
                }

            ?>
            </div>
    </section>

<?php

    include('includes/footer.php');
?>