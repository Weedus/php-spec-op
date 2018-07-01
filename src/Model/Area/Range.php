<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 13:09
 */

namespace Weedus\PhpSpecOps\Core\Model\Area;

use Weedus\PhpSpecOps\Core\Model\Equalizeable;
use Weedus\PhpSpecOps\Core\Model\OptionsObjectTrait;

/**
 * Class Range
 * @package PhpSpecOps\ValueObjects
 * @method static Range ZERO()
 * @method static Range LOW()
 * @method static Range MEDIUM_LOW()
 * @method static Range MEDIUM()
 * @method static Range MEDIUM_HIGH()
 * @method static Range HIGH()
 */
final class Range implements Equalizeable
{
    use OptionsObjectTrait;

    const ZERO = 0;
    const LOW = 1;
    const MEDIUM_LOW = 2;
    const MEDIUM = 4;
    const MEDIUM_HIGH = 5;
    const HIGH = 6;

    public function isReachable(Distance $distance)
    {
        $amount = $distance->getSteps();
        return $amount <= $this->value;
    }
}