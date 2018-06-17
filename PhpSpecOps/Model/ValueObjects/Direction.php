<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 08:58
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects;

use Assert\Assertion;
use Weedus\Model\ValueObjects\Distance;
use Weedus\PhpSpecOps\Model\Area\Location;

/**
 * Class Direction
 * @package PhpSpecOps\ValueObjects
 * @method static Direction NORTH()
 * @method static Direction SOUTH()
 * @method static Direction WEST()
 * @method static Direction EAST()
 */
final class Direction extends AbstractValueObject
{
    use OptionsObjectTrait;

    const NORTH = 'north';
    const SOUTH = 'south';
    const EAST = 'east';
    const WEST = 'west';

    private static $normalizedDirections = [
        self::NORTH => [1,0],
        self::SOUTH => [-1,0],
        self::WEST => [0,-1],
        self::EAST => [0,1]
    ];

    /**
     * @param Location $start
     * @param Location $goal
     * @return Direction|OptionsObjectTrait
     */
    public static function createByLocations(Location $start, Location $goal)
    {
        $normalized = self::getNormalizedDirection($start,$goal);
        $readable = self::normalizedToHuman($normalized);
        return self::create($readable);
    }

    public static function createByDistance(Distance $distance)
    {
        $normalized = self::normalize($distance->getX(),$distance->getY());
        $readable = self::normalizedToHuman($normalized);
        return self::create($readable);
    }

    /**
     * @param array $normalized
     * @return int|null|string
     */
    public static function normalizedToHuman(array $normalized)
    {
        foreach(self::$normalizedDirections as $direction => $norm){
            if($normalized[0] === $norm[0] && $normalized[1] === $norm[1]){
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

        return self::normalize($diffX,$diffY);
    }

    private static function normalize(int $diffX, int $diffY)
    {
        $closerToZero = function(int $value){
            if($value > 0) return $value - 1;
            if($value < 0) return $value +1 ;
            return $value;
        };

        while($diffX !== 0 && $diffY !== 0){
            $diffX = $closerToZero($diffX);
            $diffY = $closerToZero($diffY);
        }

        return [
            ($diffX > 0 ? 1 : ($diffX < 0 ? -1 : 0)),
            ($diffY > 0 ? 1 : ($diffY < 0 ? -1 : 0))
        ];
    }
}