<?php /** @var TYPE_NAME $erro */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Controle de Solicitações ">
    <!-- fav icon -->
    <link rel="icon" href="/public/img/icon.ico">

    <!-- bootstarp css file -->
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="/public/css/bootstrap-icons.css">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">

    <!-- main css file -->
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/global.css">

    <title>Sistema de Controle de Solicitações - Login </title>
</head>

<body class="home-1 vsc-initialized" data-aos-easing="fade-up" data-aos-duration="500" data-aos-delay="0" cz-shortcut-listen="true">
    <div class="auth">
        <div class="container">
            <div class="row align-items-center g-4 justify-content-between">
                <div class="col-lg-6 col-12">
                    <img src="/public/login/img/SIOP.jpg" alt="singup">
                </div>
                <div class="col-lg-5  mb-4 col-12 d-flex flex-column justify-content-start">
                    <div class="img-login" style="width: 100%; text-align: center; padding: 10px;">
                        <img style="width: 265px;" src="/public/img/logo-gray.png" alt="Sistema de Cadastro de Cliente">
                    </div>

                    <form action="/efetuar-login" method="post">

                        <div class="error"><?=$erro?></div>

                        <input type="email" placeholder="Email" name="email" class="box col-12">
                        <input type="password" placeholder="Senha" name="senha" class="box col-12">

                        <p>Esqueceu sua senha? <a id="btn-esqueceu" href="/recuperar-senha" class="unique-text">Recuperar Senha</a></p>
                        <button id="btn-entrar" class="btn mt-1">entrar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>







