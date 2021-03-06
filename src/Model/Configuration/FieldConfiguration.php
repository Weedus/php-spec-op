<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 08.06.18
 * Time: 22:53
 */

namespace Weedus\PhpSpecOps\Core\Model\Configuration;


use Assert\Assertion;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\Characters\CharacterEffectInterface;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\Places\PlaceInterface;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\Places\Walks\Ground;
use Weedus\PhpSpecOps\Core\Model\Entities\Units\Places\Walks\WalksInterface;
use Weedus\PhpSpecOps\Core\Model\Equalizeable;

class FieldConfiguration implements ConfigurationInterface
{
    /** @var int */
    private $x;
    /** @var int */
    private $y;
    /** @var int */
    private $z;
    /** @var string|null */
    private $character;
    /** @var string */
    private $place;
    private $defaultPlace = Ground::class;

    /**
     * FieldConfiguration constructor.
     *
     * @param int         $x
     * @param int         $y
     * @param int         $z
     * @param string      $placeClass
     * @param null|string $character
     *
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(int $x, int $y, int $z, ?string $placeClass = null, ?string $character = null)
    {
        $placeClass = $placeClass ?? $this->defaultPlace;
        Assertion::classExists($placeClass);
        Assertion::implementsInterface($placeClass, PlaceInterface::class);
        if ($character !== null) {
            Assertion::implementsInterface($placeClass, WalksInterface::class);
            Assertion::classExists($character);
            Assertion::implementsInterface($character, CharacterEffectInterface::class);
        }
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
        $this->character = $character;
        $this->place = $placeClass;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @return int
     */
    public function getZ(): int
    {
        return $this->z;
    }

    /**
     * @return null|string
     */
    public function getCharacter(): ?string
    {
        return $this->character;
    }

    /**
     * @return string
     */
    public function getPlace(): string
    {
        return $this->place;
    }

    public function equals(?Equalizeable $item): bool
    {
        if (!($item instanceof FieldConfiguration)) {
            return false;
        }
        return $this->x === $item->x
            && $this->y === $item->y
            && $this->z === $item->z
            && $this->place === $item->place
            && $this->character === $item->character;
    }
}