<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 22:30
 */

namespace Weedus\PhpSpecOps\Core\Model\Entities\Units\Places;


use Weedus\PhpSpecOps\Core\Model\Entities\Units\AbstractUnit;

abstract class AbstractPlace extends AbstractUnit implements PlaceInterface
{

    public function isExit(): bool
    {
        return false;
    }

    public function isWalkable(): bool
    {
        return false;
    }

    public function isItem(): bool
    {
        return false;
    }

    public function isTrap(): bool
    {
        return false;
    }

    public function isPlaceToRest(): bool
    {
        return false;
    }

    public function isOpen(): bool
    {
        return false;

    }

    public function isClosed(): bool
    {
        return false;

    }

    public function isBreakable(): bool
    {
        return false;

    }

    public function isStairs(): bool
    {
        return false;
    }

    public function goesUp(): bool
    {
        return false;
    }

    public function goesDown(): bool
    {
        return false;
    }

    public static function create($value = null)
    {
        if ($value === null) {
            return new static(null);
        }
        return new static($value);
    }
}
