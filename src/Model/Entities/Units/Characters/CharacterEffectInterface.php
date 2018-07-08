<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 17:44
 */

namespace Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters;

interface CharacterEffectInterface extends CharacterCoreInterface
{
    public function addHealth(int $amount);

    public function subHealth(int $amount);

    public function isDead(): bool;
}