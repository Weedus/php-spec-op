<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 12:45
 */

namespace PhpSpecOps\ValueObjects\Items;


use Assert\Assertion;
use PhpSpecOps\ValueObjects\AbstractValueObject;
use PhpSpecOps\ValueObjects\Equalizeable;

abstract class AbstractItem extends AbstractValueObject implements ItemInterface
{
    /** @var string */
    protected $name;
    /** @var ItemType */
    protected $type;

    /**
     * AbstractItem constructor.
     * @param string $name
     * @param ItemType $type
     */
    public function __construct(string $name, ItemType $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return ItemType
     */
    public function getType(): ItemType
    {
        return $this->type;
    }

    /** @return array */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'type' => $this->type->toArray()
        ];
    }

    /**
     * @param Equalizeable $item
     * @return bool
     * @throws \Assert\AssertionFailedException
     */
    public function equals(Equalizeable $item): bool
    {
        Assertion::isInstanceOf($item, self::class);
        /** @var AbstractItem $item */
        return $this->name === $item->name
            && $this->type->equals($item->type);
    }
}