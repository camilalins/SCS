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
            $email = body("email");

            // VALIDAÇÃO
            if (!$email)
                throw new \Exception(sys_messages(MSG_VALID_ERR_A001));

            $repo = new \repo\UsuarioRepositorio();
            $usuario = $repo->obterPorEmail($email);
            if (!$usuario)
                throw new \Exception(sys_messages(MSG_RECOV_ERR_A001));
            /*
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
            */
            response([ "mensagem" => sys_messages(MSG_RECOV_INFO_A001) ]);
        }
        catch (\Exception $e) {
            response([ "erro" => sys_messages(MSG_RECOV_ERR_A002, $e->getMessage()) ], 400);
        }
    }

}
