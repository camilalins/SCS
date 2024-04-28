<?php

function redirect($url) {
    header("Location: /$url");
    exit();
}

function view($path, $data=null){
    extract($data ?: []);
    include "../views/$path";
}