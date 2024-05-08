<?php /** @var TYPE_NAME $title */?>
<?php /** @var TYPE_NAME $page */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Controle de Solicitações ">
    <!-- fav icon -->
    <link rel="icon" href="/public/img/icon.ico">
    <script src="https://kit.fontawesome.com/eaf468bfde.js" crossorigin="anonymous"></script>

    <!-- bootstarp css file -->
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- aos.css file -->
    <link rel="stylesheet" href="/public/css/aos.css">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="/public/css/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/css/bootstrap-icons(1).css">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">

    <!-- main css file -->
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/global.css">

    <title><?=$title?:MAIN_PAGE_TITLE?></title>
</head>
<body class="home-1 vsc-initialized" data-aos-easing="fade-up" data-aos-duration="500" data-aos-delay="0" cz-shortcut-listen="true">
    <div id="root">
        <!-- ======= start Header ======= -->
        <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand " href="#"><img style="width: 200px;" src="/public/img/logo-gray.png" alt="SCS"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list" id="menu"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">

                    <div class="d-flex ms-auto">
                        <a style="display: none" class="btn" href="#">Dashboard</a>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Meu Perfil
                            </a>
                            <div class="dropdown-menu dark-mode" aria-labelledby="dropdownMenuLink">

                                <div><i class="fa fa-user" aria-hidden="true"></i><?=session(USUARIO)->nome?></div>
                                <div><i class="fa fa-envelope" aria-hidden="true"></i><?=session(USUARIO)->email?></div>
                                <div>
                                    <?php if(session(USUARIO)):?>
                                        <button  style="border: none;" onclick="window.open('/encerrar-sessao', '_self')"><i class="fa fa-sign-out" aria-hidden="true"></i>Sair</button>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                        <button id="mode-toggle" class="btn-light-mode switch-button"><i class="fa-solid fa-circle-half-stroke"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
        <!-- ======= end Header ======= -->
        <div class="content">
            <?php include $page;?>
        </div>
        <div class="footer">
        </div>
    </div>
</body>

