

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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
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
                                        <input type="text" class="form-control" id="bairro_origem" placeholder="Bairro Origem">
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


                        </div>

                        <!-- Container onde os novos campos de agente serão adicionados -->
                        <div id="agentesContainer"></div>
                        <button type="button" class="btn btn-primary" id="addAgente">Adicionar Agente</button>



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
                                    <label for="chegadaAgente" class="form-label">Chegada do Agente</label>
                                    <input type="time" class="form-control" id="chegadaAgente" placeholder="Chegada do Agente">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="inicioAtendimento" class="form-label">Início Atendimento</label>
                                    <input type="time" class="form-control" id="inicioAtendimento" placeholder="Início Atendimento">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tempoEspera" class="form-label">Tempo de Espera</label>
                                    <input type="text" class="form-control" id="tempoEspera" placeholder="Tempo de Espera" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="tab6-tab">
                        <!-- Conteúdo da AbA 6 -->6
                        <br>
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="form-label">Teve sinistro?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="sinistroSim" name="sinistro" value="sim" onclick="toggleSinistroField()">
                                    <label class="form-check-label" for="sinistroSim">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="sinistroNao" name="sinistro" value="não" onclick="toggleSinistroField()">
                                    <label class="form-check-label" for="sinistroNao">Não</label>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="mb-3" id="idSinistroField" style="display:none;">
                                    <label for="idSinistro" class="form-label">ID Sinistro:</label>
                                    <input type="text" class="form-control" id="idSinistro" name="idSinistro" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3" id="relatoOcorrenciaField" style="display:none;">
                                    <label for="relatoOcorrencia" class="form-label">Relato do Sinistro</label>
                                    <textarea class="form-control" id="relatoOcorrencia" name="relatoOcorrencia" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-label">Boletim de Ocorrência:</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="boSim" name="bo" value="sim" onclick="toggleOcorrenciaField()">
                                    <label class="form-check-label" for="boSim">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="boNao" name="bo" value="não" onclick="toggleOcorrenciaField()">
                                    <label class="form-check-label" for="boNao">Não</label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3" id="numeroOcorrenciaField" style="display:none;">
                                    <label for="numeroOcorrencia" class="form-label">Número da Ocorrência:</label>
                                    <input type="text" class="form-control" id="numeroOcorrencia" name="numeroOcorrencia">
                                </div>
                            </div>
                        </div>
                        <br>

                    </div>
                    <div class="tab-pane fade" id="tab7" role="tabpanel" aria-labelledby="tab7-tab">
                        <!-- Conteúdo da AbA 7 -->7
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="dataTerminoSolicitacao" class="form-label">Data Término Solicitação</label>
                                    <input type="date" class="form-control" id="dataTerminoSolicitacao">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="horaTerminoAtendimento" class="form-label">Hora Término Atendimento</label>
                                    <input type="time" class="form-control" id="horaTerminoAtendimento">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="tempoTotalAtendimento" class="form-label">Tempo Total de Atendimento</label>
                                    <input type="time" class="form-control" id="tempoTotalAtendimento">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text" class="form-control" id="status" readonly value="Aguardando">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab8" role="tabpanel" aria-labelledby="tab8-tab">
                        <!-- Conteúdo da AbA 8 -->8
                        <div class="row">
                            <div class="col-sm-12   ">
                                <div class="form-group">
                                    <label for="" class="form-label">Observações</label>
                                    <textarea class="form-control" id="observacoes" name="observacoes" rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    <!-- Custom Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dataTermino = document.getElementById('dataTerminoSolicitacao');
            var horaTermino = document.getElementById('horaTerminoAtendimento');
            var statusField = document.getElementById('status');

            function checkStatus() {
                var dataTerminoValue = dataTermino.value;
                var horaTerminoValue = horaTermino.value;

                if (dataTerminoValue && horaTerminoValue) {
                    statusField.value = 'Finalizado';
                } else {
                    statusField.value = 'Aguardando';
                }
            }

            dataTermino.addEventListener('change', checkStatus);
            horaTermino.addEventListener('change', checkStatus);
        });

        function toggleSinistroField() {
            var sinistroSim = document.getElementById('sinistroSim').checked;
            var idSinistroField = document.getElementById('idSinistroField');
            var relatoOcorrenciaField = document.getElementById('relatoOcorrenciaField');

            if (sinistroSim) {
                idSinistroField.style.display = 'block';
                relatoOcorrenciaField.style.display = 'block';
            } else {
                idSinistroField.style.display = 'none';
                relatoOcorrenciaField.style.display = 'none';
            }
        }

        function toggleOcorrenciaField() {
            var boSim = document.getElementById('boSim').checked;
            var numeroOcorrenciaField = document.getElementById('numeroOcorrenciaField');

            if (boSim) {
                numeroOcorrenciaField.style.display = 'block';
            } else {
                numeroOcorrenciaField.style.display = 'none';
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            var addAgenteButton = document.getElementById('addAgente');
            var agentesContainer = document.getElementById('agentesContainer');
            var agentesCounter = 1;

            addAgenteButton.addEventListener('click', function() {
                if (agentesCounter < 3) {
                    agentesCounter++;

                    var selectHtml = `
                <div class="mb-3">
                    <label for="agentes${agentesCounter}" class="form-label">Agente ${agentesCounter}</label>
                    <select class="form-select" id="agentes${agentesCounter}">
                        <option value="">Selecione...</option>
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
                </div>`;

                    // Append the new agent select to the container
                    agentesContainer.insertAdjacentHTML('beforeend', selectHtml);
                } else {
                    alert('Você já adicionou o número máximo de agentes permitidos.');
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var chegadaAgenteInput = document.getElementById('chegadaAgente');
            var inicioAtendimentoInput = document.getElementById('inicioAtendimento');
            var tempoEsperaInput = document.getElementById('tempoEspera');

            // Função para calcular o tempo de espera
            function calcularTempoEspera() {
                var chegadaAgente = chegadaAgenteInput.value;
                var inicioAtendimento = inicioAtendimentoInput.value;

                // Verifica se ambos os campos têm valores
                if (chegadaAgente && inicioAtendimento) {
                    // Cria objetos de data para calcular a diferença
                    var chegadaAgenteDate = new Date('2000-01-01T' + chegadaAgente + ':00'); // Concatena uma data fictícia para formatar corretamente
                    var inicioAtendimentoDate = new Date('2000-01-01T' + inicioAtendimento + ':00');

                    // Calcula a diferença em milissegundos
                    var diffMs = inicioAtendimentoDate - chegadaAgenteDate;

                    // Converte a diferença em horas e minutos
                    var diffHours = Math.floor(diffMs / (1000 * 60 * 60));
                    var diffMinutes = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));

                    // Formata o tempo de espera como hh:mm
                    var tempoEsperaFormatted = ('0' + diffHours).slice(-2) + ':' + ('0' + diffMinutes).slice(-2);

                    // Atualiza o valor do campo Tempo de Espera
                    tempoEsperaInput.value = tempoEsperaFormatted;
                }
            }

            // Adiciona eventos de change para calcular o tempo de espera quando os campos mudarem
            chegadaAgenteInput.addEventListener('change', calcularTempoEspera);
            inicioAtendimentoInput.addEventListener('change', calcularTempoEspera);
        });
        document.addEventListener('DOMContentLoaded', function() {
            var dataSolicitacao = document.getElementById('dataSolicitacao');
            var horaInicioAtendimento = document.getElementById('inicioAtendimento');
            var dataTerminoSolicitacao = document.getElementById('dataTerminoSolicitacao');
            var horaTerminoAtendimento = document.getElementById('horaTerminoAtendimento');
            var tempoTotalAtendimento = document.getElementById('tempoTotalAtendimento');

            function calcularTempoTotalAtendimento() {
                var dataInicio = dataSolicitacao.value;
                var horaInicio = horaInicioAtendimento.value;
                var dataTermino = dataTerminoSolicitacao.value;
                var horaTermino = horaTerminoAtendimento.value;

                if (dataInicio && horaInicio && dataTermino && horaTermino) {
                    // Cria objetos de data para o início e término do atendimento
                    var inicioAtendimento = new Date(dataInicio + 'T' + horaInicio + ':00');
                    var terminoAtendimento = new Date(dataTermino + 'T' + horaTermino + ':00');

                    // Calcula a diferença em milissegundos
                    var diffMs = terminoAtendimento - inicioAtendimento;

                    // Calcula horas e minutos
                    var diffHours = Math.floor(diffMs / (1000 * 60 * 60));
                    var diffMinutes = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));

                    // Formata o tempo total de atendimento como hh:mm
                    var tempoTotalFormatado = ('0' + diffHours).slice(-2) + ':' + ('0' + diffMinutes).slice(-2);

                    // Atualiza o campo tempoTotalAtendimento
                    tempoTotalAtendimento.value = tempoTotalFormatado;
                }
            }

            // Adiciona event listeners para os campos necessários
            dataSolicitacao.addEventListener('change', calcularTempoTotalAtendimento);
            horaInicioAtendimento.addEventListener('change', calcularTempoTotalAtendimento);
            dataTerminoSolicitacao.addEventListener('change', calcularTempoTotalAtendimento);
            horaTerminoAtendimento.addEventListener('change', calcularTempoTotalAtendimento);
        });

    </script>



    <!-- JavaScript do Bootstrap e Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

