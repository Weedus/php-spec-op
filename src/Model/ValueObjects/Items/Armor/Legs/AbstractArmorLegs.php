<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 25.06.18
 * Time: 22:39
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Items\Armor\Chest;


use Weedus\PhpSpecOps\Model\ValueObjects\Items\Armor\AbstractArmor;
use Weedus\PhpSpecOps\Model\ValueObjects\Items\Armor\ArmorType;

abstract class AbstractArmorLegs extends AbstractArmor
{
    public function __construct(string $name, int $defense)
    {
        parent::__construct($name, $defense, ArmorType::LEGS());
    }

}