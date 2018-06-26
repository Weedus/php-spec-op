<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 13:08
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Items\Weapon\Swords\OneHand;

use Weedus\PhpSpecOps\Model\ValueObjects\Items\Weapon\AbstractWeapon;
use Weedus\PhpSpecOps\Model\ValueObjects\Range;

class SwordOne extends AbstractWeapon
{
    public function __construct()
    {
        parent::__construct('SwordOne', 4, 3, Range::LOW(), Range::LOW());
    }
}