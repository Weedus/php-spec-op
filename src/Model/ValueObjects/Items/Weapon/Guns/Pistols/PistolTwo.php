<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 13:48
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Items\Weapon\Guns\Pistols;

use Weedus\PhpSpecOps\Model\ValueObjects\Range;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\Weapon\AbstractWeapon;

class PistolTwo extends AbstractWeapon
{
    public function __construct(string $name, int $power, Range $minRange, Range $maxRange)
    {
        parent::__construct('PistolTwo', 5, 3, Range::LOW(), Range::MEDIUM());
    }

}