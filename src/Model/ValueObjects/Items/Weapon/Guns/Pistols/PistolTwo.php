<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 13:48
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Weapon\Guns\Pistols;

use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Weapon\AbstractWeapon;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Range;

class PistolTwo extends AbstractWeapon
{
    public function __construct(string $name, int $power, Range $minRange, Range $maxRange)
    {
        parent::__construct('PistolTwo', 5, 3, Range::LOW(), Range::MEDIUM());
    }

}