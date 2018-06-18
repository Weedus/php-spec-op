<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 17.06.18
 * Time: 23:16
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects;


use Weedus\PhpSpecOps\Exceptions\DistanceCalculationFailedException;
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
        $xx = $x*$x;
        $yy = $y*$y;
        $normedX = (int)sqrt($xx);
        $normedY = (int)sqrt($yy);
        $this->distance = (int)sqrt($xx + $yy);
        $this->steps = $normedX + $normedY;
    }

    /**
     * @param Location $start
     * @param Location $goal
     * @return Distance
     * @throws DistanceCalculationFailedException
     */
    public static function createByLocations(Location $start, Location $goal)
    {
        if($start->getZ() !== $goal->getZ()){
            throw new DistanceCalculationFailedException('start and goal on different heights');
        }
        return new self($goal->getX() - $start->getX(), $goal->getY() - $start->getY());
    }

    public static function create(int $x, int $y)
    {
        return new self($x,$y);
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