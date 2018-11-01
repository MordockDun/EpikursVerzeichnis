<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 28.10.2018
 * Time: 14:06
 */

use EpikursVerzeichnis\database\DatabaseSetup;
use PHPUnit\Framework\TestCase;

class DatabaseSetupTest extends TestCase
{

    public function testListTables()
    {
        $dbSetup = new DatabaseSetup();
        $result = $dbSetup->listTables();

        print_r($result);

        $this->assertTrue(true);
    }

    public function testCreateTable(){
        $dbSetup = new DatabaseSetup();
        $result = $dbSetup->createTable();

        print_r($result);

        $result = $dbSetup->listTables();

        print_r($result);

        $this->assertTrue(true);
    }
}
