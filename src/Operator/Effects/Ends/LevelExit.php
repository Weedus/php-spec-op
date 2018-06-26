<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 23:12
 */

namespace Weedus\PhpSpecOps\Operator\Effects\Ends;


use Weedus\Exceptions\NotYetImplementedException;
use Weedus\PhpSpecOps\Model\Area\Field;
use Weedus\PhpSpecOps\Model\ValueObjects\Range;
use Weedus\PhpSpecOps\Operator\Effects\AbstractEffect;

class LevelExit extends AbstractEffect
{

    /**
     * @return Range
     */
    public function getRange(): Range
    {
        return Range::ZERO();
    }

    public function perform(Field $caster, ?Field $target = null): void
    {
        throw new NotYetImplementedException(__CLASS__ . '->' . __METHOD__);
    }


}