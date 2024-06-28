<?php
namespace controllers\api\solicitacoes;

use core\controllers\security\ApiAuthorizedController;
use models\Solicitacao;
use repo\SolicitacaoRepositorio;

/**
 * @Route("/api/solicitacoes")
 */
class SolicitacaoController extends ApiAuthorizedController {

    /**
     * @Get()
     */
    public function obterPorFiltroSolicitacao() {

        try {
            $body = query();

            if(!$body->data && !$body->cliente && !$body->placa) throw new \Exception();

            $repo = new SolicitacaoRepositorio();

            $solicitacoes = $repo->obterPor([
                "data" => like( $body->data ),
                "cliente.nome" => like( $body->cliente ),
                "placa" => like( $body->placa )
            ], queryPagination());

            response($solicitacoes);
        }
        catch (\Exception) { response([]); }

    }

    /**
     * @Post()
     */
    public function salvar() {

        try {

            $body = body();

            if(!$body->data || !$body->clienteId || !$body->placa || !$body->operacao || !$body->status) throw new \Exception(sys_messages(MSG_VALID_ERR_A001));

            $solicitacao = new Solicitacao($body->clienteId, $body->data, $body->placa, $body->operacao, $body->status);
            $repo = new SolicitacaoRepositorio();
            $solicitacao = $repo->criar($solicitacao);
//            $dto = ["clienteId" => $body->clienteId, "data" => $body->data, "placa" => $body->placa, "operadocao" => $body->operacao, "status" => $body->status];
//            $solicitacao = $repo->criar($dto);

            response($solicitacao);
        }
        catch (\Exception $e) {
            response($e->getMessage(), 400);
        }

    }

}