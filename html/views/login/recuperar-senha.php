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

    <title>Sistema de Controle de Solicitações - Recuperar senha</title>
    <style>
        .loading-spinner {
            display: none;
            margin-left: 10px;
            width: 20px;
            height: 20px;
            border: 2px solid #f3f3f3;
            border-radius: 50%;
            border-top: 2px solid #3498db;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

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
                    <p>Digite o email cadastrado para recuperar a senha.</p>
                    <div class="<?=$erro?"error":"success"?>"><?=$erro?:$mensagem?></div>

                    <input type="email" placeholder="Email" name="email" id="email" class="box col-12">

                    <p><a id="btn-esqueceu" href="/" class="unique-text">Voltar para o login</a></p>
                    <button type="submit" id="btn-entrar" class="btn mt-1">Recuperar</button>
                    <div class="loading-spinner" id="loading-spinner"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    const btnEntrar = document.getElementById('btn-entrar');
    const loadingSpinner = document.getElementById('loading-spinner');
    const messageDiv = document.querySelector('.error, .success');

    self.addEventListener("submit0", (event) => {

        event.preventDefault();
        const form = event.target;

        loader(true);

        fetch(form.action, {
            method: form.method,
            body: new FormData(form),
        })
        .then(res => res.json())
        .then(data => { if(data.error) throw Error(); done('success', data.message) })
        .catch(() => done('error', 'Ocorreu um erro. Tente novamente mais tarde.'));
    });

    function done(className, message) {

        if(className=="error") console.error(message);

        loader(false);

        messageDiv.className = className;
        messageDiv.textContent = message;
    }
    function loader(start){

        btnEntrar.disabled = start;
        loadingSpinner.style.display = start ? 'inline-block' : 'none';
    }
</script>
</body>