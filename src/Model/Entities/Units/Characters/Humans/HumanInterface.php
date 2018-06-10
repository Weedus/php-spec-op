<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 01:35
 */

namespace PhpSpecOps\Model\Entities\Units\Characters\Humans;

use PhpSpecOps\Model\Entities\Units\Characters\CharacterInterface;
use PhpSpecOps\Model\Storage\CollectionInterface;

interface HumanInterface extends CharacterInterface
{
    public function getInventory(): CollectionInterface;
}