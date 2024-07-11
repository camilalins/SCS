<?php /** @var TYPE_NAME $cliente */?>
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
    <title> <?=MAIN_PAGE_TITLE?> - Cadastro Cliente </title>
</head>

<body class="home-1 vsc-initialized" data-aos-easing="fade-up" data-aos-duration="500" data-aos-delay="0" cz-shortcut-listen="true">

    <section class="container-search py-1">
        <div class="heading">
            <div class="container-fluid">
                <div class="row">


                    <div class="nav d-flex align-items-sm-center mb-3">
                        <a class="navbar-brand" href="/solicitacoes/selecionar">
                            <i class="fa fa-angle-left fs-3" aria-hidden="true"></i>
                        </a>
                        <h3 class="text-left display-7 ms-3"><?=$cliente->getNome()?></h3>
                    </div>

                    <form id="form-cadastro">
                        <?=csrf()?>
                        <div class="alert alert-danger alert-dismissible fixed-top m-2 mt-0" role="alert" style="display: none">
                            <span>&nbsp;</span>
                            <button type="button" class="btn-close" aria-label="Close"></button>
                        </div>

                        <input type="hidden" id="clienteId" name="clienteId" value="<?=$cliente->getId()?>">

                        <!--<div class="row">
                            <div class="col-md-2 p-2">
                                <label for="data">Data</label>
                                <input type="date" class="form-control" id="data" name="data" required>
                            </div>
                            <div class="col-md-2 p-2">
                                <label for="placa">Placa</label>
                                <input type="text" class="form-control" id="placa" name="placa">
                            </div>
                        </div>-->



                        <div class="row">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">Dados Solicitação</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">Transportadora</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="false">ABA 3</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab" aria-controls="tab4" aria-selected="false">Operacional</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab5-tab" data-bs-toggle="tab" data-bs-target="#tab5" type="button" role="tab" aria-controls="tab5" aria-selected="false">ABA 5</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab6-tab" data-bs-toggle="tab" data-bs-target="#tab6" type="button" role="tab" aria-controls="tab6" aria-selected="false">Status</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                    <div class="row">
                                        <div class="col-md-6 p-2">
                                            <div class="form-group">
                                                <label for="data" class="form-label">Data</label>
                                                <input type="date" class="form-control" id="data" name="data" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 p-2">
                                            <div class="form-group">
                                                <label for="horasolicitacao" class="form-label">Hora Solicitação</label>
                                                <input type="time" class="form-control" id="horasolicitacao" name="horasolicitacao">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 p-2">
                                            <div class="form-group">
                                                <label for="chegadaagente" class="form-label">Chegada do Agente</label>
                                                <input type="time" class="form-control" id="chegadaagente" name="chegadaagente">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 p-2">
                                            <div class="form-group">
                                                <label for="inicioatendimento" class="form-label">Início Atendimento</label>
                                                <input type="time" class="form-control" id="inicioatendimento" name="inicioatendimento">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 p-2">
                                            <div class="form-group">
                                                <label for="espera" class="form-label">Tempo de Espera</label>
                                                <input type="text" class="form-control" id="espera" name="espera">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                    <div class="row">
                                        <div class="col-md-3 p-2">
                                            <label for="placa">Placa</label>
                                            <input type="text" class="form-control" id="placa" name="placa">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                                    Conteúdo da ABA 3
                                </div>
                                <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                                    <div class="row">
                                        <div class="col-md-3 p-2">
                                            <label for="operacao" class="form-label">Tipo de Operação</label>
                                            <select class="form-select" id="operacao" name="operacao">
                                                <option value="">Selecione...</option>
                                                <option value="Escolta">Escolta</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab5-tab">
                                    Conteúdo da ABA 5
                                </div>
                                <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="tab6-tab">
                                    <div class="row">
                                        <div class="col-md-3 p-2">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select" id="status" name="status">
                                                <option value="">Selecione...</option>
                                                <option value="Aguardando">Aguardando</option>
                                                <option value="Finalizado">Finalizado</option>
                                                <option value="Cancelado">Cancelado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if(query("modal")):?>
                            <div class="col-12 col-md-3 p-2 d-flex justify-content-end w-100">
                                <button type="submit" class="btn my-2 my-sm-0">Salvar</button>
                            </div>
                        <?php endif;?>
                    </form>

                </div>

            </div>
        </div>
    </section>

    <!--  JQuery file     -->
    <script src="/public/js/jquery-3.6.1.min.js"></script>

    <!-- bootstrap min js -->
    <script src="/public/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/eaf468bfde.js" crossorigin="anonymous"></script>

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
