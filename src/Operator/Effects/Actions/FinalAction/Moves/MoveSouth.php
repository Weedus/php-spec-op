<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 05.06.18
 * Time: 23:36
 */

namespace Weedus\PhpSpecOps\Operator\Effects\Actions\FinalAction\Moves;


use Weedus\PhpSpecOps\Model\Area\Location;

class MoveSouth extends AbstractMove
{
    protected function newLocation(Location $location): Location
    {
        return Location::create($location->getX() - 1, $location->getY(), $location->getZ());
    }
}