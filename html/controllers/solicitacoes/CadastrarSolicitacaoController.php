<?php
namespace controllers\solicitacoes;

require_once "core/controllers/BaseController.php";
require_once "repo/SolicitacaoRepositorio.php";

/**
 * @Route("solicitacoes/cadastrar")
 */
class CadastrarSolicitacaoController extends \core\controllers\BaseController {

    function get(){

        view("/solicitacoes/cadastro.php");
    }

    function post(){

        try {

            $cliente = body("cliente");
            $placa = body("placa");

            if (!$cliente || !$placa)
                throw new \Exception("Preencha os campos obrigatórios");

            $solicitacaoDto = (object)[
                "data" => now(),
                "cliente" => $cliente,
                "placa" => $placa
            ];
            $repo = new \repo\SolicitacaoRepositorio();
            $solicitacao = $repo->criar($solicitacaoDto);

            view("solicitacoes/cadastro.php", [ "mensagem" => "Solicitação cadastrada com sucesso!", "solicitacao" => $solicitacao ]);
        }
        catch (\Exception $e) {

            view("solicitacoes/cadastro.php", [ "erro" => $e->getMessage() ]);
        }
    }

}