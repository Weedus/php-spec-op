<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 29.06.18
 * Time: 08:10
 */

namespace Weedus\PhpSpecOps\Core\Specifications\Map;


use Weedus\PhpSpecOps\Core\Model\Area\Distance;
use Weedus\PhpSpecOps\Core\Model\Area\Field;
use Weedus\PhpSpecOps\Core\Model\Area\Location;
use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\Specification\SpecificationInterface;

class InRange implements SpecificationInterface
{
    /** @var Location */
    private $location;
    /** @var Range */
    private $minRange;
    /** @var Range */
    private $maxRange;

    /**
     * InRange constructor.
     *
     * @param Location $location
     * @param Range    $minRange
     * @param Range    $maxRange
     */
    public function __construct(Location $location, Range $minRange, Range $maxRange)
    {
        $this->location = $location;
        $this->minRange = $minRange;
        $this->maxRange = $maxRange;
    }

    /**
     * @param $item
     *
     * @return bool
     * @throws \Weedus\PhpSpecOps\Core\Exceptions\DistanceCalculationFailedException
     */
    public function isSatisfiedBy($item): bool
    {
        if (!($item instanceof Field)) {
            return false;
        }
        $distance = Distance::createByLocations($this->location, $item->getLocation());
        return $this->minRange->getValue() <= $distance->getSteps()
            && $this->maxRange->getValue() >= $distance->getSteps();
    }
}