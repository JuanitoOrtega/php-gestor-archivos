<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    
    <!-- Title -->
    <title>Gestión | <?=$data['title']?></title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="<?=BASE_URL?>Assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- jquery-confirm -->
    <link href="<?=BASE_URL?>Assets/plugins/jquery-confirm/jquery-confirm.min.css" rel="stylesheet">
    <link href="<?=BASE_URL?>Assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?=BASE_URL?>Assets/plugins/pace/pace.css" rel="stylesheet">
    
    <!-- Theme Styles -->
    <link href="<?=BASE_URL?>Assets/css/main.min.css" rel="stylesheet">
    <link href="<?=BASE_URL?>Assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="<?=BASE_URL?>Assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?=BASE_URL?>Assets/images/neptune.png" />
</head>
<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="index.html">Gestión</a>
            </div>
            <p class="auth-description">Inicia sesión con tu cuenta y continúa hasta tu panel principal. <br>¿No tienes una cuenta? <a href="sign-up.html">Registrate aquí</a></p>

            <form id="formLogin" method="post">
                <div class="auth-credentials m-b-xxl">
                    <label for="usuario" class="form-label">Usuario <span class="text-danger">*</span></label>
                    <input type="text" class="form-control m-b-md" id="usuario" name="usuario" placeholder="Ingresa tu nombre de usuario">
                    <label for="clave" class="form-label">Contraseña <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingresa tu contraseña">
                </div>
                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    <a href="#" class="auth-forgot-password float-end">¿Olvidaste tu contraseña?</a>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Javascripts -->
    <script src="<?=BASE_URL?>Assets/plugins/jquery/jquery-3.7.0.min.js"></script>
    <script src="<?=BASE_URL?>Assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jquery-confirm -->
    <script src="<?=BASE_URL?>Assets/plugins/jquery-confirm/jquery-confirm.min.js"></script>
    <script src="<?=BASE_URL?>Assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="<?=BASE_URL?>Assets/plugins/pace/pace.min.js"></script>
    <script src="<?=BASE_URL?>Assets/js/main.min.js"></script>
    <!-- sweetalert2 -->
    <script src="<?=BASE_URL?>Assets/plugins/sweetalert2/sweetalert2@11.js"></script>
    <script>
        const base_url = '<?=BASE_URL?>';
    </script>
    <!-- Custom JS -->
    <script src="<?=BASE_URL?>Assets/js/custom.js"></script>
    <?php if (!empty($data['script'])) { ?>
    <script src="<?=BASE_URL?>assets/js/modulos/<?=$data['script']?>"></script>
    <?php } ?>
</body>
</html>