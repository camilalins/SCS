<?php

namespace controllers;

include_once "../core/BaseController.php";
require_once "../repo/UsuarioRepositorio.php";

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
            if (!$email)
                throw new Exception("O campo não pode estar vazio");

            $repo = new \repositorios\UsuarioRepositorio();
            $usuario = $repo->buscarPorEmail($email);
            if (!$usuario)
                throw new Exception("E-mail encontrado");

            //TODO: ENVIAR E-MAIL DE RECUPREÇÃO DE SENHA
            if(!send_mail("maxmmartini@gmail.com", "TESTE", "TESTE"))
                echo send_mail_error();

        } catch (Exception $e) {
            view("/login/recuperar-senha.php", [ "erro" => $e->getMessage() ]);
        }
    }

} new RecuperarSenhaController();
