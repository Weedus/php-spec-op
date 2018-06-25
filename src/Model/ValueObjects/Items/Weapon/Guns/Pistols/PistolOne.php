<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 13:44
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Items\Weapon\Guns\Pistols;


use Weedus\PhpSpecOps\Model\ValueObjects\Range;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\Weapon\AbstractWeapon;

class PistolOne extends AbstractWeapon
{
    public function __construct(string $name, int $power, Range $minRange, Range $maxRange)
    {
        parent::__construct('PistolOne', 3, 1, Range::LOW(), Range::MEDIUM());
    }

}