<?php

use models\Usuario;

function user(): ?Usuario{

    return $_SESSION[USER] ? unserialize($_SESSION[USER]) : null;
}

function authenticate(Usuario $usuario=null): void {

    if(!$usuario)
        throw new Exception(sys_messages(MSG_AUTH_ERR_A001));

    $_SESSION[USER] = serialize($usuario);
}


