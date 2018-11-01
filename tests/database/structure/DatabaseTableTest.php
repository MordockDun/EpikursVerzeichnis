<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 01.11.2018
 * Time: 15:26
 */

use EpikursVerzeichnis\database\structure\DatabaseField;
use EpikursVerzeichnis\database\structure\DatabaseIndex;
use EpikursVerzeichnis\database\structure\DatabaseTable;
use PHPUnit\Framework\TestCase;

class DatabaseTableTest extends TestCase
{

    public function testAddField()
    {
        $value = new DatabaseField();
        $value->setName("TestField");
        $value->setType(DatabaseField::DATABASEFIELD_TYPE_STRING);
        $value->setLength(10);

        $dbTable = new DatabaseTable();

        $dbTable->addField($value);

        $this->assertEquals([$value],$dbTable->getFieldList());
    }
    public function testAddFieldExceptionWithEmptyField()
    {
        $this->expectException(\InvalidArgumentException::class);
        $value = new DatabaseField();

        $dbTable = new DatabaseTable();
        $dbTable->addField($value);
    }

    public function testAddFieldExceptionWithMissingParameter()
    {
        $this->expectException(\InvalidArgumentException::class);

        $value = new DatabaseField();
        $value->setName("TestField");

        $dbTable = new DatabaseTable();
        $dbTable->addField($value);
    }

    public function testSetFieldList()
    {
        $value1 = new DatabaseField();
        $value1->setName("TestField");
        $value1->setType(DatabaseField::DATABASEFIELD_TYPE_STRING);
        $value1->setLength(10);

        $value2 = new DatabaseField();
        $value2->setName("TestField2");
        $value2->setType(DatabaseField::DATABASEFIELD_TYPE_INT);
        $value2->setLength(11);

        $fieldList = [$value1,$value2];

        $dbTable = new DatabaseTable();

        $dbTable->setFieldList($fieldList);

        $this->assertEquals($fieldList,$dbTable->getFieldList());
    }
    public function testSetFieldListException()
    {
        $this->expectException(\InvalidArgumentException::class);

        $value = [];

        $dbTable = new DatabaseTable();
        $dbTable->setFieldList($value);
    }

    public function testSetName()
    {
        $value = "testName";
        $dbTable = new DatabaseTable();

        $dbTable->setName($value);

        $this->assertEquals($value,$dbTable->getName());
    }
    public function testSetNameException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $value = "";
        $dbTable = new DatabaseTable();

        $dbTable->setName($value);
    }

    public function testAddIndex()
    {
        $index = new DatabaseIndex();
        $index->setName("testIndex");
        $index->setType(DatabaseIndex::DATABASE_INDEX_TYPE_PRIMARY);
        $index->addToFieldList("TestField");

        $dbTable = new DatabaseTable();
        $dbTable->addIndex($index);

        $this->assertEquals([$index],$dbTable->getIndexList());
    }
    public function testAddIndexExceptionWithEmptyField()
    {
        $this->expectException(\InvalidArgumentException::class);
        $value = new DatabaseIndex();

        $dbTable = new DatabaseTable();
        $dbTable->addIndex($value);
    }
    public function testAddIndexExceptionWithMissingPparameter()
    {
        $this->expectException(\InvalidArgumentException::class);

        $value = new DatabaseIndex();
        $value->setName("TestField");

        $dbTable = new DatabaseTable();
        $dbTable->addIndex($value);
    }

    public function testSetIndexList()
    {
        $index1 = new DatabaseIndex();
        $index1->setName("testIndex");
        $index1->setType(DatabaseIndex::DATABASE_INDEX_TYPE_PRIMARY);
        $index1->addToFieldList("TestField");

        $index2 = new DatabaseIndex();
        $index2->setName("testIndex2");
        $index2->setType(DatabaseIndex::DATABASE_INDEX_TYPE_UNIQUE);
        $index2->addToFieldList("TestField Unique");

        $indexList =[$index1,$index2];

        $dbTable = new DatabaseTable();
        $dbTable->setIndexList($indexList);

        $this->assertEquals($indexList,$dbTable->getIndexList());
    }
    public function testSetIndexListException()
    {
        $this->expectException(\InvalidArgumentException::class);

        $value = [];

        $dbTable = new DatabaseTable();
        $dbTable->setIndexList($value);
    }
}
