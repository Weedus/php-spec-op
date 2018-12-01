<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 13:48
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Weapon\Guns\Pistols;

use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Weapon\AbstractWeapon;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Weapon\WeaponType;

class PistolTwo extends AbstractWeapon
{
    public function __construct()
    {
        parent::__construct('PistolTwo', 5, 3, Range::LOW(), Range::MEDIUM(), WeaponType::PISTOL());
    }
}