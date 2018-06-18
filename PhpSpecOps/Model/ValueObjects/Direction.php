<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 08:58
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects;

use Weedus\PhpSpecOps\Model\Area\Location;

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
 */
final class Direction extends AbstractValueObject
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


    private static $normalizedDirections = [
        self::NORTH => [1,0],
        self::NORTH_EAST => [1,1],
        self::EAST => [0,1],
        self::SOUTH_EAST => [-1,1],
        self::SOUTH => [-1,0],
        self::SOUTH_WEST => [-1,-1],
        self::WEST => [0,-1],
        self::NORTH_WEST => [1,-1],
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

        $toOne = function($value){
            return ($value > 0 ? 1 : ($value < 0 ? -1 : 0));
        };

        if($diffX^2 === $diffY^2){
            return [
                $toOne($diffX),
                $toOne($diffY)
            ];
        }

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
            $toOne($diffX),
            $toOne($diffY)
        ];
    }
}