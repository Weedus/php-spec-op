<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 01:35
 */

namespace Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters\Humans;

use Weedus\Collection\SpecificationCollectionInterface;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters\CharacterEffectInterface;

interface HumanInterface extends CharacterEffectInterface
{
    public function getInventory(): SpecificationCollectionInterface;
}