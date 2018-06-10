<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 23:12
 */

namespace PhpSpecOps\Operator\Effects\Ends;


use PhpSpecOps\Model\Entities\Units\CharacterEffectInterface;
use PhpSpecOps\Operator\Effects\AbstractEffect;
use PhpSpecOps\ValueObjects\Range;

class LevelExit extends AbstractEffect
{

    /**
     * @return Range
     */
    public function getRange(): Range
    {
        return Range::ZERO();
    }

    /**
     * @param CharacterEffectInterface $caster
     * @throws \Exception
     */
    public function perform(CharacterEffectInterface $caster): void
    {
        throw new \Exception('not yet implemented');
    }
}