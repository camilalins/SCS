<?php /** @var TYPE_NAME $clientes */?>
<?php /** @var TYPE_NAME $nome */?>
<?php /** @var TYPE_NAME $cnpj */?>
<?php /** @var TYPE_NAME $email */?>
<!-- Busca -->
<section class="container search py-1">
    <div class="heading">
        <div class="container-fluid">
            <div class="row">
                <div class="nav">
                    <a class="navbar-brand " href="<?=HOME_PAGE?>">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                    </a>
                    <h3 class="text-left display-5">Clientes</h3>
                </div>
                <br>
                <br>
                <div class="card">
                    <br>
                    <form action="/clientes" method="post" data-select2-id="10">


                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control ds-input" name="nome" id="nome" value="<?=$nome?>" placeholder="Nome" aria-label="Pesquisar por..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <input type="text" class="form-control ds-input" name="cnpj" id="cnpj" value="<?=$cnpj?>" placeholder="CNPJ" aria-label="Pesquisar por..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <input type="email" class="form-control ds-input" name="email" id="email" value="<?=$email?>" placeholder="Email" aria-label="Pesquisar por..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div>
                                    <button class="btn my-2 my-sm-0"><i class="fa fa-search"></i></button>
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
                            <div class="" style="display: flex; justify-content: flex-end;">
                                <div class="" id="">
                                    <ul class="navbar-nav ml-auto" style="display: flex;flex-direction: row; font-size: 20px;">
                                        <li class="nav-item" style="padding: 0px;color: #06326d;">
                                            <a class="nav-link" href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="nav-item" style="padding: 0px 0px 0px 1px;color: #06326d;">
                                            <button type="button" class="open-modal" data-target="cadastroClienteModal" style="padding-left: 10px;padding-top: 9px;border:none; background: none;color:#06326d;">
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
<!--Modal -->
<section class="container modal py-1">
    <div class="modal fade" id="cadastroClienteModal" tabindex="-1" aria-labelledby="cadastroClienteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadastroClienteModalLabel">Cadastro de Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulário de Cadastro de Cliente -->
                    <form id="cadastroClienteForm">

                        <div class="row" style="align-items: center;}">
                            <div class="col-12 col-md-7">
                                <div class="form-group">
                                    <input type="search" class="form-control ds-input" id="" placeholder="Nome" aria-label="Pesquisar por..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <input type="search" class="form-control ds-input" id="" placeholder="CNPJ" aria-label="Pesquisar por..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="align-items: center;}">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <input class="form-control ds-input"  placeholder="Responsável"  autocomplete="on" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <input class="form-control ds-input"  placeholder="Telefone"  autocomplete="on" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <input class="form-control ds-input"  placeholder="Email"  autocomplete="on" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Modal -->
<?php scripts([["src" => "/public/clientes/js/pesquisa.js", "id" => "script-pesquisa", "uri" => "/api/clientes" ]]);?>
</section>