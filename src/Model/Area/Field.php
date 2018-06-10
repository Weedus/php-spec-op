<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 11:28
 */

namespace PhpSpecOps\Model\Area;

use Assert\Assertion;
use PhpSpecOps\Model\Entities\Units\Characters\CharacterInterface;
use PhpSpecOps\Model\Entities\Units\Placeables\PlaceableInterface;
use PhpSpecOps\Model\ValueObjects\Arraylizeable;

class Field implements Arraylizeable
{
    /** @var Map */
    private $map;
    /** @var Location */
    private $location;
    /** @var CharacterInterface|null */
    private $character;

    /** @var PlaceableInterface */
    private $placeable;

    /**
     * @param Location $location
     * @param PlaceableInterface $placeable
     * @param null|CharacterInterface $character
     * @return Field
     * @throws \Assert\AssertionFailedException
     */
    public static function create(Location $location, PlaceableInterface $placeable, ?CharacterInterface $character = null)
    {
        return new static($location, $placeable, $character);
    }

    /**
     * Field constructor.
     * @param Location $location
     * @param PlaceableInterface $placeable
     * @param null|CharacterInterface $character
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(Location $location, PlaceableInterface $placeable, ?CharacterInterface $character = null)
    {
        $this->location = $location;
        $this->placeable = $placeable;
        $this->setCharacter($character);
    }

    /**
     * @param Map $map
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
     * @param null|CharacterInterface $character
     * @throws \Assert\AssertionFailedException
     */
    public function setCharacter(?CharacterInterface $character): void
    {
        Assertion::true($this->placeable->isWalkable());
        if($character !== null){
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
     * @return CharacterInterface|null
     */
    public function getCharacter(): ?CharacterInterface
    {
        return $this->character;
    }

    /**
     * @return PlaceableInterface
     */
    public function getPlaceable(): PlaceableInterface
    {
        return $this->placeable;
    }

    public function toArray(): array
    {
        return [
            'location' => $this->location->toArray(),
            'unit' => ($this->character ? $this->character->toArray() : null),
            'placeable' => ($this->placeable ? $this->placeable->toArray() : null),
        ];
    }


}