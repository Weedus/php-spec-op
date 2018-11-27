<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 11:26
 */

namespace Weedus\PhpSpecOps\Core\Model\Area;

use Weedus\Collection\SpecificationCollectionInterface;
use Weedus\PhpSpecOps\Core\Specifications\AlwaysTrue;
use Weedus\PhpSpecOps\Core\Specifications\Map\HasCharacter;
use Weedus\Specification\SpecificationInterface;

class Map
{
    /** @var SpecificationCollectionInterface */
    private $map;

    /**
     * Map constructor.
     *
     * @param SpecificationCollectionInterface $collection
     */
    public function __construct(SpecificationCollectionInterface $collection)
    {
        $this->map = $collection;
    }

    public function addFields(Field ...$fields)
    {
        /** @var Field $field */
        foreach ($fields as $field) {
            $this->addField($field);
        }
    }

    /**
     * @param Field $field
     */
    public function addField(Field $field)
    {
        $this->map->offsetSet(
            $this->createOffset($field->getLocation()),
            $field
        );
    }

    protected function createOffset(Location $location)
    {
        $x = $location->getX();
        $y = $location->getY();
        $z = $location->getZ();
        return "x$x/y$y/z$z";
    }

    /**
     * @param Location $location
     *
     * @return Field
     */
    public function getField(Location $location): Field
    {
        if (!$this->hasField($location)) {
            return null;
        }
        return $this->map->offsetGet(
            $this->createOffset($location)
        );
    }

    public function hasField(Location $location)
    {
        return $this->map->offsetExists(
            $this->createOffset($location)
        );
    }

    public function getCharacters()
    {
        return $this->getFields(new HasCharacter());
    }

    /**
     * @param SpecificationInterface $specification
     *
     * @return mixed
     */
    public function getFields(?SpecificationInterface $specification = null)
    {
        if ($specification === null) {
            $specification = new AlwaysTrue();
        }
        return $this->map->findBySpecification($specification);
    }
}