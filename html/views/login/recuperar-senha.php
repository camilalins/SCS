<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Controle de Solicitações ">
    <!-- fav icon -->
    <link rel="icon" href="/favicon.ico">

    <!-- bootstrap css file -->
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="/public/css/bootstrap-icons/bootstrap-icons.css">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">

    <!-- main css file -->
    <link rel="stylesheet" href="/public/css/style.css">

    <!-- global css file -->
    <link rel="stylesheet" href="/public/css/global.css">

    <!-- page css file -->
    <link rel="stylesheet" href="/public/login/css/recuperar-senha.css">

    <title>SCS - Recuperar senha</title>

</head>
<body class="home-1 vsc-initialized" data-aos-easing="fade-up" data-aos-duration="500" data-aos-delay="0" cz-shortcut-listen="true">
<div class="auth">
    <div class="container">
        <div class="row align-items-center g-4 justify-content-between">
            <div class="col-lg-6 col-12">
                <img src="/public/login/img/SIOP.jpg" alt="signup">
            </div>
            <div class="col-lg-5  mb-4 col-12 d-flex flex-column justify-content-start">
                <div class="img-login" style="width: 100%; text-align: center; padding: 10px;">
                    <img style="width: 265px;" src="/public/img/logo-gray.png" alt="Sistema de Cadastro de Cliente">
                </div>
                <br>
                <form id="form-recup" action="/recuperar-senha" method="post">
                    <?=csrf()?>
                    <p>Digite o email cadastrado para recuperar a senha.</p>
                    <div id="message"></div>

                    <input type="email" placeholder="Email" name="email" id="email" class="box col-12">

                    <p><a id="btn-esqueceu" href="/login" class="unique-text">Voltar para o login</a></p>
                    <div class="recuperar">
                        <button id="btn-recuperar" class="btn mt-1">Recuperar</button>
                        <div class="loading-spinner" id="loading-spinner"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php scripts([
        [
            "src" => "/public/login/js/recuperar-senha.js",
            "id" => "script-recup",
            "encdata" =>
                b64JsonEncode([
                    "uri" => "api/recuperar-senha",
                    "err001" => sys_messages(MSG_VALID_ERR_A001)
                ])
        ]
])();?>
