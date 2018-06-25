<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 22:31
 */

namespace Weedus\PhpSpecOps\Model\Units\Places;


use Weedus\PhpSpecOps\Model\Units\UnitInterface;

interface PlaceInterface extends UnitInterface
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