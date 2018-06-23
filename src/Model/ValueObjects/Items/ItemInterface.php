<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 16:05
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Items;

use Weedus\PhpSpecOps\Model\ValueObjects\ValueObjectInterface;

interface ItemInterface extends ValueObjectInterface
{
    /**
     * @return ItemType
     */
    public function getType(): ItemType;

    /**
     * @return string
     */
    public function getName(): string;

    public function equalsType(ItemInterface $item): bool;
}