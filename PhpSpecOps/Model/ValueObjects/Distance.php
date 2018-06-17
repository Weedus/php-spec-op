<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 17.06.18
 * Time: 23:16
 */

namespace Weedus\Model\ValueObjects;


use Weedus\PhpSpecOps\Model\Area\Location;

final class Distance
{
    /** @var int */
    private $x;
    /** @var int */
    private $y;
    /** @var int */
    private $distance;
    /** @var int */
    private $steps;


    /**
     * Distance constructor.
     * @param int $x
     * @param int $y
     */
    private function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
        $xx = $x^2;
        $yy = $y^2;
        $normedX = (int)sqrt($xx);
        $normedY = (int)sqrt($yy);
        $this->distance = (int)sqrt($xx + $yy);
        $this->steps = $normedX + $normedY;
    }

    /**
     * @param Location $start
     * @param Location $goal
     * @return Distance
     */
    public static function createByLocations(Location $start, Location $goal)
    {
        return new self($goal->getX() - $start->getX(), $goal->getY() - $start->getY());
    }

    /**
     * @return int
     */
    public function get()
    {
        return $this->distance;
    }

    /**
     * @return int
     */
    public function getSteps()
    {
        return $this->steps;
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
}