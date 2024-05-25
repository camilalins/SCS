<?php

namespace services\login;

use core\exceptions\RequiredDataException;
use repo\UsuarioRepositorio;

class LoginService {

    /**
     * Funcionalidade de recuperar senha com envio de e-mail de recuperação
     * @throws RequiredDataException
     * @throws MailException
     * @throws Exception
     */
    public static function recuperarSenha($email): void {

        // VALIDAÇÃO
        if (!$email)
            throw new RequiredDataException(sys_messages(MSG_VALID_ERR_A001));

        $repo = new UsuarioRepositorio();
        $usuario = $repo->obterPorEmail($email);
        if (!$usuario)
            throw new RequiredDataException(sys_messages(MSG_VALID_ERR_A002));

        if(MAIL_SMTP_ACTIVE == 1) {

            // ATUALIZA SENHA
            $novaSenha = hash('adler32', uniqid(rand(), true));
            $usuario->setSenha(password_hash($novaSenha, PASSWORD_BCRYPT));
            $repo->atualizar($usuario);

            // ENVIA EMAL DE RECUPERACAO
            if (!send_mail($email, "Recuperação de senha",
                "<p>
                    Olá {$usuario->getNome()},
                    <br><br>
                    Sua nova senha é: <big>$novaSenha</big>.
                    <br><br>
                    Acesse o sistema <a href='" . BASE_URL . "login'>AQUI</a> para efetuar seu login.
                </p>"))
                throw new MailException(send_mail_error());
        }
    }
}