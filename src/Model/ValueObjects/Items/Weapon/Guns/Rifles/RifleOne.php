<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 13:44
 */

namespace Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Weapon\Guns\Rifles;

use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Weapon\AbstractWeapon;
use Weedus\PhpSpecOps\Core\Model\ValueObjects\Items\Weapon\WeaponType;

class RifleOne extends AbstractWeapon
{
    public function __construct()
    {
        parent::__construct('RifleOne', 4, 0, Range::HIGH(), Range::HIGH(), WeaponType::RIFLE());
    }
}