<?php /** @var TYPE_NAME $solicitacoes */?>

<section class="container py-5" id="container-solicitacoes">

    <h1>Solicitações</h1>

    <br>

    <form action="/solicitacoes" method="post">

        <fieldset>

            <legend>Pesquisar solicitações</legend>

            <div>
                <input type="text" class="" name="cliente" id="cliente" placeholder="Nome do cliente" size="40">

                <button>Pesquisar</button>
            </div>

        </fieldset>

    </form>

    <br>

    <button onclick="window.open('/solicitacoes/cadastrar', '_self')">Criar</button> <br>

    <br>

    <div id="result">
        <?php foreach ($solicitacoes as $s):?>
            <div style="border: 1px solid #ccc; width: 300px; padding: 10px; display: flex">
                <div style="width: 50px"><?=$s->id?></div>
                <div style="width: 150px"><?=$s->cliente?></div>
                <div style="width: 150px"><?=$s->placa?></div>
            </div>
        <?php endforeach;?>
    </div>

</section>