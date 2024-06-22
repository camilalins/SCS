<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SCS | Sistema de Controle de Solicitações ">
    <!-- fav icon -->
    <link rel="icon" href="/favicon.ico">

    <!-- bootstarp css file -->
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">

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

    <title> <?php echo title()?> </title>
</head>
<body class="home-1 vsc-initialized" data-aos-easing="fade-up" data-aos-duration="500" data-aos-delay="0" cz-shortcut-listen="true">

    <!-- Header -->
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand " href="<?=HOME_PAGE?>"><img src="/public/img/logo-gray.png" class="logo" alt="Sistema de Controle de Solicitações "></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list" id="menu"></i>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <div class="d-flex ms-auto">
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
                            </div>
                        </div>
                        <button id="mode-toggle" class="btn-light-mode switch-button"><i id="mode-icon" class="bi bi-moon-fill"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- /Header -->

    <!-- Content -->
    <div class="content">
        <?php include page();?>
    </div>
    <!-- /Content -->

    <!-- Modal -->
    <div id="modal" class="modal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">&nbsp;</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="/204" frameborder="0" scrolling="no" width="100%" height="430px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- /Modal -->


    <!--  JQuery file     -->
    <script src="/public/js/jquery-3.6.1.min.js"></script>

    <!-- bootstrap min js -->
    <script src="/public/js/bootstrap.min.js"></script>

    <!--  toasts file     -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!--  owl carousel    -->
    <script src="/public/js/owl.carousel.min.js"></script>

    <!-- aos file    -->
    <script src="/public/js/aos.js"></script>

    <!-- gsap file    -->
    <script src="/public/js/gsap.min.js"></script>

    <!--  counter     -->
    <script src="/public/js/jquery.counterup.min.js"></script>
    <script src="/public/js/jquery.waypoints.js"></script>

    <!-- jquery isotope file -->
    <script src="/public/js/isotope.min.js"></script>

    <!-- jquery fancybox file -->
    <script src="/public/js/jquery.fancybox.min.js"></script>

    <!--  main js file -->
    <script src="/public/js/main.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/eaf468bfde.js" crossorigin="anonymous"></script>

    <!--  Modal Script  -->
    <script src="/public/modal/js/modal.js"></script>


    <?php scripts();?>
</body>