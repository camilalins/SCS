<?php /** @var TYPE_NAME $erro */?>
<?php /** @var TYPE_NAME $mensagem */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        fieldset { width: 300px; display: flex; flex-direction: column; gap: 20px; padding: 20px; }
        fieldset div { display: flex; gap: 20px; }
        fieldset div input { width: 200px; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>

<div class="cadastro">

    <h1>Cadastro</h1>

    <form action="/solicitacoes/cadastrar.php" method="post">
        <fieldset>

            <div class="<?=$erro?"error":"success"?>"><?=$erro?:$mensagem?></div>
            <div>
                <label for="cliente">Cliente</label>
                <input type="text" name="cliente">
            </div>
            <div>
                <label for="placa">Placa&nbsp;</label>
                <input type="text" name="placa">
            </div>
            <div>
                <button>Salvar</button>&nbsp;
                <a href="/solicitacoes/apresentar.php">Ir para solicitações</a>
            </div>
        </fieldset>
    </form>

</div>

</body>
</html>