<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 16:05
 */

namespace PhpSpecOps\ValueObjects\Items;

use PhpSpecOps\ValueObjects\ValueObjectInterface;

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
}