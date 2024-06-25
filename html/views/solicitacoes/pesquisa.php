<?php /** @var TYPE_NAME $solicitacoes */?>
<?php /** @var TYPE_NAME $nome */?>
<?php /** @var TYPE_NAME $data */?>
<?php /** @var TYPE_NAME $placa */?>
<!-- Busca -->
<section class="container search py-1">
    <div class="heading">
        <div class="container-fluid">
            <div class="row">
                <div class="nav d-flex align-items-sm-center">
                    <a class="navbar-brand" href="<?=HOME_PAGE?>">
                        <i class="fa fa-angle-left fs-3" aria-hidden="true"></i>
                    </a>
                    <h3 class="text-left display-5 ms-3">Solicitações</h3>
                </div>
                <br>
                <br>
                <div class="card">

                    <form id="form-pesquisa" >
                        <?=csrf()?>
                        <div class="row p-2">
                            <div class="col-12 col-md-4 p-2">
                                <div class="form-group">
                                    <input type="text" class="form-control ds-input" name="cliente" id="nome" value="<?=$cliente?>" placeholder="Cliente" aria-label="Pesquisar por..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 p-2">
                                <div class="form-group">
                                    <input type="text" class="form-control ds-input" name="data" id="data" value="<?=$data?>" placeholder="Data" aria-label="Pesquisar por..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 p-2">
                                <div class="form-group">
                                    <input type="text" class="form-control ds-input" name="placa" id="placa" value="<?=$placa?>" placeholder="Placa" aria-label="Pesquisar por..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
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
<section class="container data-table py-1">
    <div class="heading">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <!-- Menu -->
                            <div class="d-flex justify-content-end">
                                <div class="" id="">
                                    <ul class="navbar-nav ml-auto d-flex flex-row align-items-sm-center" style="font-size: 20px;">
                                        <li class="nav-item" style="padding: 0px 0px 0px 1px;color: #06326d;">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal" data-bs-title="Cadastro de solicitações" data-bs-route="/solicitacoes/selecionar">
                                                <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                                            </button>
                                        </li>
                                    </ul>

                                </div>
                            </div><!-- /Menu -->
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table id="tb-solicitacoes" class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th class="w-10 p-3" scope="col"></th>
                                <th class="w-25 p-3" scope="col">Cliente</th>
                                <th class="w-25 p-3" scope="col">CNPJ</th>
                                <th class="w-25 p-3" scope="col">Data</th>
                                <th class="w-25 p-3" scope="col">Placa</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- FETCH DATA -->
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

<?php scripts([
    [
        "src" => "/public/solicitacoes/js/pesquisa.js",
        "id" => "script-pesquisa",
        "encdata" => b64JsonEncode([
            "uri" => "/api/solicitacoes"
        ]) ]
]);?>




<!-- Tabela -->
<section class="container why-choose-us py-1">
    <div class="heading">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <!-- Menu -->
                            <div class="d-flex justify-content-end">
                                <div class="" id="">
                                    <ul class="navbar-nav ml-auto d-flex flex-row align-items-sm-center" style="font-size: 20px;">
                                        <!--<li class="nav-item" style="padding: 0px;color: #06326d;">
                                            <a class="nav-link" href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                        </li>-->
                                        <li class="nav-item" style="padding: 0px 0px 0px 1px;color: #06326d;">
                                            <button type="button" class="open-modal btn my-2 my-sm-0" data-target="modal" onclick="openModalSolicitacoes()">
                                                <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                                            </button>
                                        </li>

                                    </ul>

                                </div>
                            </div><!-- /Menu -->
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>

                                <th class="w-10 p-3" scope="col">ID</th>
                                <th class="w-20 p-3" scope="col">Cliente</th>
                                <th class="w-20 p-3" scope="col">Data de Início</th>
                                <th class="w-20 p-3" scope="col">Tipo Operação</th>
                                <th class="w-20 p-3" scope="col">Origem</th>
                                <th class="w-20 p-3" scope="col">Destino</th>
                                <th class="w-20 p-3" scope="col">Status</th>
                                <th class="w-20 p-3" scope="col">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-sm-left p-3">183</td>
                                <td class="text-sm-left p-3">Mondelez</td>
                                <td class="text-sm-left p-3">11-7-2014</td>
                                <td class="text-sm-left p-3">Suporte Logístico 1</td>
                                <td class="text-sm-left p-3">Pedágio Seropédica</td>
                                <td class="text-sm-left p-3">Pedágio Magé</td>
                                <td class="text-sm-left p-3"><span class="bg-green">Finalizada</span></td>
                                <td class="text-sm-left p-3">
                                    <button class="action-view" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    <button class="action-edit" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                                    <button class="action-cancel" type="button"><i class="fa-solid fa-xmark"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm-left p-3">219</td>
                                <td class="text-sm-left p-3">Mondelez</td>
                                <td class="text-sm-left p-3">11-7-2014</td>
                                <td class="text-sm-left p-3">Suporte Logístico 2</td>
                                <td class="text-sm-left p-3">Pedágio Seropédica</td>
                                <td class="text-sm-left p-3">Pedágio Magé</td>
                                <td class="text-sm-left p-3"><span class="bg-red">Cancelada</span></td>
                                <td class="text-sm-left p-3">
                                    <button class="action-view" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    <button class="action-edit" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                                    <button class="action-cancel" type="button"><i class="fa-solid fa-xmark"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm-left p-3">657</td>
                                <td class="text-sm-left p-3">Mondelez</td>
                                <td class="text-sm-left p-3">19-5-2024</td>
                                <td class="text-sm-left p-3">Suporte Logístico 3</td>
                                <td class="text-sm-left p-3">Pedágio Seropédica</td>
                                <td class="text-sm-left p-3">Pedágio Magé</td>
                                <td class="text-sm-left p-3"><span class="bg-yellow">Aguardando</span></td>
                                <td class="text-sm-left p-3">
                                    <button class="action-view" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    <button class="action-edit" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                                    <button class="action-cancel" type="button"><i class="fa-solid fa-xmark"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm-left p-3">175</td>
                                <td class="text-sm-left p-3">Troca</td>
                                <td class="text-sm-left p-3">11-7-2024</td>
                                <td class="text-sm-left p-3">Escolta</td>
                                <td class="text-sm-left p-3">Pedágio Seropédica</td>
                                <td class="text-sm-left p-3">Pedágio Magé</td>
                                <td class="text-sm-left p-3"><span class="bg-yellow">Aguardando</span></td>
                                <td class="text-sm-left p-3">
                                    <button class="action-view" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    <button class="action-edit" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                                    <button class="action-cancel" type="button"><i class="fa-solid fa-xmark"></i></button>
                                </td>
                            </tr>
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


