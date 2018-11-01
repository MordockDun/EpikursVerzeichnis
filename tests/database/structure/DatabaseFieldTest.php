<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 01.11.2018
 * Time: 08:59
 */

use EpikursVerzeichnis\database\structure\DatabaseField;
use PHPUnit\Framework\TestCase;

class DatabaseFieldTest extends TestCase
{


    public function testSetName()
    {
        $value = "testName";
        $dbField = new DatabaseField();

        $dbField->setName($value);

        $this->assertEquals($value,$dbField->getName());
    }
    public function testSetNameException()
    {
        $this->expectException(\InvalidArgumentException::class);

        $value = "";
        $dbField = new DatabaseField();

        $dbField->setName($value);
    }


    public function testSetTypeBool()
    {
        $value = DatabaseField::DATABASEFIELD_TYPE_BOOL;
        $dbField = new DatabaseField();

        $dbField->setType($value);

        $this->assertEquals($value,$dbField->getType());
    }
    public function testSetTypeInt()
    {
        $value = DatabaseField::DATABASEFIELD_TYPE_INT;
        $dbField = new DatabaseField();

        $dbField->setType($value);

        $this->assertEquals($value,$dbField->getType());
    }
    public function testSetTypeString()
    {
        $value = DatabaseField::DATABASEFIELD_TYPE_STRING;
        $dbField = new DatabaseField();

        $dbField->setType($value);

        $this->assertEquals($value,$dbField->getType());
    }
    public function testSetTypeText()
    {
        $value = DatabaseField::DATABASEFIELD_TYPE_text;
        $dbField = new DatabaseField();

        $dbField->setType($value);

        $this->assertEquals($value,$dbField->getType());
    }
    public function testSetTypeException()
    {
        $this->expectException(\InvalidArgumentException::class);

        $value = 0;
        $dbField = new DatabaseField();

        $dbField->setType($value);
    }

    public function testSetLength()
    {
        $value = 1;
        $dbField = new DatabaseField();

        $dbField->setLength($value);

        $this->assertEquals($value,$dbField->getLength());
    }
    public function testSetLengthException()
    {
        $this->expectException(\InvalidArgumentException::class);

        $dbField = new DatabaseField();

        $dbField->setLength(-1);
    }
}
