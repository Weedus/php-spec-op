<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 17.06.18
 * Time: 09:34
 */

namespace Weedus\PhpSpecOps\Core\Specifications\Map;


use Weedus\PhpSpecOps\Core\Model\Area\Field;
use Weedus\PhpSpecOps\Core\Model\Area\Location;
use Weedus\Specification\SpecificationInterface;

class HasLocation implements SpecificationInterface
{
    /** @var Location */
    private $location;

    /**
     * HasLocation constructor.
     *
     * @param Location $location
     */
    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    /**
     * @param $item
     *
     * @return bool
     * @throws \Assert\AssertionFailedException
     */
    public function isSatisfiedBy($item): bool
    {
        if (!($item instanceof Field)) {
            return false;
        }
        return $this->location->equals($item->getLocation());
    }
}