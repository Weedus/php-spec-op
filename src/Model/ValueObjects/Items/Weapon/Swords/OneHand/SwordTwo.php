<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 13:27
 */

namespace PhpSpecOps\ValueObjects\Items\Weapon\Swords\OneHand;

use PhpSpecOps\Model\ValueObjects\Range;
use PhpSpecOps\ValueObjects\Items\Weapon\AbstractWeapon;

class SwordTwo extends AbstractWeapon
{
    public function __construct()
    {
        parent::__construct('SwordTwo', 7, 4, Range::LOW(), Range::LOW());
    }
}