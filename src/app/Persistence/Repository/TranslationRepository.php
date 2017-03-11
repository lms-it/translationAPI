<?php
/**
 * MONO SOLUTIONS RESELLER API
 *
 * @Developed by Mohamed Salem Lamiri
 * @version 1.0
 *
 **/

namespace App\Persistence\Repository;
use App\Model\Translation;


//Extends abstract ResourceRepository class

class TranslationRepository extends ResourceRepository {

    public function __construct(Translation $translation)
    {
        $this->model = $translation;
    }

    public function get($idReseller, $idLang)
    {
        return $this->model->getTranslation($idReseller, $idLang);
    }
}