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


    }

}