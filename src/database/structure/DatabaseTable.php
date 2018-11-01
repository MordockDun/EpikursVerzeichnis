<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 01.11.2018
 * Time: 08:49
 */

namespace EpikursVerzeichnis\database\structure;


class DatabaseTable
{

    /** @var string */
    private $name;
    /** @var DatabaseField[] */
    private $fieldList = [];
    /** @var DatabaseIndex[] */
    private $indexList = [];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @throws \InvalidArgumentException
     */
    public function setName(string $name): void
    {
        if (empty($name)) {
            throw new \InvalidArgumentException("Name can not be empty");
        }
        $this->name = $name;
    }

    /**
     * @return DatabaseField[]
     */
    public function getFieldList(): array
    {
        return $this->fieldList;
    }

    /**
     * @param DatabaseField[] $fieldList
     * @throws \InvalidArgumentException
     */
    public function setFieldList(array $fieldList): void
    {
        if (empty($fieldList)) {
            throw new \InvalidArgumentException("Field list can not be empty");
        }
        foreach ($fieldList AS $field) {
            $this->addField($field);
        }
    }

    /**
     * @param DatabaseField $field
     * @throws \InvalidArgumentException
     */
    public function addField(DatabaseField $field): void
    {
        $fieldName = $field->getName();
        $fieldType = $field->getType();
        $fieldLength = $field->getLength();

        if (empty($fieldName) ||
            empty($fieldType) ||
            empty($fieldLength)) {
            throw new \InvalidArgumentException("Field has to be defined completely");
        }

        array_push($this->fieldList, $field);
    }

    /**
     * @return DatabaseIndex[]
     */
    public function getIndexList(): array
    {
        return $this->indexList;
    }

    /**
     * @param DatabaseIndex[] $indexList
     * @throws \InvalidArgumentException
     */
    public function setIndexList(array $indexList): void
    {
        if (empty($indexList)) {
            throw new \InvalidArgumentException("Index list can not be empty");
        }

        foreach ($indexList AS $index) {
            $this->addIndex($index);
        }

    }

    /**
     * @param DatabaseIndex $index
     * @throws \InvalidArgumentException
     */
    public function addIndex(DatabaseIndex $index): void
    {
        $indexName = $index->getName();
        $indexType = $index->getType();
        $indexFieldList = $index->getFieldList();

        if (empty($indexName) ||
            empty($indexType) ||
            empty($indexFieldList)) {
            throw new \InvalidArgumentException("Index has to be defined completely");
        }

        array_push($this->indexList, $index);
    }


}