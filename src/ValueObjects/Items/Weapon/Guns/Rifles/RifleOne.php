<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 13:44
 */

namespace PhpSpecOps\ValueObjects\Items\Weapon\Guns\Rifles;


use PhpSpecOps\ValueObjects\Items\Weapon\AbstractWeapon;
use PhpSpecOps\ValueObjects\Range;

class RifleOne extends AbstractWeapon
{
    public function __construct(string $name, int $power, Range $minRange, Range $maxRange)
    {
        parent::__construct('RifleOne', 4, 0, Range::HIGH(), Range::HIGH());
    }
}