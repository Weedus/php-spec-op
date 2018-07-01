<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 23:16
 */

namespace Weedus\PhpSpecOps\Core\Operator\Effects;


abstract class AbstractEffect implements EffectInterface
{
    public static function create($value = null)
    {
        if ($value === null) {
            return new static();
        }
        return new static($value);
    }
}