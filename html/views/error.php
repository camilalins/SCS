<?php /** @var TYPE_NAME $statusCode */?>
<?php /** @var TYPE_NAME $responseText */?>

<div class="error-page">
    <?=$statusCode?><?=$responseText?" - ".$responseText:""?>
</div>
