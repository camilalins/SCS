<?php /** @var TYPE_NAME $modal */?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SCS - Sistema de Controle de Solicitações">
    <!-- fav icon -->
    <link rel="icon" href="/favicon.ico">

    <!-- bootstarp css file -->
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="/public/css/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">

    <!-- main css file -->
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/global.css">
    <title> <?=MAIN_PAGE_TITLE?> - Cadastro Solicitação </title>
</head>

<body class="home-1 vsc-initialized" data-aos-easing="fade-up" data-aos-duration="500" data-aos-delay="0" cz-shortcut-listen="true">

    <div class="container-fluid p-0">

    <form id="form-cadastro">
        <?=csrf()?>
        <div class="alert alert-danger alert-dismissible fixed-top m-2 mt-0" role="alert" style="display: none">
            <span>&nbsp;</span>
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
        <div class="row mt-2">
            <label for="cliente">Clientes</label>

            <select class="form-select" id="cliente" name="cliente" onchange="carregarFormulario()" required>
                <option value="">Selecione...</option>
                <option value="mondelez">Mondelez</option>
                <option value="troca">Troca</option>
                <option value="mobile">Mobile</option>
            </select>

            <div id="formulario"></div>
        </div>

        <?php if($modal):?>
            <div class="col-12 col-md-3 p-2 d-flex justify-content-end w-100">
                <button type="submit" class="btn my-2 my-sm-0">Salvar</button>
            </div>
        <?php endif;?>
    </form>

</div>

    <script src="/public/js/jquery-3.6.1.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>
    <script src="../../public/solicitacoes/js/formulario.js"></script>

</body>
</html>
<?php scripts([
    [
        "src" => "/public/solicitacoes/js/cadastro.js",
        "id" => "script-cadastro",
        "encdata" => b64JsonEncode([
            "uri" => "/api/solicitacoes",
            "errValid001" => sys_messages(MSG_VALID_ERR_A001),
            "errEnt001" => sys_messages(MSG_ENT_ERR_A001)
        ]) ]
])();?>




