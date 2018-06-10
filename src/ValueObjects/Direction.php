<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 09.06.18
 * Time: 08:58
 */

namespace PhpSpecOps\ValueObjects;
use Assert\Assertion;
use PhpSpecOps\Model\Area\Location;

/**
 * Class Direction
 * @package PhpSpecOps\ValueObjects
 * @method static Direction NORTH()
 * @method static Direction SOUTH()
 * @method static Direction WEST()
 * @method static Direction EAST()
 * @method static Direction UP()
 * @method static Direction DOWN()
 */
class Direction extends AbstractValueObject
{
    use OptionsObjectTrait;

    const NORTH = 'north';
    const SOUTH = 'south';
    const EAST = 'east';
    const WEST = 'west';
    const UP = 'up';
    const DOWN = 'down';

    private $normalizedDirections = [
        self::NORTH => [1,0,0],
        self::SOUTH => [-1,0,0],
        self::WEST => [0,-1,0],
        self::EAST => [0,1,0],
        self::UP => [0,0,-1],
        self::DOWN => [0,0,1],
    ];

    /**
     * @param Location $start
     * @param Location $goal
     * @throws \Exception
     */
    public static function createByLocations(Location $start, Location $goal)
    {
        $normalized = self::getNormalizedDirection($start,$goal);


    }
    public static function normalizedToHuman(array $normalized)
    {

    }

    /**
     * @param Location $start
     * @param Location $goal
     * @return array
     * @throws \Exception
     */
    public static function getNormalizedDirection(Location $start, Location $goal)
    {
        $diffX = $goal->getX() - $start->getX();
        $diffY = $goal->getY() - $start->getY();
        $diffZ = $goal->getZ() - $start->getZ();

        if($diffZ !== 0){
            if($diffX !== 0 || $diffY !== 0){
                throw new \Exception('target height differs or stairs not on same length/width');
            }
            return [0,0,($diffZ > 0 ? 1 : -1)];
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
            ($diffX > 0 ? 1 : ($diffX < 0 ? -1 : 0)),
            ($diffY > 0 ? 1 : ($diffY < 0 ? -1 : 0)),
            0
        ];
    }
}