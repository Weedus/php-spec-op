<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 11:26
 */

namespace Weedus\PhpSpecOps\Model\Area;

use Weedus\PhpSpecOps\Model\ValueObjects\Arraylizeable;
use Weedus\Collection\SpecificationCollectionInterface;
use Weedus\Specification\SpecificationInterface;
use Weedus\Specifications\Map\AlwaysTrue;
use Weedus\Specifications\Map\HasCharacter;

class Map implements Arraylizeable
{

    /** @var SpecificationCollectionInterface */
    private $map;

    /**
     * Map constructor.
     * @param SpecificationCollectionInterface $collection
     */
    public function __construct(SpecificationCollectionInterface $collection)
    {
        $this->map = $collection;
    }

    protected function createOffset(Location $location)
    {
        $x = $location->getX();
        $y = $location->getY();
        $z = $location->getZ();
        return "x$x/y$y/z$z";
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

    public function addFields(Field ...$fields)
    {
        /** @var Field $field */
        foreach($fields as $field){
            $this->addField($field);
        }
    }

    public function hasField(Location $location)
    {

        return $this->map->offsetExists(
            $this->createOffset($location)
        );
    }


    /**
     * @param Location $location
     * @return Field
     */
    public function getField(Location $location): Field
    {
        if(!$this->hasField($location)){
            return null;
        }
        return $this->map->offsetGet(
            $this->createOffset($location)
        );
    }

    /**
     * @param SpecificationInterface $specification
     * @return mixed
     */
    public function getFields(?SpecificationInterface $specification = null)
    {
        if($specification === null){
            $specification = new AlwaysTrue();
        }
        return $this->map->findBySpecification($specification);
    }

    /** @return array */
    public function toArray(): array
    {
        $ret = [];
        /**
         * @var string|int $key
         * @var Field $item
         */
        foreach($this->map as $key => $item){
            $ret[$key] = $item->toArray();
        }
        return $ret;
    }

    public function getCharacters()
    {
        return $this->getFields(new HasCharacter());
    }

}