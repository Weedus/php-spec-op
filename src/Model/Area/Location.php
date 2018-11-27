<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 11:33
 */

namespace Weedus\PhpSpecOps\Core\Model\Area;

use Weedus\PhpSpecOps\Core\Model\Equalizeable;

final class Location implements Equalizeable
{
    /** @var int */
    private $x;
    /** @var int */
    private $y;
    /** @var int */
    private $z;

    /**
     * Location constructor.
     *
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

    public static function create(int $x, int $y, ?int $z = null)
    {
        return new static($x, $y, $z);
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @param int $x
     *
     * @return Location
     */
    public function setX(int $x): self
    {
        $this->x = $x;
        return $this;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @param int $y
     *
     * @return Location
     */
    public function setY(int $y): self
    {
        $this->y = $y;
        return $this;
    }

    /**
     * @return int
     */
    public function getZ(): int
    {
        return $this->z;
    }

    /**
     * @param int $z
     *
     * @return Location
     */
    public function setZ(int $z): self
    {
        $this->z = $z;
        return $this;
    }

    /**
     * @param Equalizeable $item
     *
     * @return bool
     */
    public function equals(?Equalizeable $item): bool
    {
        if (!($item instanceof Location)) {
            return false;
        }
        /** @var Location $item */
        return $this->x === $item->x
            && $this->y === $item->y
            && $this->z === $item->z;
    }
}