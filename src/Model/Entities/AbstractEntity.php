<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 12:40
 */

namespace Weedus\PhpSpecOps\Model\Entities;


use PascalDeVink\ShortUuid\ShortUuid;

abstract class AbstractEntity implements EntityInterface
{
    /** @var ShortUuid */
    protected $id;
    /** @var string */
    protected $name;


    /**
     * AbstractEntity constructor.
     * @param ShortUuid $id
     * @param string $name
     */
    public function __construct(string $name, ?ShortUuid $id = null)
    {
        $this->id = $id ?? new ShortUuid();
        $this->name = $name;
    }


    /**
     * @return ShortUuid
     */
    public function getId(): ShortUuid
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}