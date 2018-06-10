<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 11:26
 */

namespace PhpSpecOps\Model\Area;

use Assert\Assert;
use Assert\Assertion;
use PhpSpecOps\Model\Entities\Units\Characters\CharacterInterface;
use PhpSpecOps\Model\Entities\Units\Placeables\Walkables\Ground;
use PhpSpecOps\Model\Storage\MultiDimensionCollection;
use PhpSpecOps\Model\ValueObjects\Arraylizeable;

class Map implements Arraylizeable
{
    private $always_create_field_if_not_exists = false;

    /** @var MultiDimensionCollection */
    private $map;

    /** @var int */
    private $length;
    /** @var int */
    private $width;
    /** @var int */
    private $height;

    /**
     * Map constructor.
     */
    public function __construct(int $length, int $width, int $height)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->map = new MultiDimensionCollection();
    }

    public function setCreateFieldIfNotExists(bool $create)
    {
        $this->always_create_field_if_not_exists = $create;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param Field $field
     * @throws \Assert\AssertionFailedException
     */
    public function addField(Field $field)
    {
        $location = $field->getLocation();
        $this->validateLocation($location);
        $key = $this->createMapKey($location);
        Assertion::false($this->map->offsetExists($key));
        $field->setMap($this);
        $this->map->offsetSet($key, $field);
    }

    public function hasField(Location $location)
    {
        return $this->map->offsetExists($this->createMapKey($location));
    }

    /**
     * @param Location $location
     * @return Field
     * @throws \Assert\AssertionFailedException
     */
    public function getField(Location $location): Field
    {
        $this->validateLocation($location);
        $key = $this->createMapKey($location);
        if (!$this->map->offsetExists($key)) {
            if (!$this->always_create_field_if_not_exists) {
                return null;
            }
            $this->addField(Field::create($location, Ground::create()));
        }
        return $this->map->offsetGet($key);
    }

    public function validateLocation(Location $location)
    {
        Assert::lazy()
            ->that($location->getX(), 'length')->between(0, $this->length - 1)
            ->that($location->getY(), 'width')->between(0, $this->width - 1)
            ->that($location->getZ(), 'height')->between(0, $this->height - 1)
            ->verifyNow();
    }

    private function createMapKey(Location $location)
    {
        return implode('/', [$location->getX(), $location->getY(), $location->getZ()]);
    }

    /** @return array */
    public function toArray(): array
    {
        $map = [];
        for ($height = 0; $height < $this->height; $height++) {
            for ($length = 0; $length < $this->length; $length++) {
                for ($width = 0; $width < $this->width; $width++) {
                    $location = Location::create($length, $width, $height);
                    /** @var CharacterInterface $unit */
                    $unit = $this->map->offsetGet($this->createMapKey($location));
                    $map[$height][$length][$width] = $unit ? $unit->toArray() : null;
                }
            }
        }
        return $map;
    }

    public function getCharacters()
    {
        return $this->iterate([$this,'checkForCharacter']);
    }

    private function iterate(callable $callback)
    {
        $items = [];
        for ($height = 0; $height < $this->height; $height++) {
            for ($length = 0; $length < $this->length; $length++) {
                for ($width = 0; $width < $this->width; $width++) {
                    $location = Location::create($length, $width, $height);
                    $item = call_user_func($callback,$location);
                    if($item !== null){
                        $items[] = $item;
                    }
                }
            }
        }
        return $items;
    }

    /**
     * @param Location $location
     * @return null|CharacterInterface
     * @throws \Assert\AssertionFailedException
     *
     */
    private function checkForCharacter(Location $location)
    {
        $field = $this->getField($location);
        if(!$field || !$field->hasCharacter()){
            return null;
        }
        return $field->getCharacter();
    }
}