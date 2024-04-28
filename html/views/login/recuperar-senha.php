<?php /** @var TYPE_NAME $data */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
</head>
<body>
<h1>Recuperar Senha</h1>
<?=$data["erro"]?>


<form action="/login/recuperar-senha.php" method="post">
    <input type="email" class="" name="email" id="email" placeholder="Digite seu email"> <br /><br />

    <button>Enviar</button><br /><br /><br />
</form>

</body>
</html>