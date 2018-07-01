<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 17.06.18
 * Time: 10:50
 */

namespace Weedus\PhpSpecOps\Core\Operator\Level;


use Weedus\PhpSpecOps\Core\Model\Area\Field;
use Weedus\PhpSpecOps\Core\Model\Configuration\LevelConfiguration;

class LevelConfigurator
{
    /** @var string */
    private $id;
    /** @var int */
    private $length;
    /** @var int */
    private $width;
    /** @var int */
    private $height;
    /** @var Field[] */
    private $fields;

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param int $length
     */
    public function setLength(int $length): void
    {
        $this->length = $length;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    /**
     * @param Field[] $fields
     */
    public function setFields(array $fields): void
    {
        $this->fields = $fields;
    }

    public function getLevelConfiguration()
    {
        return new LevelConfiguration($this->id, $this->length, $this->width, $this->height, $this->fields);
    }
}