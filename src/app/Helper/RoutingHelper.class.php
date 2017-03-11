<?php

namespace App\Helper;

use App\Endpoint\ResellerEndpoint;
use App\Http\Routes;
use App\Keys;
use App\Model\Language;
use App\Persistence\Repository\LanguageRepository;

class RoutingHelper{

    private $requestUrl;
    private $requestMethod;
    private $endpoint;
    private $urlParams;

    function __construct($requestUrl, $requestMethod = "GET"){
        $this->requestUrl = $requestUrl;
        $this->requestMethod = $requestMethod;


    }

    function run(){
        $this->getUrl();
        $this->findEndpoint();
        $this->route();
    }

    public function getUrl() {
        $parts = explode("/", $this->requestUrl);
        $urlParameters = array_slice($parts, 1);
        //Filter empty '' params sliced by "/" and rebase array indexes
        $urlParameters = array_values(array_filter($urlParameters, create_function('$param','return preg_match("#\S#", $param);')));

        $this->urlParams = $urlParameters;
        $this->endpoint = $urlParameters[0];
    }

    public function findEndpoint(){
        switch($this->endpoint){
            case Routes::ROUTING_RESELLER:
                $this->endpoint = new ResellerEndpoint();
                break;
            //More endpoints ..
            default:
                //Create HTTP Helper to handle headers
                header(Keys::CONTENT_JSON);
                header("HTTP/1.1 404".Keys::ERROR_NOT_FOUND);
                echo json_encode([Keys::ERROR => $this->endpoint." ".Keys::ERROR_NOT_FOUND]);
                exit;
        }
    }

    public function route() {

        switch(strtolower($this->requestMethod))
        {
            case Keys::HTTP_GET:
                $result = $this->endpoint->get($this->urlParams);
                break;
            //POST, DELETE ..
            default:
                header(Keys::CONTENT_JSON);
                header("HTTP/1.1 405".Keys::ERROR_METHOD_NOT_ALLOWED);
                echo json_encode([Keys::ERROR => $this->requestMethod." ".Keys::ERROR_METHOD_NOT_ALLOWED]);
                exit;
        }

        header(Keys::CONTENT_JSON);
        echo json_encode([Keys::SUCCESS => $result]);
    }
}