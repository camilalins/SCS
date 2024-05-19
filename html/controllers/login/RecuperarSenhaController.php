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
        //response("Method not allowed", 405);
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

            // ATUALIZANDO SENHA
            $novaSenha = hash('adler32', uniqid(rand(), true));
            $usuario->setSenha(password_hash($novaSenha, PASSWORD_BCRYPT));
            $repo->atualizar($usuario);

            if(!send_mail($email, "Recuperação de senha",
                "<p>
                    Olá {$usuario->getNome()},
                    <br><br>
                    Sua nova senha é: <big>$novaSenha</big>.
                    <br><br>
                    Acesse o sistema <a href='".BASE_URL."login'>AQUI</a> para efetuar seu login.
                </p>"))
                throw new \Exception(send_mail_error());

            view("login/recuperar-senha.php", [ "mensagem" => sys_messages(MSG_RECOV_INFO_A001) ]);
        }
        catch (\Exception $e) {
            view("login/recuperar-senha.php", [ "erro" => $e->getMessage() ]);
        }
    }

}
