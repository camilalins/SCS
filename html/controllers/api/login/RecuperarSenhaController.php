<?php

namespace controllers\api\login;

use core\controllers\ApiBaseController;

/**
 * @Route("/api/recuperar-senha")
 */
class RecuperarSenhaController extends ApiBaseController {

    public function get() {
        response("Method not allowed", 405);
    }

    public function post() {

        try {
            // OBTER DADOS
            $email = body("email"); die($email);

            // VALIDAÇÃO
            if (!$email)
                throw new \Exception(sys_messages(MSG_VALID_ERR_A001));

            $repo = new \repo\UsuarioRepositorio();
            $usuario = $repo->obterPorEmail($email);
            if (!$usuario)
                throw new \Exception(sys_messages(MSG_RECOV_ERR_A001));

            //TODO: ENVIAR E-MAIL DE RECUPREÇÃO DE SENHA
            if(!send_mail($email, "Recuperação de senha", "<p>Clique <a href='#'>aqui</a> para recuperação sua senha.</p>"))
                throw new \Exception(send_mail_error());

            view("login/recuperar-senha.php", [ "mensagem" => sys_messages(MSG_RECOV_INFO_A001) ]);
        }
        catch (\Exception $e) {
            view("login/recuperar-senha.php", [ "erro" => $e->getMessage() ]);
        }
    }

}
