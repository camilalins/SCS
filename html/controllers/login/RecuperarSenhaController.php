<?php

namespace controllers\login;

/**
 * @Route("/recuperar-senha")
 */
class RecuperarSenhaController extends \core\controllers\BaseController {

    public function get() {
        view("login/recuperar-senha.php");
    }

    public function post() {

        try {
            // OBTER DADOS
            $email = body("email");

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
