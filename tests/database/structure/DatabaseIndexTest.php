<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 01.11.2018
 * Time: 09:23
 */

use EpikursVerzeichnis\database\structure\DatabaseIndex;
use PHPUnit\Framework\TestCase;

class DatabaseIndexTest extends TestCase
{

    public function testSetTypePrimary()
    {
        $value = DatabaseIndex::DATABASE_INDEX_TYPE_PRIMARY;
        $dbIndex = new DatabaseIndex();

        $dbIndex->setType($value);

        $this->assertEquals($value,$dbIndex->getType());
    }
    public function testSetTypeIndex()
    {
        $value = DatabaseIndex::DATABASE_INDEX_TYPE_INDEX;
        $dbIndex = new DatabaseIndex();

        $dbIndex->setType($value);

        $this->assertEquals($value,$dbIndex->getType());
    }
    public function testSetTypeUnique()
    {
        $value = DatabaseIndex::DATABASE_INDEX_TYPE_UNIQUE;
        $dbIndex = new DatabaseIndex();

        $dbIndex->setType($value);

        $this->assertEquals($value,$dbIndex->getType());
    }
    public function testSetTypeException()
    {
        $this->expectException(\InvalidArgumentException::class);

        $value = 0;
        $dbIndex = new DatabaseIndex();

        $dbIndex->setType($value);
    }

    public function testSetFieldList()
    {
        $value = ['field1','field2'];
        $dbIndex = new DatabaseIndex();

        $dbIndex->setFieldList($value);

        $this->assertEquals($value,$dbIndex->getFieldList());
    }
    public function testSetFieldListException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $value = [];
        $dbIndex = new DatabaseIndex();

        $dbIndex->setFieldList($value);
    }
    public function testSetFieldListExceptionSingleFieldError()
    {
        $this->expectException(\InvalidArgumentException::class);
        $value = ["field1",""];

        $dbIndex = new DatabaseIndex();

        $dbIndex->setFieldList($value);
    }

    public function testAddToFieldList()
    {
        $value = 'fieldName';
        $dbIndex = new DatabaseIndex();

        $dbIndex->addToFieldList($value);

        $this->assertEquals([$value],$dbIndex->getFieldList());
    }
    public function testAddToFieldListException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $value = '';
        $dbIndex = new DatabaseIndex();

        $dbIndex->addToFieldList($value);
    }

    public function testSetName()
    {
        $value = "IndexName";
        $dbIndex = new DatabaseIndex();

        $dbIndex->setName($value);

        $this->assertEquals($value,$dbIndex->getName());
    }
    public function testSetNameException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $value = '';
        $dbIndex = new DatabaseIndex();

        $dbIndex->setName($value);
    }
}
