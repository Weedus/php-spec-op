<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 21:35
 */

namespace PhpSpecOps\ValueObjects\Body;


use PhpSpecOps\ValueObjects\Items\Armor\Head\ArmorChestInterface;
use PhpSpecOps\ValueObjects\ValueObjectInterface;

interface BodyInterface extends ValueObjectInterface
{

    public function getChest(): ArmorChestInterface;
}