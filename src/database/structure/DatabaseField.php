<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 01.11.2018
 * Time: 08:49
 */

namespace EpikursVerzeichnis\database\structure;

/**
 * Class DatabaseField
 * @package EpikursVerzeichnis\database\structure
 */
class DatabaseField
{
    /** @var string */
    private $name;
    /** @var int */
    private $type;
    /** @var int */
    private $length;

    const DATABASEFIELD_TYPE_BOOL = 1;
    const DATABASEFIELD_TYPE_INT = 2;
    const DATABASEFIELD_TYPE_STRING = 3;
    const DATABASEFIELD_TYPE_text = 4;

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
        if(empty($name)){
            throw new \InvalidArgumentException("Name can not be empty");
        }
        $this->name = $name;
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
            case self::DATABASEFIELD_TYPE_BOOL:
                $this->type = self::DATABASEFIELD_TYPE_BOOL;
                break;
            case self::DATABASEFIELD_TYPE_INT:
                $this->type = self::DATABASEFIELD_TYPE_INT;
                break;
            case self::DATABASEFIELD_TYPE_STRING:
                $this->type = self::DATABASEFIELD_TYPE_STRING;
                break;
            case self::DATABASEFIELD_TYPE_text:
                $this->type = self::DATABASEFIELD_TYPE_text;
                break;
            default:
                throw new \InvalidArgumentException("Given type not allowed");
        }
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     * @throws \InvalidArgumentException
     */
    public function setLength(int $length): void
    {
        if($length>=0){
            $this->length = $length;
        } else {
            throw new \InvalidArgumentException("Length must be greater or equal 0");
        }
    }



}