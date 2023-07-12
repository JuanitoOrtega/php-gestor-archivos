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
    <!-- datatables -->
    <link href="<?=BASE_URL?>Assets/plugins/DataTables/datatables.min.css" rel="stylesheet">
    <!-- select2 -->
    <link href="<?=BASE_URL?>Assets/plugins/select2/select2.min.css" rel="stylesheet">
    
    <!-- Theme Styles -->
    <link href="<?=BASE_URL?>Assets/css/main.min.css" rel="stylesheet">
    <link href="<?=BASE_URL?>Assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="<?=BASE_URL?>Assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?=BASE_URL?>Assets/images/neptune.png" />
</head>
<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar">
            <div class="logo">
                <a href="<?=BASE_URL?>admin" class="logo-icon"><span class="logo-text">Gestión</span></a>
                <div class="sidebar-user-switcher user-activity-online">
                    <a href="#">
                        <img src="<?=BASE_URL?>Assets/images/avatars/avatar3.jpg">
                        <span class="activity-indicator"></span>
                        <span class="user-info-text"><?=$_SESSION['nombre_completo']?><br><span class="user-state-info">Conectado</span></span>
                    </a>
                </div>
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Buscar..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <?php include 'navbar.php'; ?>