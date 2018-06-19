<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 13:09
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects;

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
final class Range extends AbstractValueObject
{
    use OptionsObjectTrait;

    const ZERO = 'zero';
    const LOW = 'low';
    const MEDIUM_LOW = 'medium_low';
    const MEDIUM = 'medium';
    const MEDIUM_HIGH = 'medium_high';
    const HIGH = 'high';

    public function isReachable(Distance $distance)
    {
        $amount = $distance->getSteps();
        switch($this->value){
            case self::ZERO:
                return $amount === 0;
            case self::LOW:
                return $amount <= 1;
            case self::MEDIUM_LOW:
                return $amount <= 2;
            case self::MEDIUM:
                return $amount <= 4;
            case self::MEDIUM_HIGH:
                return $amount <= 5;
            case self::HIGH:
                return $amount <= 6;
            default:
                return false;
        }
    }
}