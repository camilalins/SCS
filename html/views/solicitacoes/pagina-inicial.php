<?php /** @var TYPE_NAME $solicitacoes */?>

<h1>Solicitações</h1>

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

<script src="/public/index.js" type="module"></script>