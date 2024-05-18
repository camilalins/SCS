<?php /** @var TYPE_NAME $title */?>
<?php /** @var TYPE_NAME $page */?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="SCS - Sistema de Controle de Solicitações">
        <!-- fav icon -->
        <link rel="icon" href="/public/img/icon.ico">
        <script src="https://kit.fontawesome.com/eaf468bfde.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- bootstarp css file -->
        <link rel="stylesheet" href="/public/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">


        <!-- aos.css file -->
        <link rel="stylesheet" href="/public/css/aos.css">

        <!-- fancybox css file -->
        <link rel="stylesheet" href="/public/css/jquery.fancybox.min.css">

        <!-- owl carousel css file -->
        <link rel="stylesheet" href="/public/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/public/css/owl.theme.default.min.css">

        <!--  toasts file     -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

        <!-- bootstrap icons -->
        <link rel="stylesheet" href="/public/css/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <!-- Google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">

        <!-- main css file -->
        <link rel="stylesheet" href="/public/css/style.css">
        <link rel="stylesheet" href="/public/css/global.css">
        <title><?php echo title()?></title>
    </head>

    <body class="home-1 vsc-initialized" data-aos-easing="fade-up" data-aos-duration="500" data-aos-delay="0" cz-shortcut-listen="true">




    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand " href="<?=HOME_PAGE?>"><img style="width: 200px;" src="/public/img/logo-gray.png" alt="SCS"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list" id="menu"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">


                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <div class="d-flex ms-auto">
                        <?php if(user()): ?>
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Meu Perfil
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i> <?= user()->getNome() ?></a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-envelope" aria-hidden="true"></i> <?= user()->getEmail() ?></a></li>
                                    <li><button class="dropdown-item" style="border: none;" onclick="window.open('/logout', '_self')"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</button></li>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <button id="mode-toggle" class="btn-light-mode switch-button"><i class="fa-solid fa-circle-half-stroke"></i></button>
                    </div>
                </div>



















                <div class="d-flex ms-auto">
                    <?php if(user()):?>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Meu Perfil
                            </a>
                            <div class="dropdown-menu dark-mode" aria-labelledby="dropdownMenuLink">

                                <div><i class="fa fa-user" aria-hidden="true"></i><?=user()->getNome()?></div>
                                <div><i class="fa fa-envelope" aria-hidden="true"></i><?=user()->getEmail()?></div>
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

                                        <div><i class="fa fa-user" aria-hidden="true"></i><?=user()->getNome()?></div>
                                        <div><i class="fa fa-envelope" aria-hidden="true"></i><?=user()->getEmail()?></div>
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


        <!-- Bootstrap JS (necessário para funcionalidades como o dropdown) -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
        <!--  JQuery file     -->
        <script src="/public/js/jquery-3.6.1.min.js"></script>

        <!-- bootstrap min js -->
        <script src="/public/js/bootstrap.min.js"></script>

        <!--  toasts file     -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

        <!--  owl carousel    -->
        <script src="/public/js/owl.carousel.min.js"></script>

        <!-- aos file    -->
        <script src="/public/js/aos.js"></script>

        <!-- gsap file    -->
        <script src="/public/js/gsap.min.js"></script>

        <!--  counter     -->
        <script src="/public/js/jquery.counterup.min.js"></script>
        <script src="/public/js/jquery.waypoints.js"></script>

        <!-- particles js file  -->
        <script src="/public/js/particles.min.js"></script>

        <!-- jquery isotope file -->
        <script src="/public/js/isotope.min.js"></script>

        <!-- jquery fancybox file -->
        <script src="/public/js/jquery.fancybox.min.js"></script>

        <!--  main js file // TODO: Não está sendo utilizado
        <script src="/public/js/main.js"></script>-->

        <?php scripts();?>
    </body>
</html>
