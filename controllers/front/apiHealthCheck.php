<?php

use PrestaShop\Module\PrestashopFacebook\Repository\ServerInformationRepository;

class ps_FacebookApiHealthCheckModuleFrontController extends ModuleFrontController
{
    /** @var Ps_facebook */
    public $module;

    /**
     * @return void
     */
    public function postProcess()
    {
        /** @var ServerInformationRepository $serverInformationRepository */
        $serverInformationRepository = $this->module->getService(ServerInformationRepository::class);

        $status = $serverInformationRepository->getHealthCheckData();

        $this->exitWithResponse($status);
    }

    /**
     * @param array $response
     *
     * @return void
     */
    protected function exitWithResponse(array $response)
    {
        $httpCode = isset($response['httpCode']) ? (int) $response['httpCode'] : 200;

        $this->dieWithResponse($response, $httpCode);
    }

    /**
     * @param array $response
     * @param int $code
     *
     * @return void
     */
    private function dieWithResponse(array $response, $code)
    {
        $httpStatusText = "HTTP/1.1 $code";
        $response['httpCode'] = (int) $code;

        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        header('Content-Type: application/json;charset=utf-8');
        header($httpStatusText);

        echo json_encode($response, JSON_UNESCAPED_SLASHES);

        exit;
    }
}