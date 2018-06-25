<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 11:33
 */

namespace Weedus\PhpSpecOps\Model\Area;

use Assert\Assertion;
use Weedus\PhpSpecOps\Model\ValueObjects\Equalizeable;

class Location implements Equalizeable
{
    /** @var int */
    private $x;
    /** @var int */
    private $y;
    /** @var int */
    private $z;

    public static function create(int $x, int $y, ?int $z = null)
    {
        return new static($x, $y, $z);
    }

    /**
     * Location constructor.
     * @param int $x
     * @param int $y
     * @param int $z
     */
    public function __construct(int $x, int $y, ?int $z = null)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z ?? 0;
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
     * @param Equalizeable $item
     * @return bool
     * @throws \Assert\AssertionFailedException
     */
    public function equals(Equalizeable $item): bool
    {
        Assertion::isInstanceOf($item, self::class);
        /** @var Location $item */
        return $this->x === $item->x
            && $this->y === $item->y
            && $this->z === $item->z;
    }

    /**
     * @param int $x
     * @return Location
     */
    public function setX(int $x): self
    {
        $this->x = $x;
        return $this;
    }

    /**
     * @param int $y
     * @return Location
     */
    public function setY(int $y): self
    {
        $this->y = $y;
        return $this;
    }

    /**
     * @param int $z
     * @return Location
     */
    public function setZ(int $z): self
    {
        $this->z = $z;
        return $this;
    }


}