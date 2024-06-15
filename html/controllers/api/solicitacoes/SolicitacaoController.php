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
                "data" => like($body->data),
                "cliente" => like($body->cliente),
                "placa" => like($body->placa)
            ], 50);

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

            if(!$body->data || !$body->cliente || !$body->placa) throw new \Exception(sys_messages(MSG_VALID_ERR_A001));
            $solicitacao = new Solicitacao($body->data, $body->cliente, $body->placa);
            $repo = new SolicitacaoRepositorio();
            $repo->criar($solicitacao);

            response("Solicitação cadastrada com sucesso");
        }
        catch (\Exception $e) {
            response($e->getMessage(), 400);
        }

    }

}