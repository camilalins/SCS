<?php

function b64JsonEncode($data): string {
    return base64_encode(json_encode($data));
}

function pagination($p, $ps, $defPs=50) {

    return $p ? ( $ps ? [ ($p*$ps-$ps), $ps ] : [ ($p*$defPs-$defPs), $defPs ] ) : $defPs;
}

function queryPagination() {

    return pagination(query("p"), query("ps"));
}

function bodyPagination() {

    return pagination(body("p"), body("ps"));
}


