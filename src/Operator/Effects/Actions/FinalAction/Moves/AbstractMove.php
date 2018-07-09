<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 05.06.18
 * Time: 23:57
 */

namespace Weedus\PhpSpecOps\Core\Operator\Effects\Actions\FinalAction\Moves;

use Weedus\PhpSpecOps\Core\Model\Area\Field;
use Weedus\PhpSpecOps\Core\Model\Area\Location;
use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters\CharacterEffectInterface;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\Places\PlaceInterface;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\Places\Walks\WalksInterface;
use Weedus\PhpSpecOps\Core\Operator\Effects\AbstractEffect;

abstract class AbstractMove extends AbstractEffect
{
    public function __construct()
    {
        parent::__construct(0, 0, Range::ZERO());
    }

    /**
     * @return Range
     */
    public function getRange(): Range
    {
        return Range::ZERO();
    }

    /**
     * @param CharacterEffectInterface $target
     * @param Field                    $field
     */
    private function move(CharacterEffectInterface $target, Field $field): void
    {
        if($field->hasCharacter()){
            return null;
        }
        $this->performLeaveEffect($target);
        $target->getField()->unsetCharacter();
        $field->setCharacter($target);
        $this->performArriveEffect($target);
    }

    protected function newLocation(Location $location): Location
    {
        return Location::create($location->getX(), $location->getY(), $location->getZ());
    }

    /**
     * @param Field      $caster
     * @param null|Field $target
     */
    public function perform(Field $caster, ?Field $target = null): void
    {
        $location = $this->newLocation($caster->getLocation());
        $field = $caster->getMap()->getField($location);
        if(!$this->isFieldWalkable($field)){
            return null;
        }
        $this->move($caster->getCharacter(), $field);
    }

    /**
     * @param null|Field $field
     *
     * @return bool
     */
    private function isFieldWalkable(?Field $field = null): bool
    {
        if($field === null){
            return false;
        }
        $place = $field->getPlace();
        return !$field->hasCharacter()
            && $place->isWalkable();
    }

    private function performLeaveEffect(CharacterEffectInterface $target)
    {
        /** @var WalksInterface $placeable */
        $placeable = $target->getField()->getPlace();
        if (!$placeable->hasLeaveEffect()) {
            return null;
        }
        $placeable->getLeaveEffect()->perform($target->getField());
    }

    private function performArriveEffect(CharacterEffectInterface $target)
    {
        /** @var WalksInterface $placeable */
        $placeable = $target->getField()->getPlace();
        if (!$placeable->hasArriveEffect()) {
            return null;
        }
        $placeable->getArriveEffect()->perform($target->getField());
    }
}