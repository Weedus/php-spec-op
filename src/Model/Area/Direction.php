<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 08:58
 */

namespace Weedus\PhpSpecOps\Core\Model\Area;

use Weedus\PhpSpecOps\Core\Model\Equalizeable;
use Weedus\PhpSpecOps\Core\Model\OptionsObjectTrait;

/**
 * Class Direction
 * @package PhpSpecOps\ValueObjects
 * @method static Direction NORTH()
 * @method static Direction NORTH_EAST()
 * @method static Direction EAST()
 * @method static Direction SOUTH_EAST()
 * @method static Direction SOUTH()
 * @method static Direction SOUTH_WEST()
 * @method static Direction WEST()
 * @method static Direction NORTH_WEST()
 * @method static Direction NONE()
 */
final class Direction implements Equalizeable
{
    use OptionsObjectTrait;

    const NORTH = 'north';
    const NORTH_EAST = 'north_east';
    const EAST = 'east';
    const SOUTH_EAST = 'south_east';
    const SOUTH = 'south';
    const SOUTH_WEST = 'south_west';
    const WEST = 'west';
    const NORTH_WEST = 'north_west';
    const NONE = 'none';


    private static $normalizedDirections = [
        self::NORTH => ['x' => 1, 'y' => 0],
        self::NORTH_EAST => ['x' => 1, 'y' => 1],
        self::EAST => ['x' => 0, 'y' => 1],
        self::SOUTH_EAST => ['x' => -1, 'y' => 1],
        self::SOUTH => ['x' => -1, 'y' => 0],
        self::SOUTH_WEST => ['x' => -1, 'y' => -1],
        self::WEST => ['x' => 0, 'y' => -1],
        self::NORTH_WEST => ['x' => 1, 'y' => -1],
        self::NONE => ['x' => 0, 'y' => 0]
    ];

    /**
     * @param Location $start
     * @param Location $goal
     * @return Direction|OptionsObjectTrait
     */
    public static function createByLocations(Location $start, Location $goal)
    {
        $normalized = self::getNormalizedDirection($start, $goal);
        $readable = self::normalizedToHuman($normalized);
        return self::create($readable);
    }

    public static function createByDistance(Distance $distance)
    {
        $normalized = self::normalize($distance->getX(), $distance->getY());
        $readable = self::normalizedToHuman($normalized);
        return self::create($readable);
    }

    /**
     * @param array $normalized
     * @return int|null|string
     */
    public static function normalizedToHuman(array $normalized)
    {
        foreach (self::$normalizedDirections as $direction => $norm) {
            if ($normalized['x'] === $norm['x'] && $normalized['y'] === $norm['y']) {
                return $direction;
            }
        }
        return null;
    }

    /**
     * @param Location $start
     * @param Location $goal
     * @return array
     */
    public static function getNormalizedDirection(Location $start, Location $goal)
    {
        $diffX = $goal->getX() - $start->getX();
        $diffY = $goal->getY() - $start->getY();

        return self::normalize($diffX, $diffY);
    }

    private static function normalize(int $diffX, int $diffY)
    {

        $toOne = function ($value) {
            return ($value > 0 ? 1 : ($value < 0 ? -1 : 0));
        };
        $x = 0;
        $y = 0;
        $x2 = pow($diffX, 2);
        $y2 = pow($diffY, 2);

        switch (true) {
            case $x2 > $y2:
                $x = $toOne($diffX);
                break;
            case $x2 < $y2:
                $y = $toOne($diffY);
                break;
            default:
                $x = $toOne($diffX);
                $y = $toOne($diffY);
        }

        return ['x' => $x, 'y' => $y];
    }
}