<?php

namespace App\Model;

use App\Helper\MysqlHelper;

abstract class AbstractModel implements Model{
    
    protected $mysqlHelper;

    function __construct()
    {
        $this->mysqlHelper = new MysqlHelper();
    }

    protected abstract function getTable();

    function getByID($id){
        return $this->mysqlHelper->getData(
            $this->getTable(),
            $id
        );
    }
    
    function getColById($id, $col){
        return $this->mysqlHelper->getData(
            $this->getTable(),
            $id,
            $col
        );
    }

    function getIdByCol($columnName, $columnValue){
        return $this->mysqlHelper->getId(
            $this->getTable(),
            $columnName,
            $columnValue
        );
    }

    function getTranslation($idReseller, $idLang){
        return $this->mysqlHelper->getTranslation(
            $this->getTable(),
            $idReseller,
            $idLang
        );
    }

    function delete($id){
        
    }
    
    function create(Array $inputs){
        
    }
    
    function update(Array $inputs){
        
    }
    
}
