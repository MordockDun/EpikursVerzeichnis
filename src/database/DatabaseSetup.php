<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 28.10.2018
 * Time: 14:02
 */

namespace EpikursVerzeichnis\database;


class DatabaseSetup
{
    /** @var DatabaseConnection */
    private $dbConnection;

    public function __construct()
    {
        $this->dbConnection = DatabaseConnection::getConnection();
    }

    public function listTables(){

        $sql = "SELECT * FROM sqlite_master WHERE type='table'";
        /** @var \PDOStatement $result */
        $result = $this->dbConnection->query($sql);


        $rows = [];
        if($result){
            $rows = $result->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $rows;
    }

    public function createTable(){
        $sql = "CREATE TABLE `test` (`id` INT NOT NULL)";

        try {
            $this->dbConnection->query($sql);
        } catch (\Exception $exception){
            echo $exception->getMessage();
        }
    }
}