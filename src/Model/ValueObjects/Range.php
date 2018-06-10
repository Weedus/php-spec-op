<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 13:09
 */

namespace PhpSpecOps\Model\ValueObjects;

/**
 * Class Range
 * @package PhpSpecOps\ValueObjects
 * @method static Range ZERO()
 * @method static Range LOW()
 * @method static Range MEDIUM()
 * @method static Range HIGH()
 */
class Range extends AbstractValueObject
{
    use OptionsObjectTrait;

    const ZERO = 'zero';
    const LOW = 'low';
    const MEDIUM = 'medium';
    const HIGH = 'high';
}