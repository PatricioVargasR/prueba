<?php   
    include('includes/config.php');

    $page_title = "Página de compra";


    include('includes/header.php');
    include('includes/navbar.php')
?>


<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card-body">
                    <center>
                    <h2>Exito de compra</h2>
                    <h4>Espera indicaciones más adelante</h4>
                    <br>
                    <a href="<?= base_url('index.php'); ?>" class="btn btn-primary">Regresar</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<?php
    include('includes/footer.php');
?>