<?php
namespace App\Persistence\Repository;

use App\Model\Language;
use App\Persistence\Schema;

class LanguageRepository extends ResourceRepository
{

    public function __construct(Language $language)
    {
        $this->model = $language;
    }

    public function getLangId($lang)
    {
        return $this->model->getIdByCol(Schema::LANGUAGE_CODE, $lang);
    }
}