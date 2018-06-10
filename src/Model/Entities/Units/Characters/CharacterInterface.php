<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 16:13
 */

namespace PhpSpecOps\Model\Entities\Units\Characters;

use PhpSpecOps\Model\Entities\Units\UnitInterface;
use PhpSpecOps\ValueObjects\Body\BodyInterface;
use PhpSpecOps\ValueObjects\Range;

interface CharacterInterface extends UnitInterface
{
    public function getMaxHealth(): int;

    public function getHealth(): int;

    public function getPower(): int;

    public function getSight(): Range;

    public function getBody(): BodyInterface;

    public function getBrain(): BrainInterface;
}