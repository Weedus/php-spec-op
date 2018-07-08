<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 05.07.18
 * Time: 21:59
 */

namespace Weedus\PhpSpecOps\Core\Model\Entities;


use Ramsey\Uuid\Uuid;
use Weedus\PhpSpecOps\Core\Model\Equalizeable;

class AbstractEntity implements EntityInterface
{
    /** @var Uuid */
    protected $id;
    /** @var string */
    protected $name;

    /**
     * AbstractEntity constructor.
     *
     * @param null|Uuid $id
     */
    public function __construct(string $name, ?Uuid $id = null)
    {
        $this->name = $name;
        $this->id = $id ?? Uuid::uuid4();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    final public function equals(?Equalizeable $item): bool
    {
        if (!($item instanceof EntityInterface)) {
            return false;
        }
        return $this->id->equals($item->getId());
    }
}