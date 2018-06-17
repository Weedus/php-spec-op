<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 17.06.18
 * Time: 11:00
 */

namespace Weedus\PhpSpecOps\Operator\Effects\Actions\Action;


use Weedus\PhpSpecOps\Model\Area\Location;
use Weedus\PhpSpecOps\Model\Entities\Units\Characters\CharacterEffectInterface;
use Weedus\PhpSpecOps\Operator\Effects\Actions\FinalAction\Moves\AbstractMove;

class Teleport extends AbstractMove
{
    /** @var Location */
    private $targetLocation;

    /**
     * Teleport constructor.
     * @param Location $targetLocation
     */
    public function __construct(Location $targetLocation)
    {
        $this->targetLocation = $targetLocation;
    }

    public static function create($value = null)
    {
        return new self($value);
    }

    /**
     * @param CharacterEffectInterface $caster
     * @param null|CharacterEffectInterface $target
     * @throws \Assert\AssertionFailedException
     */
    public function perform(CharacterEffectInterface $caster, ?CharacterEffectInterface $target = null): void
    {
        $field = $caster->getField()->getMap()->getField($location);
        $this->checkFieldForStairs($field);
        $this->move($caster, $field);
    }
}