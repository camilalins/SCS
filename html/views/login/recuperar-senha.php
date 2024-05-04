<?php /** @var TYPE_NAME $erro */?>
<?php /** @var TYPE_NAME $mensagem */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCS - Recuperar senha</title>
    <style>
        .content { width: 400px; margin: auto; margin-top: 200px; }
        fieldset { width: 300px; display: flex; flex-direction: column; gap: 20px; padding: 20px; border-radius: 5px; }
        fieldset legend { font-size: 18px; font-weight: bold; }
        fieldset div { display: flex; gap: 20px; }
        fieldset div input { width: 200px; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>

    <div class="content">

        <form action="/recuperar-senha" method="post">

            <fieldset>

                <legend>Recuperar senha</legend>

                <div>
                    <input type="email" class="" name="email" id="email" placeholder="Digite seu email" size="40">

                    <button>Enviar</button>
                </div>

                <a href="/">Voltar para o login</a>

            </fieldset>

            <br><br>

            <div class="<?=$erro?"error":"success"?>"><?=$erro?:$mensagem?></div>
        </form>

    </div>

</body>
</html>