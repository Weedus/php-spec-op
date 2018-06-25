<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 12:45
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Items;


use Assert\Assertion;
use Weedus\PhpSpecOps\Model\ValueObjects\AbstractValueObject;
use Weedus\PhpSpecOps\Model\ValueObjects\Equalizeable;

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

    /**
     * @param Equalizeable $item
     * @return bool
     */
    public function equals(Equalizeable $item): bool
    {
        if(!($item instanceof AbstractItem)){
            return false;
        }
        return $this->name === $item->name
            && $this->equalsType($item);
    }

    /**
     * @param ItemInterface $item
     * @return bool
     */
    public function equalsType(ItemInterface $item): bool
    {
        if(!($item instanceof AbstractItem)){
            return false;
        }
        return $this->type->equals($item->type);
    }


}