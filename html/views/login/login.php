<?php /** @var TYPE_NAME $erro */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .login { width: 400px; margin: auto; margin-top: 200px; }
        fieldset { width: 300px; display: flex; flex-direction: column; gap: 20px; padding: 20px; }
        fieldset div { display: flex; gap: 20px; }
        fieldset div input { width: 200px; }
        .error { color: red; }
    </style>
</head>
<body>

    <div class="login">

        <form action="/login/efetuar-login.php" method="post">
            <fieldset>
                <legend>Informe suas credenciais</legend>
                <div class="error"><?=$erro?></div>
                <div>
                    <label for="email">E-mail</label>
                    <input type="text" name="email">
                </div>
                <div>
                    <label for="senha">Senha</label>
                    <input type="password" name="senha">
                </div>
                <div>
                    <button>Entrar</button>
                </div>
            </fieldset>
        </form>

    </div>

</body>
</html>