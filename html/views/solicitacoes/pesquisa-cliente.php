<?php /** @var TYPE_NAME $clientes */?>
<!DOCTYPE html>
<html>
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

    <!-- Busca -->
    <section class="container-search py-1">
        <div class="heading">
            <div class="container-fluid">
                <div class="row">

                    <div class="nav d-flex align-items-sm-center">
                        <h3 class="text-left display-7">Selecione o cliente</h3>
                    </div>

                    <div class="card">

                        <form id="form-pesquisa" >
                            <?=csrf()?>
                            <div class="row p-2">
                                <div class="col-12 col-md-4 p-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control ds-input" name="nome" id="nome" value="<?=$nome?>" placeholder="Nome" aria-label="Pesquisar por..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 p-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control ds-input" name="cnpj" id="cnpj" value="<?=$cnpj?>" placeholder="CNPJ" aria-label="Pesquisar por..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 p-2">
                                    <div class="form-group">
                                        <input type="email" class="form-control ds-input" name="email" id="email" value="<?=$email?>" placeholder="Email" aria-label="Pesquisar por..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 p-2 d-flex justify-content-end">
                                    <div>
                                        <button class="btn my-2 my-sm-0"><i class="fa fa-search" aria-hidden="true">&nbsp; </i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Busca  -->
    <!-- Tabela -->
    <section class="container-data-table py-1">
        <div class="heading">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <!-- Menu -->
                                <div class="d-flex justify-content-end">

                                    <!-- NO OPTIONS -->

                                </div><!-- /Menu -->
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table id="tb-clientes" class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th class="w-10 p-3" scope="col"></th>
                                    <th class="w-25 p-3" scope="col">Cliente</th>
                                    <th class="w-25 p-3" scope="col">CNPJ</th>
                                    <th class="w-25 p-3" scope="col">Responsável</th>
                                    <th class="w-25 p-3" scope="col">Telefone</th>
                                    <th class="w-25 p-3" scope="col">Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($clientes as $c):?>
                                    <tr key="<?=$c->getId()?>">
                                        <td class="text-sm-left p-3"><a href="#"><i class="fa fa-ellipsis-v"></i></a></td>
                                        <td class="text-sm-left p-3"><?=$c->getNome()?></td>
                                        <td class="text-sm-left p-3"><?=$c->getCnpj()?></td>
                                        <td class="text-sm-left p-3"><?=$c->getResponsavel()?></td>
                                        <td class="text-sm-left p-3"><?=$c->getTelefone()?></td>
                                        <td class="text-sm-left p-3"><?=$c->getEmail()?></td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Tabela  -->


    <!--  JQuery file     -->
    <script src="/public/js/jquery-3.6.1.min.js"></script>

    <!-- bootstrap min js -->
    <script src="/public/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/eaf468bfde.js" crossorigin="anonymous"></script>

    <?php scripts([
        [
            "src" => "/public/solicitacoes/js/pesquisa-cliente.js",
            "id" => "script-pesquisa",
            "encdata" => b64JsonEncode([
                "uri" => "/api/clientes",
                "err001" => sys_messages(MSG_CLI_ERR_A001),
                "err002" => sys_messages(MSG_ENT_ERR_A002)
            ]) ]
    ])();?>
</body>
</html>