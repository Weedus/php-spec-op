<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 11:28
 */

namespace Weedus\PhpSpecOps\Core\Model\Area;

use Assert\Assertion;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters\CharacterEffectInterface;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\Places\PlaceInterface;

class Field
{
    /** @var Map */
    private $map;
    /** @var Location */
    private $location;
    /** @var CharacterEffectInterface|null */
    private $character;
    /** @var PlaceInterface */
    private $place;

    /**
     * @param Location                 $location
     * @param PlaceInterface           $place
     * @param null|CharacterEffectInterface $character
     *
     * @return Field
     * @throws \Assert\AssertionFailedException
     */
    public static function create(Location $location, PlaceInterface $place, ?CharacterEffectInterface $character = null)
    {
        return new static($location, $place, $character);
    }

    /**
     * Field constructor.
     *
     * @param Location                 $location
     * @param PlaceInterface           $place
     * @param null|CharacterEffectInterface $character
     *
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(Location $location, PlaceInterface $place, ?CharacterEffectInterface $character = null)
    {
        $this->location = $location;
        $this->place = $place;
        $this->setCharacter($character);
    }

    /**
     * @param Map $map
     *
     * @return Field
     */
    public function setMap(Map $map): self
    {
        $this->map = $map;
        return $this;
    }

    /**
     * @return Map
     */
    public function getMap(): Map
    {
        return $this->map;
    }

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param null|CharacterEffectInterface $character
     *
     * @throws \Assert\AssertionFailedException
     */
    public function setCharacter(?CharacterEffectInterface $character): void
    {
        Assertion::true($this->place->isWalkable());
        if ($character !== null) {
            $character->setField($this);
        }
        $this->character = $character;
    }

    public function unsetCharacter(): void
    {
        $this->character = null;
    }

    public function hasCharacter(): bool
    {
        return empty($this->character);
    }

    /**
     * @return CharacterEffectInterface|null
     */
    public function getCharacter(): ?CharacterEffectInterface
    {
        return $this->character;
    }

    /**
     * @return PlaceInterface
     */
    public function getPlace(): PlaceInterface
    {
        return $this->place;
    }

    /**
     * @param Field $field
     *
     * @return Direction
     */
    public function getDirectionTo(Field $field): Direction
    {
        if (!$this->hasSameHeight($field)) {
            return null;
        }
        return Direction::createByLocations($this->location, $field->location);
    }

    /**
     * @param Field $field
     *
     * @return null|Distance
     * @throws \Weedus\PhpSpecOps\Core\Exceptions\DistanceCalculationFailedException
     */
    public function getDistanceTo(Field $field)
    {
        if (!$this->hasSameHeight($field)) {
            return null;
        }
        return Distance::createByLocations($this->location, $field->location);
    }

    private function hasSameHeight(Field $field)
    {
        return $this->location->getZ() === $field->location->getZ();
    }
}