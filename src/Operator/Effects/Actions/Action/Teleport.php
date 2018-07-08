<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 17.06.18
 * Time: 11:00
 */

namespace Weedus\PhpSpecOps\Core\Operator\Effects\Actions\Action;


use Assert\Assertion;
use Weedus\PhpSpecOps\Core\Model\Area\Field;
use Weedus\PhpSpecOps\Core\Model\Area\Location;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\Placeables\Walkables\WalkableInterface;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Range;
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
    }

    public static function create($value = null)
    {
        return new self($value);
    }

    /**
     * @return Range
     */
    public function getRange(): Range
    {
        return Range::ZERO();
    }

    /**
     * @param Field      $caster
     * @param null|Field $target
     *
     * @throws \Assert\AssertionFailedException
     */
    public function perform(Field $caster, ?Field $target = null): void
    {
        Assertion::notNull($target);
        Assertion::null($target->getCharacter());
        Assertion::notNull($target->getPlace());
        Assertion::true($target->getPlace()->isWalkable());
        $character = $caster->getCharacter();

        $castPlace = $caster->getPlace();
        /** @var WalkableInterface $castPlace */
        if ($castPlace->hasLeaveEffect()) {
            $castPlace->getLeaveEffect()->perform($caster);
        }
        $caster->unsetCharacter();

        $target->setCharacter($character);
        $targetPlace = $target->getPlace();
        /** @var WalkableInterface $targetPlace */
        if ($targetPlace->hasArriveEffect()) {
            $targetPlace->getArriveEffect()->perform($target);
        }
    }
}