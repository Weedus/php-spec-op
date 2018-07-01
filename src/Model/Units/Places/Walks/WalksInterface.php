<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 23:08
 */

namespace Weedus\PhpSpecOps\Core\Model\Units\Places\Walks;

use Weedus\PhpSpecOps\Core\Model\Units\Places\PlaceInterface;
use Weedus\PhpSpecOps\Core\Operator\Effects\EffectInterface;

interface WalksInterface extends PlaceInterface
{
    /**
     * @return null|EffectInterface
     */
    public function getArriveEffect(): ?EffectInterface;

    /**
     * @return null|EffectInterface
     */
    public function getLeaveEffect(): ?EffectInterface;

    /**
     * @return null|EffectInterface
     */
    public function getStandOnEffect(): ?EffectInterface;

    public function hasArriveEffect(): bool;

    public function hasStandOnEffect(): bool;

    public function hasLeaveEffect(): bool;
}