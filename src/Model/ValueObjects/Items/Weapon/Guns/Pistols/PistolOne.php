<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 13:44
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Weapon\Guns\Pistols;

use Weedus\PhpSpecOps\Core\Model\Area\Range;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Weapon\AbstractWeapon;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Weapon\WeaponType;

class PistolOne extends AbstractWeapon
{
    public function __construct()
    {
        parent::__construct('PistolOne', 3, 1, Range::LOW(), Range::MEDIUM(),WeaponType::PISTOL());
    }
}