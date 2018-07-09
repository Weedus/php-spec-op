<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 07.07.18
 * Time: 13:26
 */

namespace Weedus\PhpSpecOps\Core\Model\Brain;


use Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters\CharacterEffectInterface;

interface SituationInterface
{
    public function getCharacter(): CharacterEffectInterface;
}