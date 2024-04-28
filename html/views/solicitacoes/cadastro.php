<?php /** @var TYPE_NAME $erro */?>
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
    </style>
</head>
<body>

<div class="cadastro">

    <h1>Cadastro</h1>

    <form action="/solicitaacoes/cadastrar.php" method="post">
        <fieldset>

            <div class="error"><?=$erro?></div>
            <div>
                <label for="cliente">Cliente</label>
                <input type="text" name="cliente">
            </div>
            <div>
                <label for="placa">Placa&nbsp;</label>
                <input type="text" name="placa">
            </div>
            <div>
                <button>Salvar</button>
            </div>
        </fieldset>
    </form>

</div>

</body>
</html>