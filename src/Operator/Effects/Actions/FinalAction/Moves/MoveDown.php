<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 05.06.18
 * Time: 01:16
 */

namespace PhpSpecOps\Operator\Effects\Actions\FinalAction\Moves;

use PhpSpecOps\Model\Area\Location;

class MoveDown extends AbstractMove
{
    protected function newLocation(Location $location): Location
    {
        return Location::create($location->getX(),$location->getY(),$location->getZ()-1);
    }
}