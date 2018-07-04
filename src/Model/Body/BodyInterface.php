<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 21:35
 */

namespace Weedus\PhpSpecOps\Core\Model\Body;


use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Armor\Chest\ArmorChestInterface;

interface BodyInterface
{

    public function getChest(): ArmorChestInterface;
}