<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 03.06.18
 * Time: 13:48
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Items\Weapon\Guns\Rifles;

use Weedus\PhpSpecOps\Model\ValueObjects\Range;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\Weapon\AbstractWeapon;

class RifleTwo extends AbstractWeapon
{
    public function __construct(string $name, int $power, Range $minRange, Range $maxRange)
    {
        parent::__construct('RifleTwo', 7, 2, Range::MEDIUM(), Range::HIGH());
    }

}