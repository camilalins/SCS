<?php
namespace controllers\clientes;

require_once "core/controllers/BaseController.php";
require_once "repo/ClienteRepositorio.php";

/**
 * @Route("clientes/cadastrar")
 */
class CadastrarClienteController extends \core\controllers\BaseController {

    /**
     * @Get()
     */
    function get(){

        view("clientes/cadastro.php");
    }

    function post(){

        try {
            error_log("Formulário submetido");

            $nome = body("nome");
            $cnpj = body("cnpj");
            $responsavel = body("responsavel");
            $telefone = body("telefone");
            $email = body("email");

            if (!$nome || !$cnpj || !$responsavel || !$telefone || !$email)
                throw new \Exception("Preencha os campos obrigatórios");

            $clienteDto = (object)[
                "nome" => $nome,
                "cnpj" => $cnpj,
                "responsavel" => $responsavel,
                "telefone" => $telefone,
                "email" => $email
            ];
            $repo = new \repo\ClienteRepositorio();
            $cliente = $repo->criar($clienteDto);

            view("cliente/pesquisa.php", [ "mensagem" => "Solicitação cadastrada com sucesso!", "cliente" => $cliente ]);
        }
        catch (\Exception $e) {
            error_log($e->getMessage());
            view("cliente/pesquisa.php", [ "erro" => $e->getMessage() ]);
        }
    }

}