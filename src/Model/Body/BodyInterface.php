<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 21:35
 */

namespace Weedus\PhpSpecOps\Model\Body;


use Weedus\PhpSpecOps\Model\ValueObjects\Items\Armor\Head\ArmorChestInterface;

interface BodyInterface
{

    public function getChest(): ArmorChestInterface;
}