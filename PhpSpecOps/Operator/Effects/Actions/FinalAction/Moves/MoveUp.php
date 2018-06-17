<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 04.06.18
 * Time: 23:25
 */

namespace Weedus\PhpSpecOps\Operator\Effects\Actions\FinalAction\Moves;

use Weedus\PhpSpecOps\Model\Area\Location;

class MoveUp extends AbstractMove
{
    protected function newLocation(Location $location): Location
    {
        return Location::create($location->getX(),$location->getY(),$location->getZ() + 1);
    }
}