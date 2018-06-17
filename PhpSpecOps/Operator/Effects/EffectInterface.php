<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 16:00
 */

namespace Weedus\PhpSpecOps\Operator\Effects;


use Weedus\PhpSpecOps\Model\Entities\Units\Characters\CharacterEffectInterface;
use Weedus\PhpSpecOps\Model\ValueObjects\Range;

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