<?php /** @var TYPE_NAME $solicitacoes */?>

<!-- Busca -->
<section class="container why-choose-us py-1">
    <div class="heading">
        <div class="container-fluid">
            <div class="row">
                <div class="nav">
                    <a class="navbar-brand " href="<?=HOME_PAGE?>">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                    </a>
                    <h3 class="text-left display-5">Solicitações</h3>
                </div>
                <br>
                <br>
                <div class="card">
                    <br>
                    <form action="#" data-select2-id="10">

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="nomeCliente">Cliente</label>
                                    <input type="text" class="form-control ds-input" id="cliente" placeholder="Nome" aria-label="Pesquisar por..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="data-inicio">Data Solicitação</label>
                                    <input type="date" class="form-control" id="data-inicio" name="data-inicio">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <div class="input-group">
                                        <select class="custom-select" id="status" name="status">
                                            <option value="Escolha">Escolha</option>
                                            <option value="fechado">Fechado</option>
                                            <option value="aguardando">Aguardando</option>
                                            <option value="cancelado">Cancelado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="">Origem</label>
                                    <input type="search" class="form-control ds-input" id="" placeholder="Local Origem" aria-label="Pesquisar por..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="">Destino</label>
                                    <input type="search" class="form-control ds-input" id="" placeholder="Local Destino" aria-label="Pesquisar por..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <form class="form-inline my-2 my-lg-0" action="" method="post">
                                    <br>
                                    <button class="btn my-2 my-sm-0" type="button" id=""><i class="fa fa-search"></i></button>
                                </form>
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
                            <div class="" style="display: flex; justify-content: flex-end;">
                                <div class="" id="">
                                    <ul class="navbar-nav ml-auto" style="display: flex;flex-direction: row; font-size: 20px;">
                                        <li class="nav-item" style="padding: 0px;color: #06326d;">
                                            <a class="nav-link" href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="nav-item" style="padding: 0px 0px 0px 1px;color: #06326d;">
                                            <button type="button" class="open-modal" data-target="cadastroSolicitacaoModal" style="padding-left: 10px;padding-top: 9px;border:none; background: none;color:#06326d;">
                                                <i class="fa fa-plus-square" aria-hidden="true" style="padding-right: 3px;"></i>Cadastrar
                                            </button>
                                        </li>
                                    </ul>
                                    <form class="form-inline" style="display: none;">
                                        <button class="btn my-2 my-sm-0" type="button" id="cadastrarButtone">Cadastrar</button>
                                    </form>
                                </div>
                            </div><!-- /Menu -->
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>

                                <th class="w-25 p-3" scope="col">ID</th>
                                <th class="w-25 p-3" scope="col">Cliente</th>
                                <th class="w-25 p-3" scope="col">Data de Início</th>
                                <th class="w-25 p-3" scope="col">Tipo Operação</th>
                                <th class="w-25 p-3" scope="col">Origem</th>
                                <th class="w-25 p-3" scope="col">Destino</th>
                                <th class="w-25 p-3" scope="col">Status</th>
                                <th class="w-100 p-3" scope="col">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>183</td>
                                <td>Mondelez</td>
                                <td>11-7-2014</td>
                                <td>Suporte Logístico 1</td>
                                <td>Pedágio Seropédica</td>
                                <td>Pedágio Magé</td>
                                <td><span class="bg-green">Finalizada</span></td>
                                <td>
                                    <button class="action-view" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    <button class="action-edit" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                                    <button class="action-cancel" type="button"><i class="fa-solid fa-xmark"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>219</td>
                                <td>Mondelez</td>
                                <td>11-7-2014</td>
                                <td>Suporte Logístico 2</td>
                                <td>Pedágio Seropédica</td>
                                <td>Pedágio Magé</td>
                                <td><span class="bg-red">Cancelada</span></td>
                                <td>
                                    <button class="action-view" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    <button class="action-edit" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                                    <button class="action-cancel" type="button"><i class="fa-solid fa-xmark"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>657</td>
                                <td>Mondelez</td>
                                <td>19-5-2024</td>
                                <td>Suporte Logístico 3</td>
                                <td>Pedágio Seropédica</td>
                                <td>Pedágio Magé</td>
                                <td><span class="bg-yellow">Aguardando</span></td>
                                <td>
                                    <button class="action-view" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    <button class="action-edit" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                                    <button class="action-cancel" type="button"><i class="fa-solid fa-xmark"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>175</td>
                                <td>Troca</td>
                                <td>11-7-2024</td>
                                <td>Escolta</td>
                                <td>Pedágio Seropédica</td>
                                <td>Pedágio Magé</td>
                                <td><span class="bg-yellow">Aguardando</span></td>
                                <td>
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

<!-- Modal -->
<section class="container why-choose-us py-1">
    <div class="modal fade" id="cadastroSolicitacaoModal" tabindex="-1" aria-labelledby="cadastroSolicitacaoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadastroSolicitacaoModalLabel">Cadastro Solicitação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="status">Selecione o Cliente:</label>
                            <div class="input-group">
                                <select class="custom-select" id="escolhaCliente" name="escolhaCliente">
                                    <option value="fechado">Mondelez</option>
                                    <option value="aguardando">Troca</option>
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fas fa-caret-down"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <!-- Adicione o botão para alternar entre os formulários -->
                    <button type="button" id="alternarForm" class="btn btn-primary">Alternar Formulário</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Modal -->

<?php scripts(["/public/modal/js/modal.js"]);?>

</section>