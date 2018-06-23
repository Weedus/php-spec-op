<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 17:44
 */

namespace Weedus\PhpSpecOps\Model\Entities\Units\Characters;

use Weedus\PhpSpecOps\Model\Entities\Units\UnitInterface;

interface CharacterEffectInterface extends UnitInterface
{
    public function addHealth(int $amount);

    public function subHealth(int $amount);

    public function isDead(): bool;
}