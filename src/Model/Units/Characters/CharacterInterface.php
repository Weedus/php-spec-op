<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 16:13
 */

namespace Weedus\PhpSpecOps\Model\Units\Characters;

use Weedus\PhpSpecOps\Model\Body\BodyInterface;
use Weedus\PhpSpecOps\Model\Units\UnitInterface;
use Weedus\PhpSpecOps\Model\ValueObjects\Range;

interface CharacterInterface extends UnitInterface
{
    public function getMaxHealth(): int;

    public function getHealth(): int;

    public function getPower(): int;

    public function getSight(): Range;

    public function getBody(): BodyInterface;

    public function getBrain(): BrainInterface;
}