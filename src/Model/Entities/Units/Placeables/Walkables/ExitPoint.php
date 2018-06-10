<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 22:30
 */

namespace PhpSpecOps\Model\Entities\Units\Placeables\Walkables;


use PascalDeVink\ShortUuid\ShortUuid;
use PhpSpecOps\Operator\Effects\EffectInterface;
use PhpSpecOps\Operator\Effects\LevelExit;

class ExitPoint extends Ground
{
    public function __construct(?ShortUuid $id = null)
    {
        parent::__construct('exit_point', $id);
    }

    public function isExit(): bool
    {
        return true;
    }

    public function getWalkOverEffect(): ?EffectInterface
    {
        return LevelExit::create();
    }
}