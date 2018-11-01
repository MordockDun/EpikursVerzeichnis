<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 01.11.2018
 * Time: 09:15
 */

namespace EpikursVerzeichnis\database\structure;

/**
 * Class DatabaseIndex
 * @package EpikursVerzeichnis\database\structure
 */
class DatabaseIndex
{
    /** @var string */
    private $name="";
    /** @var string[] */
    private $fieldList=[];
    /** @var int */
    private $type=0;

    const DATABASE_INDEX_TYPE_PRIMARY = 1;
    const DATABASE_INDEX_TYPE_INDEX = 2;
    const DATABASE_INDEX_TYPE_UNIQUE = 3;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        if(empty($name)){
            throw new \InvalidArgumentException("Name can not be empty");
        }
        $this->name = $name;
    }

    /**
     * @return string[]
     */
    public function getFieldList(): array
    {
        return $this->fieldList;
    }

    /**
     * @param string[] $fieldList
     * @throws \InvalidArgumentException
     */
    public function setFieldList(array $fieldList): void
    {
        if(empty($fieldList)){
            throw new \InvalidArgumentException("Fieldlist can not be empty");
        }

        foreach($fieldList as $fieldName){
            $this->addToFieldList($fieldName);
        }
    }

    /**
     * @param string $fieldName
     * @throws \InvalidArgumentException
     */
    public function addToFieldList(string $fieldName): void
    {
        if(empty($fieldName)){
            throw new \InvalidArgumentException("Fieldname can not be empty");
        }

        array_push($this->fieldList,$fieldName);
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @throws \InvalidArgumentException
     */
    public function setType(int $type): void
    {
        switch($type){
            case self::DATABASE_INDEX_TYPE_PRIMARY:
                $this->type = self::DATABASE_INDEX_TYPE_PRIMARY;
                break;
            case self::DATABASE_INDEX_TYPE_INDEX:
                $this->type = self::DATABASE_INDEX_TYPE_INDEX;
                break;
            case self::DATABASE_INDEX_TYPE_UNIQUE:
                $this->type = self::DATABASE_INDEX_TYPE_UNIQUE;
                break;
            default:
                throw new \InvalidArgumentException("no valid type given");
        }
    }


}