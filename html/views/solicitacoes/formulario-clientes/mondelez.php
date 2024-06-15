

<!-- Google font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">

<br>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com Abas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./../../../public/css/bootstrap-icons/bootstrap-icons.css">
<script src="https://kit.fontawesome.com/eaf468bfde.js" crossorigin="anonymous"></script>





    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">Dados do Serviço</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">Dados do Transportador</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="false">Local Atendimento</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab" aria-controls="tab4" aria-selected="false">Dados do Atendimento</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab5-tab" data-bs-toggle="tab" data-bs-target="#tab5" type="button" role="tab" aria-controls="tab5" aria-selected="false">Horário de Atendimento</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab6-tab" data-bs-toggle="tab" data-bs-target="#tab6" type="button" role="tab" aria-controls="tab6" aria-selected="false">Sinistro</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab7-tab" data-bs-toggle="tab" data-bs-target="#tab7" type="button" role="tab" aria-controls="tab7" aria-selected="false">Conclusão do Atendimento</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab8-tab" data-bs-toggle="tab" data-bs-target="#tab8" type="button" role="tab" aria-controls="tab8" aria-selected="false">Complemento</button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                    <!-- Conteúdo da AbA 1 -->
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="idMondelez" class="form-label">ID Mondelez</label>
                                <input type="text" class="form-control" id="idMondelez" placeholder="ID Mondelez">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="dataSolicitacao" class="form-label">Data da Solicitação</label>
                                <input type="date" class="form-control" id="dataSolicitacao">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="servicoSiop" class="form-label">Serviço Siop</label>
                                <select class="form-select" id="servicoSiop">
                                    <option value="">Selecione...</option>
                                    <option value="Moto">Moto</option>
                                    <option value="Carro">Carro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tipoOperacao" class="form-label">Tipo de Operação</label>
                                <select class="form-select" id="tipoOperacao">
                                    <option value="">Selecione...</option>
                                    <option value="Suporte Logístico 1">Suporte Logístico 1</option>
                                    <option value="Suporte Logístico 2">Suporte Logístico 2</option>
                                    <option value="Suporte Logístico 3">Suporte Logístico 3</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                    <!-- Conteúdo da AbA 2 -->
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="transportadora" class="form-label">Transportadora</label>
                                <input type="text" class="form-control" id="transportadora" placeholder="Transportadora">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="condutor" class="form-label">Condutor</label>
                                <input type="text" class="form-control" id="condutor" placeholder="Condutor">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="cavalo" class="form-label">Cavalo</label>
                                <input type="text" class="form-control" id="cavalo" placeholder="Cavalo">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="carreta" class="form-label">Carreta</label>
                                <input type="text" class="form-control" id="carreta" placeholder="Carreta">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                    <!-- Conteúdo da AbA 3 -->
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="origem" class="form-label">Origem</label>
                                <select class="form-select" id="origem">
                                    <option value="">Selecione...</option>
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="carreta" class="form-label">Bairro Origem</label>
                                <div style="display: flex; align-items: center; justify-content: center;">
                                    <input type="text" class="form-control" id="carreta" placeholder="Carreta">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="cepOrigem" class="form-label">CEP Origem</label>
                                <div style="display: flex; align-items: center; justify-content: center;">
                                    <input type="text" class="form-control" id="cepOrigem" placeholder="CEP Origem">
                                    <a href="#"><i class="fa fa-map-marker" aria-hidden="true" style="padding-left: 10px;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
                <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                    <!-- Conteúdo da AbA 4 -->4
                    <div class="mb-3">
                        <label for="agentes" class="form-label">Agentes</label>
                        <select class="form-select" id="agentes">
                            <option value="1">Agente 1</option>
                            <option value="2">Agente 2</option>
                            <option value="3">Agente 3</option>
                            <option value="4">Agente 4</option>
                            <option value="5">Agente 5</option>
                            <option value="6">Agente 6</option>
                            <option value="7">Agente 7</option>
                            <option value="8">Agente 8</option>
                            <option value="9">Agente 9</option>
                            <option value="10">Agente 10</option>
                        </select>
                        <button type="button" class="btn btn-primary" id="addAgente">Adicionar Agente</button>
                    </div>



                </div>
                <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab5-tab">
                    <!-- Conteúdo da AbA 5 -->
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="horaAgendamento" class="form-label">Hora do Agendamento</label>
                                <input type="time" class="form-control" id="horaAgendamento" placeholder="Hora do Agendamento">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="horaAgendamento" class="form-label">Chegada do Agente</label>
                                <input type="time" class="form-control" id="horaAgendamento" placeholder="Chegada do Agente">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="horaAgendamento" class="form-label">Início Atendimento</label>
                                <input type="time" class="form-control" id="horaAgendamento" placeholder="Início Atendimento">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="horaAgendamento" class="form-label">Tempo de Espera</label>
                                <input type="time" class="form-control" id="horaAgendamento" placeholder="Tempo de Espera">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="tab6-tab">
                    <!-- Conteúdo da AbA 6 -->6
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="idMondelez" class="form-label">Boletim de Ocorrência</label>
                                <input type="text" class="form-control" id="idMondelez" placeholder="Boletim de Ocorrência">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="dataSolicitacao" class="form-label">Informações</label>
                                <input type="text" class="form-control" id="idMondelez" placeholder="Informações">
                            </div>
                        </div>
                    </div>
                    <br>
                    
                </div>
                <div class="tab-pane fade" id="tab7" role="tabpanel" aria-labelledby="tab7-tab">
                    <!-- Conteúdo da AbA 7 -->7
                </div>
                <div class="tab-pane fade" id="tab8" role="tabpanel" aria-labelledby="tab8-tab">
                    <!-- Conteúdo da AbA 8 -->8
                </div>


            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

