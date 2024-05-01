<?php /** @var TYPE_NAME $title */?>
<?php /** @var TYPE_NAME $page */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?:MAIN_PAGE_TITLE?></title>
    <style>
        html, body { margin: 0; padding: 0; }
        .header { background: <?=MAIN_PAGE_THEME["PRIMARY"]?>; color: <?=MAIN_PAGE_THEME["PRIMARY-TEXT"]?>; height: 80px; display: flex; align-items: center; justify-content: flex-end; }
        .user { padding: 20px; }
        .user-opt { padding: 20px; }
        .content { padding: 20px;}
    </style>
    <!-- TODO: ADICIONAR ESTILOS GLOBAIS -->
</head>
<body>

    <div id="root">
        <div class="header">
            <div class="user">
                <?=session(USUARIO)->nome?><br>
                <?=session(USUARIO)->email?>
            </div>
            <div class="user-opt">
                <?php if(session(USUARIO)):?>
                    <button onclick="window.open('/login/encerrar-sessao.php', '_self')">Sair</button>
                <?php else:?>
                    <button onclick="window.open('/login/efetuar-login.php', '_self')">Entrar</button>
                <?php endif;?>
            </div>
        </div>
        <div class="content">
            <?php include $page;?>
        </div>
        <div class="footer">
        </div>
    </div>


</body>
</html>
