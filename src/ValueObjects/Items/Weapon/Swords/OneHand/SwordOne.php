<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 13:08
 */

namespace PhpSpecOps\ValueObjects\Items\Weapon\Swords\OneHand;


use PhpSpecOps\ValueObjects\Items\Weapon\AbstractWeapon;
use PhpSpecOps\ValueObjects\Range;

class SwordOne extends AbstractWeapon
{
    public function __construct()
    {
        parent::__construct('SwordOne', 4, 3, Range::LOW(), Range::LOW());
    }
}