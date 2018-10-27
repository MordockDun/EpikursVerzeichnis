<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 27.10.2018
 * Time: 17:44
 */

namespace EpikursVerzeichnis\database;

/**
 * Interface DatabaseConnectionInterface
 * Singleton für Datenbankverbindungen
 * @package EpikursVerzeichnis\database
 */
interface DatabaseConnectionInterface {
    /**
     * Singleton. Returns new or existing Databaseconnection
     * @return \PDO|\mysqli
     * @throws \Exception
     */

    public static function getConnection();
}