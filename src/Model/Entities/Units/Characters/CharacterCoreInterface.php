<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 08.07.18
 * Time: 14:13
 */

namespace Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters;


use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Model\Body\BodyInterface;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\UnitInterface;

interface CharacterCoreInterface extends UnitInterface
{
    public function getPower(): int;

    public function getMaxHealth(): int;

    public function getHealth(): int;

    public function getSight(): Range;

    public function getBody(): BodyInterface;
}