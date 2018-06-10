<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 05.06.18
 * Time: 23:44
 */

namespace PhpSpecOps\Model\Entities\Units\Placeables\Walkables;

use PascalDeVink\ShortUuid\ShortUuid;
use PhpSpecOps\Model\Entities\Units\Placeables\AbstractPlaceable;
use PhpSpecOps\Operator\Effects\EffectInterface;

class Ground extends AbstractPlaceable implements WalkableInterface
{
    public function __construct(?string $name,?ShortUuid $id)
    {
        parent::__construct($name??'ground', $id);
    }

    public function isWalkable(): bool
    {
        return true;
    }

    public function getWalkOverEffect(): ?EffectInterface
    {
        return null;
    }

    /**
     * @return null|EffectInterface
     */
    public function getRestEffect(): ?EffectInterface
    {
        return null;
    }

    /**
     * @return null|EffectInterface
     */
    public function getArriveEffect(): ?EffectInterface
    {
        return null;
    }

    /**
     * @return null|EffectInterface
     */
    public function getLeaveEffect(): ?EffectInterface
    {
        return null;
    }

    /**
     * @return null|EffectInterface
     */
    public function getStandOnEffect(): ?EffectInterface
    {
        return null;
    }

    public function hasArriveEffect(): bool
    {
        return !empty($this->getArriveEffect());
    }


    public function hasStandOnEffect(): bool
    {
        return !empty($this->getStandOnEffect());
    }

    public function hasLeaveEffect(): bool
    {
        return !empty($this->getLeaveEffect());
    }
}