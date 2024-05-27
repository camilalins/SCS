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
                    <h3 class="text-left display-5 ms-3">Clientes</h3>
                </div>
                <br>
                <br>
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
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal" data-bs-title="Cadastro de clientes" data-bs-action="/clientes/form">
                                                <i class="fa fa-user-plus" aria-hidden="true"></i>
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
                                    <td class="text-sm-left p-3"><?=$c->getId()?></td>
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

<?php scripts([
    ["src" => "/public/clientes/js/pesquisa.js", "id" => "script-pesquisa", "encdata" => b64JsonEncode([ "uri" => "/api/clientes" ]) ]
]);?>
