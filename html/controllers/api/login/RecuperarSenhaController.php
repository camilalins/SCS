<?php

namespace controllers\api\login;

use core\controllers\ApiBaseController;
use services\login\LoginService;

/**
 * @Route("/api/recuperar-senha")
 */
class RecuperarSenhaController extends ApiBaseController {

    /**
     * @var LoginService
     */
    private $loginService = LoginService::class;

    /**
     * @Post()
     */
    public function recuperar() {

        try {

            $this->loginService::recuperarSenha(body("email"));

            response(sys_messages(MSG_RECOV_INFO_A001));
        }
        catch (RequiredDataException $e) { print_r($e); die();
            response($e->getMessage(), 400);
        }
        catch (\Exception $e) { print_r($e); die();
            response(sys_messages(MSG_RECOV_ERR_A002, $e->getMessage()), 400);
        }
    }

}
