<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 27.10.2018
 * Time: 17:46
 */

use EpikursVerzeichnis\database\DatabaseConnection;
use EpikursVerzeichnis\database\DatabaseConnectionInterface;
use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase
{

    public function testGetConnection()
    {
        $dbConnection = DatabaseConnection::getConnection();


        $this->assertEquals(get_class($dbConnection),\PDO::class);
    }

    public function testInterfaceImplemented()
    {
        $this->assertTrue(in_array(DatabaseConnectionInterface::class,class_implements(DatabaseConnection::class)));
    }
}
