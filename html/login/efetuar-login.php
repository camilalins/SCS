<?php

include_once "../core/BaseController.php";
include_once "../http/helpers.php";
require_once "../repo/UserRepositorio.php";

class EfetuarLoginController extends BaseController {

    public function get(){

        view("/login/login.php");
    }

    public function post() {

        try {
            // OBTER DADOS
            $email = $_POST["email"];
            $password = $_POST["password"];

            // VALIDAÇÃO
            if (empty($email) || empty($password)) {
                // Se o e-mail ou a senha estiverem vazios, lance uma exceção
                throw new Exception("Os campos não podem estar vazios");
            } else {
                $userRepo = new UserRepositorio();
                // Verificação das credenciais
                $user = $userRepo->verifyLogin($email, $password);

                if ($user) {
                    // Login bem-sucedido, redireciona para a página principal
                    redirect("/solicitacoes/apresentar.php");
                } else {
                    // Credenciais inválidas, defina a mensagem de erro
                    $erro = "Usuário e/ou senha inválidos";
                    throw new Exception("Login e/ou senha inválidos");
                }
            }
        }
        catch (Exception $e) {

            view("/login/login.php", [ "erro" => $e->getMessage() ]);
        }
    }

} new EfetuarLoginController();