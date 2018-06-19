<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 21:35
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Body;


use Weedus\PhpSpecOps\Model\ValueObjects\Items\Armor\Head\ArmorChestInterface;
use Weedus\PhpSpecOps\Model\ValueObjects\ValueObjectInterface;

interface BodyInterface extends ValueObjectInterface
{

    public function getChest(): ArmorChestInterface;
}