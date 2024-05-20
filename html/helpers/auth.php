<?php

use models\Usuario;

/**
 * @return Usuario|null
 */
function user(): ?Usuario {

    return $_SESSION[USER] ? unserialize($_SESSION[USER]) : null;
}

/**
 * @throws Exception
 */
function authenticate(Usuario $usuario=null): void {

    if(!$usuario) throw new Exception(sys_messages(MSG_AUTH_ERR_A001));

    $_SESSION[USER] = serialize($usuario);
}

function validateCsrfToken(): bool {

    try {
        if ($_SERVER["REQUEST_METHOD"] == "GET") return true;

        $token = body(TOKEN).cookie(TOKEN).getallheaders()[ucfirst(TOKEN)];

        if(!$token) throw new Exception(sys_messages(MSG_AUTH_ERR_A002));

        if(!password_verify(SESSION_SECRET, $token)) throw new Exception(sys_messages(MSG_AUTH_ERR_A003));

        return true;
    }
    catch (Exception) {
        return false;
    }
}


