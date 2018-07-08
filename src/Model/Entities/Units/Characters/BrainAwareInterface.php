<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 16:13
 */

namespace Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters;

use Weedus\PhpSpecOps\Core\Model\Brain\BrainInterface;

interface BrainAwareInterface extends CharacterCoreInterface
{
    public function getBrain(): BrainInterface;
}