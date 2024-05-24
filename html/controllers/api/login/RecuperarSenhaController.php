<?php

namespace controllers\api\login;

use core\controllers\ApiBaseController;
use core\exceptions\RequiredDataException;
use repo\UsuarioRepositorio;

/**
 * @Route("/api/recuperar-senha")
 */
class RecuperarSenhaController extends ApiBaseController {

    /**
     * @Post()
     */
    public function enviarEmail() {

        try {
            // OBTER DADOS
            $email = body("email");

            // VALIDAÇÃO
            if (!$email)
                throw new RequiredDataException(sys_messages(MSG_VALID_ERR_A001));

            $repo = new UsuarioRepositorio();
            $usuario = $repo->obterPorEmail($email);
            if (!$usuario)
                throw new RequiredDataException(sys_messages(MSG_VALID_ERR_A002));

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

            response(sys_messages(MSG_RECOV_INFO_A001));
        }
        catch (RequiredDataException $e) {
            response($e->getMessage(), 400);
        }
        catch (\Exception $e) {
            response(sys_messages(MSG_RECOV_ERR_A002, $e->getMessage()), 400);
        }
    }

}
