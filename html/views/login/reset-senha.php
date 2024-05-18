<?php /** @var TYPE_NAME $erro */?>
<?php /** @var TYPE_NAME $mensagem */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Controle de Solicitações ">
    <!-- fav icon -->
    <link rel="icon" href="/public/img/icon.ico">

    <!-- bootstrap css file -->
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="/public/css/bootstrap-icons/bootstrap-icons.css">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">

    <!-- main css file -->
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/global.css">

    <title>Sistema de Controle de Solicitações - Reset de senha</title>

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
                <form id="recover-form" action="/recuperar-senha" method="post">
                    <p>Digite sua senha.</p>
                    <div class="<?=$erro?"error":"success"?>"><?=$erro?:$mensagem?></div>

                    <input type="password" placeholder="Digite sua Senha" name="senha" class="box col-12">
                    <input type="password" placeholder="Repita sua Senha" name="senha" class="box col-12">

                    <p><a id="btn-esqueceu" href="/" class="unique-text">Voltar para o login</a></p>
                    <button type="submit" id="btn-entrar" class="btn mt-1">Salvar</button>
                    <div class="loading-spinner" id="loading-spinner"></div>
                </form>
            </div>
        </div>
    </div>


    <div class="container">
        <h2>Redefinir Senha</h2>
        <?php if (isset($erro)): ?>
            <div class="error"><?=$erro?></div>
        <?php elseif (isset($mensagem)): ?>
            <div class="success"><?=$mensagem?></div>
        <?php endif; ?>
        <form id="reset-password-form" action="/reset-password" method="post">
            <input type="hidden" name="token" value="<?=htmlspecialchars($token)?>">
            <div>
                <label for="password">Nova Senha:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="confirm-password">Confirme a Nova Senha:</label>
                <input type="password" name="confirm-password" id="confirm-password" required>
            </div>
            <button type="submit">Redefinir Senha</button>
        </form>
    </div>






</div>

</body>