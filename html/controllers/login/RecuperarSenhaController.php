<?php

namespace controllers\login;

require_once "core/controllers/BaseController.php";
require_once "repo/UsuarioRepositorio.php";

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
            $email = $_POST["email"];

            // VALIDAÇÃO
            if (!$email)
                throw new \Exception("O campo não pode estar vazio");

            $repo = new \repo\UsuarioRepositorio();
            $usuario = $repo->buscarPorEmail($email);
            if (!$usuario)
                throw new \Exception("E-mail encontrado");

            //TODO: ENVIAR E-MAIL DE RECUPREÇÃO DE SENHA
            if(!send_mail($email, "Recuperação de senha", "<p>Clique <a href='#'>aqui</a> para recuperação sua senha.</p>"))
                throw new \Exception(send_mail_error());

            view("login/recuperar-senha.php", [ "mensagem" => "E-mail de recupração enviado com sucesso." ]);
        }
        catch (\Exception $e) {
            view("login/recuperar-senha.php", [ "erro" => $e->getMessage() ]);
        }
    }

}
