<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 01:35
 */

namespace Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters\Humans;

use Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters\CharacterEffectInterface;
use Weedus\PhpSpecOps\Core\Model\Inventory\InventoryInterface;

interface HumanInterface extends CharacterEffectInterface
{
    public function getInventory(): InventoryInterface;
}