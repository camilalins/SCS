<?php /** @var TYPE_NAME $erro */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<?=$erro?>

<!-- TODO: CRIAR ELEMENTOS HTML DE LOGIN, SEM CSS -->
<form action="/login/efetuar-login.php" method="post">
    <input type="email" class="" name="email" id="email" placeholder="Digite seu email"> <br /><br />
    <input type="password" class="" name="password" id="password" placeholder="Digite sua senha"> <br /><br />



    <button>Entrar</button><br /><br /><br />
    <a href="/login/recuperar-senha.php" id="forgotPasswordLink" class="">Esqueci minha senha</a>
</form>

</body>
</html>