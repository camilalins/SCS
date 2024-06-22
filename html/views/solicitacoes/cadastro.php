<?php /** @var TYPE_NAME $modal */?>
<?php
class Database {
    private $mysqli;

    public function __construct() {
        $this->mysqli = new mysqli(
            MYSQL_HOST,
            MYSQL_USER,
            MYSQL_PASSWORD,
            MYSQL_DATABASE,
            MYSQL_PORT ?: 3306
        );

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function getClientes() {
        $clientes = [];
        $sql = "SELECT nome FROM cliente";
        if ($result = $this->mysqli->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $clientes[] = $row['nome'];
            }
            $result->free();
        } else {
            die("Error in SQL query: " . $this->mysqli->error);
        }
        return $clientes;
    }
}

// Instancie a classe e obtenha os clientes
$db = new Database();
$clientes = $db->getClientes();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SCS - Sistema de Controle de Solicitações">
    <!-- fav icon -->
    <link rel="icon" href="/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="/public/css/bootstrap-icons/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">

    <!-- Main CSS -->
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/global.css">

    <title><?= MAIN_PAGE_TITLE ?> - Cadastro Solicitação</title>
</head>

<body class="home-1 vsc-initialized" data-aos-easing="fade-up" data-aos-duration="500" data-aos-delay="0" cz-shortcut-listen="true">
<div class="container-fluid">
    <form id="form-cadastro">
        <?= csrf() ?>
        <div class="alert alert-danger alert-dismissible fixed-top m-2 mt-0" role="alert" style="display: none">
            <span>&nbsp;</span>
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
        <div class="row mt-2">
            <label for="cliente">Escolha o Cliente</label>
            <br>
            <br>
            <select class="form-select" id="cliente" name="cliente" onchange="carregarFormulario()" required>
                <option value="">Selecione...</option>
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?= htmlspecialchars($cliente) ?>"><?= htmlspecialchars($cliente) ?></option>
                <?php endforeach; ?>
            </select>

            <div id="formulario"></div>
        </div>

        <?php if ($modal): ?>
            <div class="col-12 col-md-3 p-2 d-flex justify-content-end w-100">
                <button type="submit" class="btn my-2 my-sm-0">Salvar</button>
            </div>
        <?php endif; ?>
    </form>
</div>

<!-- Scripts -->
<script src="/public/js/jquery-3.6.1.min.js" async></script>
<script src="/public/js/bootstrap.min.js" async></script>

<script>
    function carregarFormulario() {
        var clienteSelecionado = $('#cliente').val();
        if (clienteSelecionado) {
            $.ajax({
                url: '../views/solicitacoes/formulario-clientes/' + clienteSelecionado + '.php',
                type: 'GET',
                success: function(response) {
                    $('#formulario').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Erro ao carregar formulário:', error);
                    $('#formulario').html('<p>Erro ao carregar o formulário.</p>');
                }
            });
        } else {
            $('#formulario').html('');
        }
    }
</script>
</body>
</html>
