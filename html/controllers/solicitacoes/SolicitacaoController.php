<?php
namespace controllers\solicitacoes;

use core\controllers\security\AuthorizedController;
use core\repo\Repositorio;
use models\ClienteForm;
use PHPMailer\PHPMailer\Exception;
use repo\ClienteRepositorio;

/**
 * @Route("/solicitacoes")
 */
class SolicitacaoController extends AuthorizedController {

    /**
     * @Get()
     */
    public function index() {

        view("solicitacoes/pesquisa.php");
    }

    /**
     * @Get("/selecionar")
     */
    public function selecionarClientes(){

        view("solicitacoes/pesquisa-cliente.php");
    }

    /**
     * @Get("/form/{id}")
     */
    public function formCliente(){

        try {

            $id = path("id");

            if(!$id) throw new \Exception(sys_messages(MSG_VALID_ERR_A001));

            $repoForm = new Repositorio(ClienteForm::class);
            $form = $repoForm->obterPrimeiro([ "clienteId" => $id ]);

            $repoCliente = new ClienteRepositorio();
            $cliente = $repoCliente->obterPorId($id);

            $formUrl = $form ? "forms/{$form->getNome()}" : "cadastro.php";

            view("solicitacoes/$formUrl", [ "cliente" => $cliente ]);
        }
        catch (\Exception) { viewGeneral(); }
    }

}
