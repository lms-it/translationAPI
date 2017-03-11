<?php

namespace App\Helper;
use App\Config;
use App\Keys;
use App\Persistence\Schema;

class MysqlHelper{

    private static $host;
    private static $database;
    private static $user;
    private static $password;
    private static $dbHandler;

    function __construct()
    {
        $this::$host = Config::HOST;
        $this::$database = Config::DATABASE;
        $this::$user = Config::USER;
        $this::$password = Config::PASSWORD;

        $this->connect();
    }

    function connect(){
        try {
            //connect to the database
            $this::$dbHandler = new \PDO("mysql:host=".$this::$host.";dbname=".$this::$database, $this::$user, 
                $this::$password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $this::$dbHandler->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            if ($this::$dbHandler) {
                //echo "Connected to the database successfully!\n";
            }
        }catch(\PDOException $e) {
            return Keys::ERROR_DB;
        }
    }

    function getData($table, $id, $col=null){
        try{
            $sth = $this::$dbHandler->prepare('SELECT * FROM '.$table.' where id=:id');
            $sth->bindValue(':id', $id, \PDO::PARAM_INT);
            $sth->execute();
            $row = $sth->fetch(\PDO::FETCH_OBJ);

            if($row){
                //todo refactor the query get only col if provided
                if(isset($col)){
                    return $row->$col;
                }
                else{
                    return $row;
                }
            }
            return Keys::ERROR_NOT_FOUND;
        }catch(\PDOException $e) {
            return Keys::ERROR_DB;
        }
    }

    function getId($table, $columnName, $columnValue){
        try{
            $sth = $this::$dbHandler->prepare('SELECT * FROM '.$table." where $columnName=:columnValue");
            $sth->bindValue(':columnValue', $columnValue, \PDO::PARAM_STR);
            $sth->execute();
            $row = $sth->fetch(\PDO::FETCH_OBJ);

            if($row){
               return $row->id;
            }
            return Keys::ERROR_NOT_FOUND;
        }catch(\PDOException $e) {
            return Keys::ERROR_DB;
        }
    }

    function getTranslation($table, $idReseller, $idLang){
        try{
            $sth = $this::$dbHandler->prepare("SELECT ".Schema::TRANSLATION_TEXT." FROM ".$table." 
            where ".Schema::TRANSLATION_RESELLER_ID."=:idReseller
            and ".Schema::TRANSLATION_LANGUAGE_ID."=:idLang");
            $sth->bindValue(':idReseller', $idReseller, \PDO::PARAM_INT);
            $sth->bindValue(':idLang', $idLang, \PDO::PARAM_INT);
            $sth->execute();
            $row = $sth->fetch(\PDO::FETCH_OBJ);

            if($row){
                return $row->text;
            }
            return Keys::ERROR_NOT_FOUND;
        }catch(\PDOException $e) {
            return Keys::ERROR_DB;
        }
    }

    function close(){
        //Close connection
        $this::$dbHandler = null;
        echo "closed\n";
    }
}