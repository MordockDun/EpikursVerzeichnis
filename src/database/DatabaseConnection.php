<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 25.10.2018
 * Time: 20:36
 */

namespace EpikursVerzeichnis\database;

/**
 * Class DatabaseConnection
 * @package EpikursVerzeichnis\database
 * @implements DatabaseConnectionInterface
 */
class DatabaseConnection implements DatabaseConnectionInterface
{
    /** @var \PDO */
    private static $database;

    const SQLITE_FILE = __DIR__."/database.sqlite";


    public static function getConnection(){
        if(!isset(self::$database)){
            try {
                self::$database = new \PDO("sqlite:".self::SQLITE_FILE);

            } catch (\Exception $exception){
                throw $exception;
            }
        }

        return self::$database;
    }
}