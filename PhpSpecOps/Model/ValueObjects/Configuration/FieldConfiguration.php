<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 08.06.18
 * Time: 22:53
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Configuration;


use Assert\Assertion;
use Weedus\PhpSpecOps\Model\Entities\Units\Characters\CharacterInterface;
use Weedus\PhpSpecOps\Model\Entities\Units\Placeables\PlaceableInterface;
use Weedus\PhpSpecOps\Model\Entities\Units\Placeables\Walkables\Ground;
use Weedus\PhpSpecOps\Model\ValueObjects\Equalizeable;

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
    private $placeable;

    private $defaultPlaceable = Ground::class;
    /**
     * FieldConfiguration constructor.
     * @param int $x
     * @param int $y
     * @param int $z
     * @param string $placeable
     * @param null|string $character
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(int $x, int $y, int $z, ?string $placeable = null, ?string $character = null)
    {
        $placeable = $placeable ?? $this->defaultPlaceable;
        Assertion::classExists($placeable);
        Assertion::implementsInterface($placeable, PlaceableInterface::class);
        if($character !== null){
            Assertion::classExists($character);
            Assertion::implementsInterface($character, CharacterInterface::class);
        }
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
        $this->character = $character;
        $this->placeable = $placeable;
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
    public function getPlaceable(): string
    {
        return $this->placeable;
    }

    /** @return array */
    public function toArray(): array
    {
        return [
            'length'=>$this->x,
            'width'=>$this->y,
            'height'=>$this->z,
            'character' => $this->character,
            'placeable' => $this->placeable
        ];
    }


    public function equals(Equalizeable $item): bool
    {
        if(!($item instanceof FieldConfiguration)){
            return false;
        }
        return $this->x === $item->x
            && $this->y === $item->y
            && $this->z === $item->z
            && $this->placeable === $item->placeable
            && $this->character === $item->character;
    }
}