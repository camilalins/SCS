<?php /** @var TYPE_NAME $erro */?>
<?php /** @var TYPE_NAME $mensagem */?>

<section class="container py-5" id="container-solicitacoes-cadastro">

    <h1>Cadastro Cliente</h1>

    <form action="/clientes/cadastrar" method="post">
        <fieldset>

            <div class="<?=$erro?"error":"success"?>"><?=$erro?:$mensagem?></div>
            <div>
                <label for="cliente">Cliente</label>
                <input type="text" name="nome">
            </div>
            <div>
                <label for="cnpj">CNPJ</label>
                <input type="text" name="cnpj">
            </div>
            <div>
                <button>Salvar</button>&nbsp;
                <a href="/clientes">Ir para clientes</a>
            </div>
        </fieldset>
    </form>

</section>