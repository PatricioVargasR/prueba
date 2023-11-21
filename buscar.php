<?php
include('includes/config.php');
$page_title = "Página de Buscar";
include('includes/header.php');
include('includes/navbar.php');

?>

<style>
    .paginainicio {
        /**background-image: url("assets/img/65054.jpg"); **/

    }


    .carta {
        max-width: 7000px;
        margin: 0 auto;
        text-align: center;
        margin-bottom: 60px; /* Ajusta el espacio entre las cartas */
    }

    .carta img {
        width: 100%;
        height: auto;
        margin-bottom: 20px;
    }

    .resultados-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
    }

</style>

<section class="paginainicio" id="inicio">
    <div class="contenido">
        <div class="texto">
            <br>
            <br>
            <br>
            <center>
                <h1>Tierra Tejida</h1>
                <p>
                    <!-- Search form -->
                    <form action="<?= base_url('/buscar.php'); ?>" method="GET">
                        <div class="md-form mt-0">

                            <input class="form-control" type="text" name="query" placeholder="Buscar " aria-label="Search">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                </p>
            </center>
        </div>
    </div>
    <br>
    <br>
    <br>

</section>

<section class="portafolio">
    <h3>Resultados de la búsqueda</h3><p></p><img src="assets/img/BUSCADOR.png" alt="Icono de contacto" style="width: 24px; height: 24px; margin-right: 8px"><br>
    <div class="underline"></div>


    <div class="resultados-container">
    <ul class="cartas">
        <?php
        // Verificar si se ha enviado una consulta de búsqueda
        if (isset($_GET['query'])) {
            $search_query = $_GET['query'];
            $searchPosts = "SELECT * FROM productos WHERE nombre_producto LIKE '%$search_query%' AND stock != '0' ORDER BY id_productos DESC";
            $searchPosts_run = mysqli_query($conn, $searchPosts);

            if (mysqli_num_rows($searchPosts_run) > 0) {
                foreach ($searchPosts_run as $postItem) {
        ?>
                    <li class="carta">
                        <?php if ($postItem['imagen'] != null) : ?>
                            <img src="<?= base_url('uploads/posts/' . $postItem['imagen']); ?>" alt="<?= $postItem['nombre_producto']; ?>">
                        <?php endif; ?>
                        <h3><?= $postItem['nombre_producto']; ?></h3>
                        <p>Precio <?= $postItem['precio_unitario']; ?></p>
                        <p>Diseñado por: <?= $postItem['autor']; ?></p>
                        <a href="<?= base_url('productos/' . $postItem['slug']); ?>" class="btn btn-primary">Leer más</a>
                        </li>
        <?php
                }
            } else {
                echo "<p>No se encontraron resultados para '$search_query'.</p>";
            }
        }
        ?>
        
    </div>
    </ul>
</section>

<br><br><br>

<?php
include('includes/footer.php');
?>
