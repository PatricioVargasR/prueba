<header>
    <nav>
        <div class="nav-wrapper white static">
            <a href="#" class="brand-logo">
                <img src="<?= base_url('assets/img/LOGO.png'); ?>" alt="" style="width: 250px; height: 60px;">
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="<?= base_url('index.php'); ?>" style="color:black; text-decoration: none;cursor: pointer;">Inicio</a></li>
                <li><a href="<?= base_url('categorias.php'); ?>" style="color:black; text-decoration: none;cursor: pointer;">Categorias</a></li>
                <li><a href="<?= base_url('productos_all.php'); ?>" style="color:black; text-decoration: none;cursor: pointer;">Productos</a></li>
                <li><a href="<?= base_url('buscar.php'); ?>" style="color:black; text-decoration: none;cursor: pointer;">Buscar</a></li>
                <li><a href="<?= base_url('acerca.php'); ?>" style="color:black; text-decoration: none;cursor: pointer;">Nosotros</a></li>
                <?php if(isset($_SESSION['auth_user'])): ?>
                    <li class="green">
                        <span id="username-link" style="color:black; text-decoration: none; cursor: pointer; padding-right: 30px; text-align:center"><?= $_SESSION['auth_user']['user_name']; ?></span>
                        <form id="logout-form" action="<?= base_url('allcode.php'); ?>" method="post" style="margin: 0; display: none;">
                            <button type="submit" name="logout_btn" style="background: none; border: none; cursor: pointer; color: black; text-decoration: underline;">Cerrar Sesión</button>
                        </form>
                    </li>
                    <script>
                        document.getElementById('username-link').addEventListener('click', function () {
                            document.getElementById('logout-form').style.display = 'block';
                        });
                    </script>
                <?php else : ?>
                    <li class="green"><a href="register.php" style="text-decoration: none;cursor: pointer;">Registrate</a></li>
                    <li class="grey">
                    <a href="login.php" style="text-decoration: none;cursor: pointer;">
                        <img src="assets/img/USUARIO.png" alt="Icono de inicio de sesión" style="width: 24px; height: 24px; margin-right: 8px">
                        Iniciar Sesión
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>
