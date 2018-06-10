<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 21:35
 */

namespace PhpSpecOps\Model\ValueObjects\Body;


use PhpSpecOps\Model\ValueObjects\Items\Armor\Head\ArmorChestInterface;
use PhpSpecOps\Model\ValueObjects\ValueObjectInterface;

interface BodyInterface extends ValueObjectInterface
{

    public function getChest(): ArmorChestInterface;
}