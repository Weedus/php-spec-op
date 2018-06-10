<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 05.06.18
 * Time: 23:36
 */

namespace PhpSpecOps\Operator\Effects\Actions\FinalAction\Moves;


use PhpSpecOps\Model\Area\Location;

class MoveEast extends AbstractMove
{
    protected function newLocation(Location $location): Location
    {
        return Location::create($location->getX(),$location->getY() + 1,$location->getZ());
    }
}