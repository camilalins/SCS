<?php /** @var TYPE_NAME $data */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
<h1>Login</h1>
<?=$data["erro"]?>

<!-- TODO: CRIAR ELEMENTOS HTML DE LOGIN, SEM CSS -->
<form action="/login/efetuar-login.php" method="post">
    <button>Entrar</button>
</form>

</body>
</html>