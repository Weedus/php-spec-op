<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 13:08
 */

namespace PhpSpecOps\ValueObjects\Items\Weapon\Swords\OneHand;

use PhpSpecOps\Model\ValueObjects\Range;
use PhpSpecOps\ValueObjects\Items\Weapon\AbstractWeapon;

class SwordOne extends AbstractWeapon
{
    public function __construct()
    {
        parent::__construct('SwordOne', 4, 3, Range::LOW(), Range::LOW());
    }
}