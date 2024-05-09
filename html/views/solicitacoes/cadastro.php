<?php /** @var TYPE_NAME $erro */?>
<?php /** @var TYPE_NAME $mensagem */?>

<section class="container py-5" id="container-solicitacoes-cadastro">

    <h1>Cadastro</h1>

    <form action="/solicitacoes/cadastrar" method="post">
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
                <a href="/solicitacoes">Ir para solicitações</a>
            </div>
        </fieldset>
    </form>

</section>