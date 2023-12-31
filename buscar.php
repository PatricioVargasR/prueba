<?php
include('includes/config.php');
$page_title = "Página de Buscar";
include('includes/navbar.php');
include('includes/header.php');
?>

<style>
    .paginainicio {
        /**background-image: url("assets/img/65054.jpg"); **/
    }

    .carta {
        max-width: 300px;
        margin: 0 auto;
        text-align: center;
    }

    .carta img {
        width: 100%;
        height: auto;
        margin-bottom: 10px;
    }
</style>

<section class="paginainicio" id="inicio">
    <div class="contenido">
        <div class="texto">
            <center>
                <h1>Tierra Tejida</h1>
                <p>
                    <!-- Search form -->
                    <form action="<?= base_url('/buscar.php'); ?>" method="GET">
                        <div class="md-form mt-0">
                            <input class="form-control" type="text" name="query" placeholder="Buscar" aria-label="Search">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                </p>
            </center>
        </div>
    </div>
</section>

<section class="portafolio">
    <h3>Resultados de la búsqueda</h3>
    <div class="underline"></div>

    <?php
    // Verificar si se ha enviado una consulta de búsqueda
    if (isset($_GET['query'])) {
        $search_query = $_GET['query'];
        $searchPosts = "SELECT * FROM productos WHERE nombre_producto = '$search_query' AND stock != '0' ORDER BY id_productos DESC";
        $searchPosts_run = mysqli_query($conn, $searchPosts);

        if (mysqli_num_rows($searchPosts_run) > 0) {
            foreach ($searchPosts_run as $postItem) {
    ?>
                <div class="carta">
                    <?php if ($postItem['imagen'] != null) : ?>
                        <img src="<?= base_url('uploads/posts/' . $postItem['imagen']); ?>" alt="<?= $postItem['nombre_producto']; ?>">
                    <?php endif; ?>
                    <h3><?= $postItem['nombre_producto']; ?></h3>
                    <p><?= $postItem['descripcion']; ?></p>
                    <a href="<?= base_url('productos/' . $postItem['slug']); ?>" class="btn btn-primary">Leer más</a>
                </div>
    <?php
            }
        } else {
            echo "<p>No se encontraron resultados para '$search_query'.</p>";
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
