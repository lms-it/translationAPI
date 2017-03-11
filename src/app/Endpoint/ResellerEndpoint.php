<?php

namespace App\Endpoint;

use App\Enum\Supported;
use App\Keys;
use App\Model\Language;
use App\Model\Reseller;
use App\Model\Translation;
use App\Persistence\Repository\LanguageRepository;
use App\Persistence\Repository\ResellerRepository;
use App\Persistence\Repository\TranslationRepository;

class ResellerEndpoint{

    function get($params){

        /* Param 1 expected to be reseller ID & param 2 expected to be language code e.g. dk
        *  Endpoint: e.g. domain/reseller/1/en
        */
        if(count($params) == 3 && $params[1]>0 && in_array($params[2], Supported::LANGUAGES)) {
            //get dk, if no, get default
            //Todo test existence of reseller
            $lang = new Language();
            $langRepo = new LanguageRepository($lang);
            $langId = $langRepo->getLangId($params[2]);

            if($langId>0){
                $translation = new Translation();
                $translationRepo = new TranslationRepository($translation);
                $result = $translationRepo->get($params[1], $langId);
            }
            else{
               $result = $this->getDefault($params[1]);
            }
        }
        elseif(count($params) >= 2 && $params[1]>0) {
            $result = $this->getDefault($params[1]);
        }
        else{
            $result = Keys::RESELLER_NOT_FOUND;
        }

        return $result;
    }
    
    function post($params){
        
    }

    function getDefault($id){
        $reseller = new Reseller();
        $resellerRepo = new ResellerRepository($reseller);
        return $resellerRepo->getDefaultText($id);
    }
}


