<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 22:31
 */

namespace PhpSpecOps\Model\Entities\Units\Placeables;


use PhpSpecOps\Model\Entities\Units\UnitInterface;

interface PlaceableInterface extends UnitInterface
{
    public function isExit(): bool;

    public function isWalkable(): bool;

    public function isItem(): bool;

    public function isTrap(): bool;

    public function isPlaceToRest(): bool;

    public function isOpen(): bool;

    public function isClosed(): bool;

    public function isBreakable(): bool;

    public function isStairs(): bool;

    public function goesUp(): bool;

    public function goesDown(): bool;
}