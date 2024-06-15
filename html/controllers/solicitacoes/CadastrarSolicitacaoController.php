<?php
namespace controllers\solicitacoes;

require_once "core/controllers/BaseController.php";
require_once "repo/SolicitacaoRepositorio.php";

/**
 * @Route("solicitacoes/cadastrar")
 */
class CadastrarSolicitacaoController extends \core\controllers\BaseController {

    /**
     * @Get()
     */
    function get(){

        view("/solicitacoes/cadastro.php");
    }

    /**
     * @Get(getAllClientes)
     */

    function post(){

        try {
            error_log("Formulário submetido");

            $data = body("data");
            $cliente = body("cliente");
            $placa = body("placa");


            if (!$data || !$cliente || !$placa)
                throw new \Exception("Preencha os campos obrigatórios");

            $solicitacaoDto = (object)[
                "data" => $data(),
                "cliente" => $cliente,
                "placa" => $placa
            ];
            $repo = new \repo\SolicitacaoRepositorio();
            $solicitacao = $repo->criar($solicitacaoDto);

            view("solicitacoes/cadastro.php", [ "mensagem" => "Solicitação cadastrada com sucesso!", "solicitacao" => $solicitacao ]);
        }
        catch (\Exception $e) {
            error_log($e->getMessage());
            view("solicitacoes/cadastro.php", [ "erro" => $e->getMessage() ]);
        }
    }

}