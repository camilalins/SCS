<?php /** @var TYPE_NAME $solicitacoes */?>

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
                    <form action="/clientes" method="post" data-select2-id="10">
                        <div class="row p-1">
                            <div class="col-12 col-md-6 p-2">
                                <div class="form-group">
                                    <input type="text" class="form-control ds-input" id="cliente" placeholder="Local Origem" aria-label="Pesquisar por..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 p-2">
                                <div class="form-group">
                                    <input type="text" class="form-control ds-input" id="cliente" placeholder="Local Destino" aria-label="Pesquisar por..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                </div>
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-12 col-md-4 p-2">
                                <div class="form-group">
                                    <input type="text" class="form-control ds-input" id="cliente" placeholder="Cliente" aria-label="Pesquisar por..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 p-2">
                                <div class="form-group">
                                    <input type="date" class="form-control" id="data-inicio" placeholder="Data Solicitação" name="data-inicio">
                                </div>
                            </div>
                            <div class="col-12 col-md-4 p-2">
                                <div class="form-group">
                                    <select class="form-control ds-input custom-select" id="status" name="status">
                                        <option value="Escolha">Escolha</option>
                                        <option value="fechado">Fechado</option>
                                        <option value="aguardando">Aguardando</option>
                                        <option value="cancelado">Cancelado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-1 p-2 d-flex justify-content-end">

                                <div>
                                    <button class="btn my-2 my-sm-0"><i class="fa fa-search" aria-hidden="true"></i></button>
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

<!-- Modal de Cadastro de Cliente -->
<section class="modal py-1" id="cadastroClienteModal" tabindex="-1" role="dialog" aria-labelledby="cadastroClienteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastroClienteModalLabel">Cadastro de Solicitação</h5>
                <button type="button" class="close p-3 bg-transparent border-0"" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <label for="status">Selecione o Cliente:</label>
                <div class="input-group">
                    <select class="form-control ds-input custom-select" id="escolhaCliente" name="escolhaCliente">
                        <option value="fechado">Mondelez</option>
                        <option value="aguardando">Troca</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Modal de Cadastro de Cliente -->


<?php scripts(["/public/modal/js/modal.js"]);?>

</section>