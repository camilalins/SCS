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
    <!--        <script src="https://kit.fontawesome.com/eaf468bfde.js" crossorigin="anonymous"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstarp css file -->
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- aos.css file -->
    <link rel="stylesheet" href="/public/css/aos.css">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="/public/css/bootstrap-icons.css">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">

    <!-- main css file -->
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/global.css">
    <title><?php echo title()?></title>
</head>

<body class="home-1 vsc-initialized" data-aos-easing="fade-up" data-aos-duration="500" data-aos-delay="0" cz-shortcut-listen="true">

        <!-- Header -->
        <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand " href="<?=HOME_PAGE?>"><img style="width: 200px;" src="/public/img/logo-gray.png" alt="SCS"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list" id="menu"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">

                    <div class="d-flex ms-auto">
                        <?php if(user()):?>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Meu Perfil
                            </a>
                            <div class="dropdown-menu dark-mode" aria-labelledby="dropdownMenuLink">

                                <div><i class="fa fa-user" aria-hidden="true"></i><?=user()->nome?></div>
                                <div><i class="fa fa-envelope" aria-hidden="true"></i><?=user()->email?></div>
                                <div>
                                    <button  style="border: none;" onclick="window.open('/logout', '_self')"><i class="fa fa-sign-out" aria-hidden="true"></i>Sair</button>
                                </div>
                            </div>
                        </div>
                        <?php endif;?>
                        <button id="mode-toggle" class="btn-light-mode switch-button"><i class="fa-solid fa-circle-half-stroke"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
        <!-- ./Header -->

        <div class="content">
            <?php include page();?>
        </div>

        <!--  JQuery file     -->
        <script src="/public/js/jquery-3.6.1.min.js"></script>

        <!-- bootstrap min js -->
        <script src="/public/js/bootstrap.min.js"></script>

        <!--  owl carousel    -->
        <script src="/public/js/owl.carousel.min.js"></script>

        <!-- aos file    -->
        <script src="/public/js/aos.js"></script>

        <!-- gsap file    -->
        <script src="/public/js/gsap.min.js"></script>

        <!--  main js file TODO: CAUSANDO PROBLEMA NOS POSTS DAS PÁGINAS -->
        <script src="/public/js/main.js"></script>

        <!-- Inclua o Bootstrap JS (opcional, mas necessário para alguns componentes interativos) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!--        <script src="https://kit.fontawesome.com/a076d05399.js"></script>-->

        <?php scripts();?>
</body>
</html>
