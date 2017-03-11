<?php

namespace App\Model;

use App\Persistence\Schema;

class Language extends AbstractModel{

    public $lang_code;

    public function __construct()
    {
        parent::__construct();
        $this->lang_code = Schema::LANGUAGE_CODE;
    }

    protected function getTable()
    {
        return Schema::LANGUAGE_TABLE;
    }
}