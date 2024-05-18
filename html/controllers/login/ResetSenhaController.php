<?php

namespace controllers\login;

use core\controllers\BaseController;
use repo\UsuarioRepositorio;

/**
 * @Route("/recuperar-senha")
 */
class ResetSenhaController extends BaseController {

    public function get() {
        view("login/reset-senha.php");
    }


}
?>
