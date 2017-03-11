<?php

namespace App\Model;

use App\Persistence\Schema;

class Reseller extends AbstractModel{

    public $default_text;
    
    public function __construct()
    {
        parent::__construct();
        $this->default_text = Schema::RESELLER_TEXT;
    }

    protected function getTable()
    {
        return Schema::RESELLER_TABLE;
    }
}