<?php
namespace controllers\solicitacoes;

use core\controllers\security\AuthorizedController;

/**
 * @Route("solicitacoes/cadastrar")
 */
class CadastrarSolicitacaoController extends AuthorizedController {

    function get(){

        view("/solicitacoes/cadastro.php");
    }

    function post(){

        try {

            $cliente = body("cliente");
            $placa = body("placa");

            if (!$cliente || !$placa)
                throw new \Exception(sys_messages(MSG_VALID_ERR_A001));

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