<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 16:00
 */

namespace PhpSpecOps\Operator\Effects;


use PhpSpecOps\Model\Entities\Units\Characters\CharacterEffectInterface;
use PhpSpecOps\Model\ValueObjects\Range;

interface EffectInterface
{

    /**
     * @return Range
     */
    public function getRange(): Range;

    /**
     * @param CharacterEffectInterface $caster
     * @param CharacterEffectInterface $target
     */
    public function perform(CharacterEffectInterface $caster, ?CharacterEffectInterface $target = null): void;
}