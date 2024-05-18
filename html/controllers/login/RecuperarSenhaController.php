<?php

namespace controllers\login;

use core\controllers\BaseController;

/**
 * @Route("/recuperar-senha")
 */
class RecuperarSenhaController extends BaseController {

    public function get() {
        view("login/recuperar-senha.php");
    }

    public function post() {

        try {
            // OBTER DADOS
            $email = body("email");

            // VALIDAÇÃO
            if (!$email) {
                throw new \Exception(sys_messages(MSG_VALID_ERR_A001));
            }

            $repo = new \repo\UsuarioRepositorio();
            $usuario = $repo->obterPorEmail($email);
            if (!$usuario) {
                throw new \Exception(sys_messages(MSG_RECOV_ERR_A001));
            }

            // TODO: ENVIAR E-MAIL DE RECUPERACAO DE SENHA
            if (!send_mail($email, "Recuperação de senha", "<p>Clique <a href='#'>aqui</a> para recuperação sua senha.</p>")) {
                throw new \Exception(send_mail_error());
            }

            // Retornar resposta JSON de sucesso
            echo json_encode([
                "message" => sys_messages(MSG_RECOV_INFO_A001)
            ]);
        }
        catch (\Exception $e) {
            // Retornar resposta JSON de erro
            echo json_encode([
                "error" => $e->getMessage()
            ]);
        }
    }
}
?>
