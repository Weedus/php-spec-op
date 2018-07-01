<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 16:00
 */

namespace Weedus\PhpSpecOps\Core\Operator\Effects;


use Weedus\PhpSpecOps\Core\Model\Area\Field;
use Weedus\PhpSpecOps\Core\Model\Area\Range;

interface EffectInterface
{

    /**
     * @return Range
     */
    public function getRange(): Range;

    /**
     * @param Field $caster
     * @param null|Field $target
     */
    public function perform(Field $caster, ?Field $target = null): void;
}