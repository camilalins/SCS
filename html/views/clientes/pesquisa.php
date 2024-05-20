<?php /** @var TYPE_NAME $clientes */?>
<?php /** @var TYPE_NAME $nome */?>
<?php /** @var TYPE_NAME $cnpj */?>
<?php /** @var TYPE_NAME $email */?>
<!-- Busca -->
<section class="container search py-1">
    <div class="heading">
        <div class="container-fluid">
            <div class="row">
                <div class="nav d-flex align-items-sm-center">
                    <a class="navbar-brand" href="<?=HOME_PAGE?>">
                        <i class="fa fa-angle-left fs-3" aria-hidden="true"></i>
                    </a>
                    <h3 class="text-left display-5 p-5">Clientes</h3>
                </div>
                <br>
                <br>
                <div class="card">

                    <form action="/clientes" method="post" data-select2-id="10">
                        <div class="row p-3">
                            <div class="col-12 col-md-5 p-2">
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
                            <div class="col-12 col-md-1 p-2">
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
                                        <li class="nav-item" style="padding: 0px;color: #06326d;">
                                            <a class="nav-link" href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="nav-item" style="padding: 0px 0px 0px 1px;color: #06326d;">

                                            <button type="button" class="open-modal" data-target="cadastroClienteModal" style="padding-left: 10px;border:none; background: none;color:#06326d;">
                                                <i class="fa fa-plus-square" aria-hidden="true" style="padding-right: 3px;"></i>Cadastrar
                                            </button>


                                        </li>

                                    </ul>

                                </div>
                            </div><!-- /Menu -->
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table id="tb-clientes" class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th class="w-25 p-3" scope="col">ID</th>
                                <th class="w-25 p-3" scope="col">Cliente</th>
                                <th class="w-25 p-3" scope="col">CNPJ</th>
                                <th class="w-25 p-3" scope="col">Responsável</th>
                                <th class="w-25 p-3" scope="col">Telefone</th>
                                <th class="w-25 p-3" scope="col">Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($clientes as $c):?>
                                <tr>
                                    <td><?=$c->getId()?></td>
                                    <td><?=$c->getNome()?></td>
                                    <td><?=$c->getCnpj()?></td>
                                    <td><?=$c->getResponsavel()?></td>
                                    <td><?=$c->getTelefone()?></td>
                                    <td><?=$c->getEmail()?></td>
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
<!-- Modal de Cadastro de Cliente -->
<section class="modal py-1" id="cadastroClienteModal" tabindex="-1" role="dialog" aria-labelledby="cadastroClienteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastroClienteModalLabel">Cadastro de Cliente</h5>
                <button type="button" class="close p-3 bg-transparent border-0"" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="cadastroClienteForm">
                    <div class="row">
                        <div class="col-12 col-md-6 p-2">
                            <label for="nomeCliente">Nome</label>
                            <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" required>
                        </div>
                        <div class="col-12 col-md-6 p-2">
                            <label for="cnpjCliente">CNPJ</label>
                            <input type="text" class="form-control" id="cnpjCliente" name="cnpjCliente" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 p-2">
                            <label for="responsavelCliente">Responsável</label>
                            <input type="text" class="form-control" id="responsavelCliente" name="responsavelCliente" required>
                        </div>
                        <div class="col-12 col-md-3 p-2">
                            <label for="emailCliente">Email</label>
                            <input type="email" class="form-control" id="emailCliente" name="emailCliente" required>
                        </div>
                        <div class="col-12 col-md-3 p-2">
                            <label for="telefoneCliente">Telefone</label>
                            <input type="text" class="form-control" id="telefoneCliente" name="telefoneCliente" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 p-2 d-flex justify-content-end w-100">
                        <button type="submit" class="btn my-2 my-sm-0">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /Modal de Cadastro de Cliente -->
<?php scripts([
        ["src" => "/public/clientes/js/pesquisa.js", "id" => "script-pesquisa", "uri" => "/api/clientes" ],
        ["src" => "/public/modal/js/modal.js" ]

]);?>
