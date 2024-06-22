<?php
require_once('/var/www/html/config/config.php');

class DatabaseLocaisMondelez {
    private $mysqli;

    public function __construct($host, $user, $password, $database, $port) {
        // Conectar ao banco de dados
        $this->mysqli = new mysqli($host, $user, $password, $database, $port);
        if ($this->mysqli->connect_errno) {
            die("Falha ao conectar ao MySQL: " . $this->mysqli->connect_error);
        }
    }

    public function getLocaisMondelez() {
        $locais = [];
        $sql = "SELECT id, local, bairro, cep, maps FROM locais_mondelez";
        if ($result = $this->mysqli->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $locais[] = [
                    'id' => $row['id'],
                    'local' => $row['local'],
                    'bairro' => $row['bairro'],
                    'cep' => $row['cep'],
                    'maps' => $row['maps']
                ];
            }
            $result->free();
        } else {
            die("Erro na consulta SQL: " . $this->mysqli->error);
        }
        return $locais;
    }
    public function getAgentes() {
        $agentes = [];
        $sql = "SELECT id, nome FROM agentes";
        if ($result = $this->mysqli->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $agentes[] = [
                    'id' => $row['id'],
                    'nome' => $row['nome']
                ];
            }
            $result->free();
        } else {
            die("Erro na consulta SQL: " . $this->mysqli->error);
        }
        return $agentes;
    }

    public function buscarTransportadoras($nomeTransportadora) {
        $transportadoras = [];
        $sql = "SELECT DISTINCT transportadora FROM solicitacao WHERE transportadora LIKE '%" . $this->mysqli->real_escape_string($nomeTransportadora) . "%'";

        if ($result = $this->mysqli->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $transportadoras[] = $row['transportadora'];
            }
            $result->free();
        } else {
            die("Erro na consulta SQL: " . $this->mysqli->error);
        }
        return $transportadoras;
    }

    public function buscarCondutores($nomeCondutor) {
        $condutores = [];
        $sql = "SELECT DISTINCT condutor FROM solicitacao WHERE condutor LIKE '%" . $this->mysqli->real_escape_string($nomeCondutor) . "%'";

        if ($result = $this->mysqli->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $condutores[] = $row['condutor'];
            }
            $result->free();
        } else {
            die("Erro na consulta SQL: " . $this->mysqli->error);
        }
        return $condutores;
    }

    public function __destruct() {
        // Fechar conexão com o banco de dados
        $this->mysqli->close();
    }
}

// Verificar se foi feita uma requisição AJAX para buscar transportadoras
if (isset($_GET['transportadora'])) {
    // Instanciar a classe e obter as transportadoras
    $db = new DatabaseLocaisMondelez(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE, MYSQL_PORT);
    $transportadoras = $db->buscarTransportadoras($_GET['transportadora']);
    echo json_encode($transportadoras);
    exit; // Encerrar o script após retornar os resultados JSON
}

// Verificar se foi feita uma requisição AJAX para buscar condutores
if (isset($_GET['condutor'])) {
    // Instanciar a classe e obter os condutores
    $db = new DatabaseLocaisMondelez(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE, MYSQL_PORT);
    $condutores = $db->buscarCondutores($_GET['condutor']);
    echo json_encode($condutores);
    exit; // Encerrar o script após retornar os resultados JSON
}

// Se não houver requisição AJAX, obter os locais
$db = new DatabaseLocaisMondelez(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE, MYSQL_PORT);
$locais = $db->getLocaisMondelez();
?>



<!-- Google font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">

