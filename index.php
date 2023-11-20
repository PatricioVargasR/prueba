<?php

    include('includes/config.php');

    
    $page_title = "Página de Inicio";

    #include('includes/navbar.php');
    include('includes/header.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url('assets/img/LOGO_V.jpg'); ?>">
    <title>Tierras Tejidas</title>

</head>

<body>
    
    <header>
        <nav>
            <div class="nav-wrapper white static">
              <a href="#" class="brand-logo">
                <img src="assets/img/LOGO.png" alt="" style="width: 250px; height: 60px;">
              </a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li cl><a href="index.php" style="color:black;">Inicio</a></li>
                <li cl><a href="categorias.php" style="color:black;">Categorias</a></li>
                <li cl><a href="productos_all.php" style="color:black;">Productos</a></li>
                <li cl><a href="buscar.php" style="color:black;">Buscar</a></li>
                <li cl><a href="acerca.php" style="color:black;">Nosotros</a></li>

                <?php if(isset($_SESSION['auth_user'])): ?>
                    <li><a href="<?= base_url('ver_carrito.php'); ?>" style="color:black; text-decoration: none;cursor: pointer;"><img src="assets/img/CARRITO.png" alt="Icono de carrito" style="width: 45px; height: 56px; margin-top: 50x"></a></li>
                    <li class="green">
                        <span id="username-link" style="color: black; text-decoration: none; cursor: pointer; padding-right: 40px; display: block; text-align: center;"><?= $_SESSION['auth_user']['user_name']; ?></span>
                        <form id="logout-form" action="<?= base_url('allcode.php'); ?>" method="post" style="margin: 0; display: none;">
                            <button type="submit" name="logout_btn" style="background: none; border: none; cursor: pointer; color: black; text-decoration: underline;">Cerrar Sesión</button>
                        </form>
                    </li>

                    <script>
                        var logoutForm = document.getElementById('logout-form');
                        var usernameLink = document.getElementById('username-link');

                        usernameLink.addEventListener('click', function () {
                            if (logoutForm.style.display === 'block') {
                                logoutForm.style.display = 'none';
                            } else {
                                logoutForm.style.display = 'block';
                            }
                        });
                    </script>
                <?php else : ?>
                <li class="green"><a href="register.php" style="text-decoration: none;cursor: pointer;">Registrate</a></li>
                <li class="grey">
                    <a href="login.php">
                        <img src="assets/img/USUARIO.png" alt="Icono de inicio de sesión" style="width: 24px; height: 24px; margin-right: 8px">
                        Iniciar Sesión
                    </a>
                </li>


                <?php endif; ?>

              </ul>
            </div>
          </nav>
    </header>
    
    <main>
        <img src="assets/img/Promo 1.png" alt="" style="width: 100%; height: 540px;">

        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <div class="container row">
            <div class="col l6">
                <h2 class="orange-text" style="font-weight: bold;">¿Quiénes Somos?</h2>
                <p style="font-weight: bold; font-size: large;">El arte del bordado tiene sus raíces en el estado de Hidalgo, específicamente en la región de Tenango de Doria. Este estilo de bordado tiene sus orígenes en la tradición Otomí y sus patrones honran la identidad de su comunidad, capturando aspectos importantes de su herencia cultural y visión del mundo ancestral.
                    San Nicolás es una localidad otomí-tepehua situada a 8 kilómetros de Tenango de Doria, en las montañas de Hidalgo. Es reconocida como "la cuna de la artesanía del bordado", ya que una gran parte de su gente se dedica a crear los distintivos tenangos, originarios de la zona. "Tenango" tiene raíces en el náhuatl y significa "lugar de murallas".
                    </p>
    
            </div>
            

            
            <div class="col l6 center" style="align-items: center; padding-top: 2cm;">
                <img src="assets/img/tenango.jpeg" alt="Descripción de la imagen" width="350" height="350">
            </div>


            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />



        </div>
        <div class="col l12 center">

        </div>

        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <video autoplay loop class="miVideo" style="width: 100%; height: 700px;">
            <source src="assets/video/COMERCIAL.mp4" type="video/mp4">
        </video>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />

        <div class="col l12 center">
            <h2 class="orange-text" style="font-weight: bold;">¿Qué tecnicas usamos?</h2>
        </div>

        <div class="row">

            <div class="col s4 center">
                <img src="assets/img/puntocruz.png" alt="" style="width: 250px; height: 250px; border-radius: 50%">
                <h5 class="orange-text" style="font-weight: bold;">Punto de Cruz</h2>
                <p style="text-align: center;">El punto de cruz permite una amplia gama de posibilidades creativas. Los diseños pueden variar desde simples motivos geométricos hasta elaborados paisajes o retratos. Además, esta técnica se adapta a diversos materiales y objetos, como prendas de vestir, accesorios, decoración para el hogar e incluso obras artísticas.</p>

            </div>
            <div class="col s4 center">
                <img src="assets/img/puntocadena.jpg" alt="" style="width: 250px; height: 250px; border-radius: 50%">
                <h5 class="orange-text" style="font-weight: bold;">Punto de Cadena</h2>
                <p>Puede adaptarse fácilmente a diferentes grosores de hilo, permitiendo variaciones en el tamaño y la apariencia de los bordados. Además, su versatilidad permite su combinación con otras técnicas para lograr efectos más complejos y enriquecer el diseño final.</p>
            </div>
            <div class="col s4 center">
                <img src="assets/img/puntotallo.jpg" alt="" style="width: 250px; height: 250px; border-radius: 50%">
                <h5 class="orange-text" style="font-weight: bold;">Punto de Tallo</h2>
                <p>Esta técnica es muy versátil y se utiliza comúnmente para crear contornos, líneas y detalles delicados en el bordado. La puntada se realiza con una serie de puntadas pequeñas y rectas que se superponen, siguiendo el contorno deseado. </p>
            </div>

          </div>
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />


    </main>


    <footer class="orange" >
    <div class="container">
        <div class="row center">

               <center><img src="assets/img/LOGO.png" alt="" style="width: 240px; height: 120px;"></center> 

        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col s4">
                    <p style="font-weight: bold;"align="left">Desarrollo de Negocios</p></left>
                </div>
                <div class="col s4">
                    <center><p style="font-weight: bold;">Ing. en Desarrollo de Software</p></center>
                </div>
                <div class="col s4">
                    <p style="font-weight: bold;" align="right">Diseño Digital</p>
                </div>
            </div>
        </div>
        <div class="container center">
            <div class="row">
                <div class="col s12">
                    © 2023 Copyright | Service developed by
                </div>
            </div>
        </div>
    </footer>

</body>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>