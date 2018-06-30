<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 17.06.18
 * Time: 23:16
 */

namespace Weedus\PhpSpecOps\Model\Area;


use Weedus\PhpSpecOps\Exceptions\DistanceCalculationFailedException;

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

        $this->steps = ($x < 0 ? $x * -1 : $x) + ($y < 0 ? $y * -1 : $y);

        $this->distance = (int)sqrt(
            pow($x, 2) + pow($y, 2)
        );

    }

    /**
     * @param Location $start
     * @param Location $goal
     * @return Distance
     * @throws DistanceCalculationFailedException
     */
    public static function createByLocations(Location $start, Location $goal)
    {
        if ($start->getZ() !== $goal->getZ()) {
            throw new DistanceCalculationFailedException('start and goal on different heights');
        }
        return new self($goal->getX() - $start->getX(), $goal->getY() - $start->getY());
    }

    public static function create(int $x, int $y)
    {
        return new self($x, $y);
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