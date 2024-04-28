<?php

include_once "../core/BaseController.php";
require_once "../repo/UserRepositorio.php";

class RecuperarSenhaController extends BaseController
{
    public function get()
    {
        view("/login/recuperar-senha.php");
    }

    public function post()
    {
        try {
            // OBTER DADOS
            $email = $_POST["email"];

            // VALIDAÇÃO
            if (empty($email)) {
                // Se o e-mail estiver vazio, lance uma exceção
                throw new Exception("O campo não pode estar vazio");
            } else {
                $userRepo = new UserRepositorio();
                // Verificação da existência do e-mail
                if ($userRepo->encontrarEmail($email)) {
                    // E-mail encontrado
                    echo "E-mail encontrado";
                } else {
                    // E-mail não encontrado, defina a mensagem de erro
                    $erro = "E-mail não encontrado";
                    throw new Exception("E-mail não encontrado");
                }
            }
        } catch (Exception $e) {
            view("/login/recuperar-senha.php", [ "erro" => $e->getMessage() ]);
        }
    }

} new RecuperarSenhaController();
