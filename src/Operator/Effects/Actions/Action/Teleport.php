<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 17.06.18
 * Time: 11:00
 */

namespace Weedus\PhpSpecOps\Core\Operator\Effects\Actions\Action;



use Weedus\Exceptions\InvalidArgumentException;
use Weedus\PhpSpecOps\Core\Model\Area\Field;
use Weedus\PhpSpecOps\Core\Model\Area\Location;
use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\Places\Walks\WalksInterface;
use Weedus\PhpSpecOps\Core\Operator\Effects\AbstractEffect;

class Teleport extends AbstractEffect
{
    /** @var Location */
    private $targetLocation;

    /**
     * Teleport constructor.
     *
     * @param Location $targetLocation
     */
    public function __construct(Location $targetLocation)
    {
        $this->targetLocation = $targetLocation;
        parent::__construct(0, 0, Range::ZERO());
    }

    /**
     * @param Field      $caster
     * @param null|Field $target
     */
    public function perform(Field $caster, ?Field $target = null): void
    {
        if($target === null || $target->hasCharacter() || !$target->getPlace()->isWalkable()){
            $message = 'Target: '.($target===null?'No Field':'Field ');
            if($target!==null){
                /** @var Field $target */
                $message .= ($target->hasCharacter() ? 'with ' : ' without ') . 'Character ';
                $message .= 'with ' . ($target->getPlace()->isWalkable() ? 'walkable ' : ' not walkable ') . 'Place';
            }
            throw new InvalidArgumentException('Target: Field without Character, with walkable Place',$message);
        }
        $character = $caster->getCharacter();

        $castPlace = $caster->getPlace();
        /** @var WalksInterface $castPlace */
        if ($castPlace->hasLeaveEffect()) {
            $castPlace->getLeaveEffect()->perform($caster);
        }
        $caster->decoupleCharacter();

        $target->coupleCharacter($character);
        $targetPlace = $target->getPlace();
        /** @var WalksInterface $targetPlace */
        if ($targetPlace->hasArriveEffect()) {
            $targetPlace->getArriveEffect()->perform($target);
        }
    }
}