<br>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro Solicitação Mondelez</title>
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
                    <!-- Campo Transportadora -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="transportadora" class="form-label">Transportadora</label>
                            <input type="text" class="form-control" id="transportadoraInput" placeholder="Transportadora" oninput="buscarTransportadoras(this.value)">
                            <div id="transportadoraSuggestions"></div> <!-- Para exibir sugestões -->
                        </div>
                    </div>

                    <!-- Campo Condutor -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="condutor" class="form-label">Condutor</label>
                            <input type="text" class="form-control" id="condutorInput" placeholder="Condutor" oninput="buscarCondutores(this.value)">
                            <div id="condutorSuggestions"></div> <!-- Para exibir sugestões -->
                        </div>
                    </div>
                </div>
                <script>
                    function buscarTransportadoras(nomeTransportadora) {
                        // Limpar sugestões anteriores
                        document.getElementById('transportadoraSuggestions').innerHTML = '';

                        // Fazer requisição AJAX para buscar dados no servidor
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', '<?= $_SERVER['PHP_SELF'] ?>?transportadora=' + encodeURIComponent(nomeTransportadora), true);

                        xhr.onload = function() {
                            if (xhr.status >= 200 && xhr.status < 400) {
                                var data = JSON.parse(xhr.responseText);
                                if (data.length > 0) {
                                    // Exibir sugestões
                                    var suggestions = document.getElementById('transportadoraSuggestions');
                                    data.forEach(function(transportadora) {
                                        var option = document.createElement('div');
                                        option.textContent = transportadora;
                                        option.addEventListener('click', function() {
                                            document.getElementById('transportadoraInput').value = transportadora; // Preencher input com nome da transportadora clicada
                                            suggestions.innerHTML = ''; // Limpar sugestões
                                        });
                                        suggestions.appendChild(option);
                                    });
                                }
                            } else {
                                console.error('Erro ao buscar transportadoras.');
                            }
                        };

                        xhr.send();
                    }

                    function buscarCondutores(nomeCondutor) {
                        // Limpar sugestões anteriores
                        document.getElementById('condutorSuggestions').innerHTML = '';

                        // Fazer requisição AJAX para buscar dados no servidor
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', '<?= $_SERVER['PHP_SELF'] ?>?condutor=' + encodeURIComponent(nomeCondutor), true);

                        xhr.onload = function() {
                            if (xhr.status >= 200 && xhr.status < 400) {
                                var data = JSON.parse(xhr.responseText);
                                if (data.length > 0) {
                                    // Exibir sugestões
                                    var suggestions = document.getElementById('condutorSuggestions');
                                    data.forEach(function(condutor) {
                                        var option = document.createElement('div');
                                        option.textContent = condutor;
                                        option.addEventListener('click', function() {
                                            document.getElementById('condutorInput').value = condutor; // Preencher input com nome do condutor clicado
                                            suggestions.innerHTML = ''; // Limpar sugestões
                                        });
                                        suggestions.appendChild(option);
                                    });
                                }
                            } else {
                                console.error('Erro ao buscar condutores.');
                            }
                        };

                        xhr.send();
                    }
                </script>
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
                <!-- Local Origem -->
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="origem" class="form-label">Origem</label>

                            <select class="form-select" id="local_origem" name="local_origem" onchange="mostrarLocalSelecionado()">
                                <option value="">Selecione...</option>
                                <?php foreach ($locais as $local): ?>
                                    <option value="<?= htmlspecialchars($local['id']) ?>"><?= htmlspecialchars($local['local']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="bairroOrigem" class="form-label">Bairro Origem</label>
                            <div style="display: flex; align-items: center; justify-content: center;">
                                <input type="text" class="form-control" id="bairroSelecionado" name="bairroSelecionado" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cepOrigem" class="form-label">CEP Origem</label>
                            <div style="display: flex; align-items: center; justify-content: center;">
                                <input type="text" class="form-control" id="cepSelecionado" name="cepSelecionado" readonly>
                                <a id="mapsLink" href="#" target="_blank"><i class="fa fa-map-marker" aria-hidden="true" style="padding-left: 10px;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!-- Local de Destino -->
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="destino_origem" class="form-label">Destino</label>
                            <select class="form-select" id="destino_origem" name="destino_origem" onchange="mostrarLocalSelecionado()">
                                <option value="">Selecione...</option>
                                <?php foreach ($locais as $local): ?>
                                    <option value="<?= htmlspecialchars($local['id']) ?>"><?= htmlspecialchars($local['local']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="bairroDestino" class="form-label">Bairro Destino</label>
                            <div style="display: flex; align-items: center; justify-content: center;">
                                <input type="text" class="form-control" id="bairroSelecionadoDestino" name="bairroSelecionadoDestino" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cepDestino" class="form-label">CEP Destino</label>
                            <div style="display: flex; align-items: center; justify-content: center;">
                                <input type="text" class="form-control" id="cepSelecionadoDestino" name="cepSelecionadoDestino" readonly>
                                <a id="mapsLinkDestino" href="#" target="_blank"><i class="fa fa-map-marker" aria-hidden="true" style="padding-left: 10px;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                <!-- Conteúdo da AbA 4 -->
                <br>
                <div class="mb-3">
                    <label for="agentes" class="form-label">Agente da Missão</label>

                    <select class="form-select" id="agentes" name="agentes" onchange="mostrarAgenteSelecionado()">
                        <option value="">Selecione...</option>
                        <?php
                        // Instanciar a classe e obter os agentes
                        $db = new DatabaseLocaisMondelez(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE, MYSQL_PORT);
                        $agentes = $db->getAgentes();

                        // Iterar sobre os agentes e criar as opções do select
                        foreach ($agentes as $agente) {
                            echo '<option value="' . htmlspecialchars($agente['id']) . '">' . htmlspecialchars($agente['nome']) . '</option>';
                        }
                        ?>
                    </select>
                    <div id="agentesContainer">
                        <!-- Aqui serão adicionados os selects de agentes dinamicamente -->
                    </div>

                </div>




                <!-- Botão para adicionar agente -->
                <button type="button" class="btn btn-primary" id="addAgente">Adicionar Agente</button>


                <script>
                    // Função para buscar os agentes do banco de dados
                    function buscarAgentes() {
                        return <?php echo json_encode($agentes); ?>;
                    }

                    // Contador para controlar o número de selects adicionados
                    let contadorAgentes = 1;

                    // Função para adicionar um novo select de agente
                    function adicionarAgente() {
                        if (contadorAgentes < 3) { // Limita a 3 opções
                            contadorAgentes++;

                            // Cria um novo select de agentes
                            let novoSelect = document.createElement('select');
                            novoSelect.className = 'form-select';
                            novoSelect.name = 'agente_' + contadorAgentes; // Nome único para cada select
                            novoSelect.innerHTML = '<option value="">Selecione...</option>';

                            // Preenche o novo select com os agentes obtidos
                            let agentes = buscarAgentes();
                            agentes.forEach(agente => {
                                let option = document.createElement('option');
                                option.value = agente.id;
                                option.textContent = agente.nome;
                                novoSelect.appendChild(option);
                            });

                            // Adiciona o novo select ao container
                            document.getElementById('agentesContainer').appendChild(novoSelect);
                        } else {
                            alert('Você atingiu o limite máximo de 3 opções de agentes.');
                        }
                    }

                    // Event listener para o botão "Adicionar Agente"
                    document.getElementById('addAgente').addEventListener('click', adicionarAgente);
                </script>





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
                <!-- Conteúdo da AbA 6 -->
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <label class="form-label">Houve sinistro?</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="sinistroSim" name="sinistro" value="sim" onclick="toggleSinistroField()">
                            <label class="form-check-label" for="sinistroSim">Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="sinistroNao" name="sinistro" value="não" onclick="toggleSinistroField()">
                            <label class="form-check-label" for="sinistroNao">Não</label>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div id="idSinistroField" style="display:none;">
                            <label for="idSinistro" class="form-label">ID Sinistro:</label>
                            <input type="text" class="form-control" id="idSinistro" name="idSinistro" readonly>
                        </div>
                    </div>
                    <div class="col-sm-3">
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

                    <div class="col-sm-3">
                        <div class="" id="numeroOcorrenciaField" style="display:none;">
                            <label for="numeroOcorrencia" class="form-label">Número da Ocorrência:</label>
                            <input type="text" class="form-control" id="numeroOcorrencia" name="numeroOcorrencia">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3" id="relatoOcorrenciaField" style="display:none;">
                            <label for="relatoOcorrencia" class="form-label">Relato do Sinistro</label>
                            <textarea class="form-control" id="relatoOcorrencia" name="relatoOcorrencia" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <br>

            </div>
            <div class="tab-pane fade" id="tab7" role="tabpanel" aria-labelledby="tab7-tab">
                <!-- Conteúdo da AbA 7 -->
                <br>
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
                <!-- Conteúdo da AbA 8 -->
                <br>
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

<!-- Script para designar o status -->
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
    <!-- Script para classificar o sinistro e ocorrência -->
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
    <!-- Script para classificar o boletim de ocorrencia -->
    function toggleOcorrenciaField() {
        var boSim = document.getElementById('boSim').checked;
        var numeroOcorrenciaField = document.getElementById('numeroOcorrenciaField');

        if (boSim) {
            numeroOcorrenciaField.style.display = 'block';
        } else {
            numeroOcorrenciaField.style.display = 'none';
        }
    }



    <!-- Script para determinar o tempo de espera -->
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
<!--script para local origem-->
<script>
    function mostrarLocalSelecionado() {
        var select = document.getElementById('local_origem');
        var bairroInput = document.getElementById('bairroSelecionado');
        var cepInput = document.getElementById('cepSelecionado');
        var mapsLink = document.getElementById('mapsLink');
        var selectDestino = document.getElementById('destino_origem');
        var bairroDestinoInput = document.getElementById('bairroSelecionadoDestino');
        var cepDestinoInput = document.getElementById('cepSelecionadoDestino');
        var mapsDestinoLink = document.getElementById('mapsLinkDestino');

        // Obter o local de origem correspondente ao local selecionado
        var selectedId = select.value;
        var selectedLocal = <?= json_encode($locais) ?>.find(function(local) {
            return local.id === selectedId;
        });

        // Obter o local de destino correspondente ao local selecionado
        var selectedDestinoId = selectDestino.value;
        var selectedLocalDestino = <?= json_encode($locais) ?>.find(function(local) {
            return local.id === selectedDestinoId;
        });

        // Exibir o bairro e o CEP selecionados para o local de origem
        if (selectedLocal) {
            bairroInput.value = selectedLocal.bairro;
            cepInput.value = selectedLocal.cep;
            mapsLink.href = selectedLocal.maps; // Atualiza o atributo href do link com o mapa
        } else {
            bairroInput.value = "";
            cepInput.value = "";
            mapsLink.href = "#"; // Se nenhum local válido for selecionado, o link aponta para #
        }

        // Exibir o bairro e o CEP selecionados para o local de destino
        if (selectedLocalDestino) {
            bairroDestinoInput.value = selectedLocalDestino.bairro;
            cepDestinoInput.value = selectedLocalDestino.cep;
            mapsDestinoLink.href = selectedLocalDestino.maps; // Atualiza o atributo href do link com o mapa
        } else {
            bairroDestinoInput.value = "";
            cepDestinoInput.value = "";
            mapsDestinoLink.href = "#"; // Se nenhum local válido for selecionado, o link aponta para #
        }
    }
</script>




<!-- JavaScript do Bootstrap e Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


