<?php /** @var TYPE_NAME $erro */?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SCS - Sistema de Controle de Solicitações">
    <!-- fav icon -->
    <link rel="icon" href="/public/img/icon.ico">

    <!-- bootstarp css file -->
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="/public/css/bootstrap-icons/bootstrap-icons.css">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">

    <!-- main css file -->
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/global.css">
    <title> <?=MAIN_PAGE_TITLE?> - Cadastro Cliente </title>
</head>

<body class="home-1 vsc-initialized" data-aos-easing="fade-up" data-aos-duration="500" data-aos-delay="0" cz-shortcut-listen="true">

    <div class="container">
        <form id="form-cadastro">
            <?=csrf()?>
            <div class="row">
                <div class="col-12 col-md-6 p-2">
                    <label for="nomeCliente">Nome</label>
                    <input type="text" class="form-control" id="nomeCliente" name="nome" required>
                </div>
                <div class="col-12 col-md-6 p-2">
                    <label for="cnpjCliente">CNPJ</label>
                    <input type="text" class="form-control" id="cnpjCliente" name="cnpj" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 p-2">
                    <label for="responsavelCliente">Responsável</label>
                    <input type="text" class="form-control" id="responsavelCliente" name="responsavel">
                </div>
                <div class="col-12 col-md-3 p-2">
                    <label for="emailCliente">Email</label>
                    <input type="email" class="form-control" id="emailCliente" name="email">
                </div>
                <div class="col-12 col-md-3 p-2">
                    <label for="telefoneCliente">Telefone</label>
                    <input type="text" class="form-control" id="telefoneCliente" name="telefone">
                </div>
            </div>
            <div class="col-12 col-md-3 p-2 d-flex justify-content-end w-100">
                <button type="submit" class="btn my-2 my-sm-0">Salvar</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php scripts([
    ["src" => "/public/clientes/js/cadastro.js", "id" => "script-cadastro", "encdata" => b64JsonEncode([ "uri" => "/api/clientes" ]) ]
]);?>
