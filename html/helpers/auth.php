<?php

use models\Usuario;

/**
 * @return Usuario|null
 */
function user(): ?Usuario {

    try {
        if (!$_SESSION[USER]) throw new Exception();

        return unserialize($_SESSION[USER]);
    }
    catch (Exception) { return null; }
}

/**
 * @throws Exception
 */
function authenticate(Usuario $usuario=null): void {

    if(!$usuario) throw new Exception(sys_messages(MSG_AUTH_ERR_A001));

    $_SESSION[USER] = serialize($usuario);
}


