<?php
namespace controllers\api\clientes;

use core\controllers\security\ApiAuthorizedController;
use models\Cliente;
use models\enums\cliente\Status;
use repo\ClienteRepositorio;

/**
 * @Route("/api/clientes")
 */
class ClienteController extends ApiAuthorizedController {

    /**
     * @Get()
     */
    public function obterPorFiltro() {

        try {
            $body = query();

            if(!$body->nome && !$body->cnpj && !$body->email) throw new \Exception();

            $repo = new ClienteRepositorio();
            $clientes = $repo->obterPor([
                "nome" => like($body->nome),
                "cnpj" => $body->cnpj,
                "email" => like($body->email),
                "status" => Status::Ativo
            ], queryPagination());

            response($clientes);
        }
        catch (\Exception) { response([]); }

    }

    /**
     * @Post()
     */
    public function salvar() {

        try {

            $body = body();

            if(!$body->nome || !$body->cnpj) throw new \Exception(sys_messages(MSG_VALID_ERR_A001));
            $cliente = new Cliente($body->nome, $body->cnpj, Status::Ativo, $body->responsavel, $body->telefone, $body->email);
            $repo = new ClienteRepositorio();
            $repo->criar($cliente);

            response($cliente);
        }
        catch (\Exception $e) {
            response($e->getMessage(), 400);
        }

    }

}