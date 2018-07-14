<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 25.06.18
 * Time: 14:32
 */

namespace Weedus\PhpSpecOps\Core\Tests\Helper;


use Weedus\PhpSpecOps\Core\Model\Area\Field;
use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Operator\Effects\AbstractEffect;

class TestEffect extends AbstractEffect
{
    /**
     * @return Range
     */
    public function getRange(): Range
    {
        return Range::MEDIUM();
    }

    /**
     * @param Field      $caster
     * @param null|Field $target
     */
    public function perform(Field $caster, ?Field $target = null): void
    {
    }
}