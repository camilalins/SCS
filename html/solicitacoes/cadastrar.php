<?php
namespace controllers\login;

use Exception;

include_once "../core/BaseController.php";
include_once "../repo/SolicitacaoRepositorio.php";

class CadastrarSolicitacaoController extends \controllers\core\BaseController {

    function get(){

        view("/solicitacoes/cadastro.php");
    }

    function post(){

        try {

            $cliente = body("cliente");
            $placa = body("placa");

            if (!$cliente || !$placa)
                throw new Exception("Preencha os campos obrigatórios");

            $solicitacaoDto = (object)[
                "data" => now(),
                "cliente" => $cliente,
                "placa" => $placa
            ];
            $repo = new \repositorios\SolicitacaoRepositorio();
            $solicitacao = $repo->criar($solicitacaoDto);

            view("solicitacoes/cadastro.php", [ "mensagem" => "Solicitação cadastrada com sucesso!", "solicitacao" => $solicitacao ]);
        }
        catch (Exception $e) {

            view("solicitacoes/cadastro.php", [ "erro" => $e->getMessage() ]);
        }
    }

} new CadastrarSolicitacaoController();