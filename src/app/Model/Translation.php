<?php

namespace App\Model;

use App\Persistence\Schema;

class Translation extends AbstractModel{
    public $lang_code;

    public function __construct()
    {
        parent::__construct();
        $this->lang_code = Schema::RESELLER_TEXT;
    }

    protected function getTable()
    {
        return Schema::TRANSLATION_TABLE;
    }

}